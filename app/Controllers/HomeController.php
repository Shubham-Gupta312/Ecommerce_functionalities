<?php

namespace App\Controllers;

use App\Libraries\Hash;

class HomeController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }
    public function index(): string
    {
        return view('welcome_message');
    }
    public function register()
    {
        if ($this->request->getMethod() == 'get') {
            return view('register');
        } else if ($this->request->getMethod() == 'post') {
            // data validate
            $validation = $this->validate([
                'username' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[5]|max_length[10]'
            ]);
            if (!$validation) {
                return view('register', ['validation' => $this->validator]);
            } else {
                // echo "form submitted";
                $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                // echo "validated form" here form is validated;
                // now send data to DB

                $values = [
                    'username' => $username,
                    'email' => $email,
                    'password' => Hash::make($password)
                ];

                $ecomModel = new \App\Models\EcomModel();
                $query = $ecomModel->insert($values);
                if (!$query) {
                    return redirect()->back()->with('fail', "Something went wrong");
                } else {
                    return redirect()->to('register')->with('success', 'Registration Successfull!');
                }

            }

            // echo $username, $email, $password;
        }
    }
    public function login()
    {
        if ($this->request->getMethod() == 'get') {
            return view('login');
        } else if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'email' => 'required|valid_email',
                'password' => 'required|min_length[5]|max_length[10]'
            ]);
            if (!$validation) {
                return view('login', ['validation' => $this->validator]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $ecomModel = new \App\Models\EcomModel();
                $user_data = $ecomModel->where('email', $email)->first();
                $check_password = Hash::check($password, $user_data['password']);

                if (!$check_password) {
                    // echo "fail";
                    return redirect()->back()->withInput();
                } else {
                    // echo 'login';
                    if (!is_null(!$user_data)) {
                        $sess_data = [
                            'username' => $user_data['username'],
                            'email' => $user_data['email'],
                            'user_type' => $user_data['user_type'],
                            "loginned"=>'loginned'
                        ];
                        session()->set($sess_data);
                        if ($user_data['user_type'] == 'user') {
                            //go to user page
                            $url = "user_dashboard";
                        } else if ($user_data['user_type'] == 'admin') {
                            // go to admin page
                            $url = "admin_dashboard";
                        }
                        return redirect()->to(base_url($url));
                    }
                }
            }
        }
    }

    public function logout(){

        session_unset();
        session()->destroy();
        return redirect()->to(base_url());
    }

}
