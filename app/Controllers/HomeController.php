<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserDetailsModel;

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
                            'user_id' => $user_data['id'],
                            'username' => $user_data['username'],
                            'email' => $user_data['email'],
                            'user_type' => $user_data['user_type'],
                            "loginned" => 'loginned'
                        ];
                        //filter the data according to their roles (ADMIN / USER)

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

    public function logout()
    {
        session_unset();
        session()->destroy();
        return redirect()->to(base_url());
    }

    public function profile()
    {
        // echo "profile";
        if ($this->request->getMethod() == 'get') {
            return view('dashboard/user_profile');
        } else if ($this->request->getMethod() == 'post') {
            // Form validation
            $validation = $this->validate([
                'name' => 'required|max_length[30]',
                'country' => 'if_exist|max_length[30]',
                'state' => 'if_exist|max_length[30]',
                'district' => 'if_exist|max_length[30]',
                'pincode' => 'if_exist|integer|max_length[6]',
                'phone' => 'if_exist|exact_length[10]|integer',
                'address' => 'if_exist|max_length[200]',
                'permanent_address' => 'if_exist|max_length[200]'
            ]);

            if (!$validation) {
                return view('profile', ['validation' => $this->validator]);
            } else {
                // Submit and save data
                $name = $this->request->getPost('name');
                $country = $this->request->getPost('country');
                $state = $this->request->getPost('state');
                $district = $this->request->getPost('district');
                $pincode = $this->request->getPost('pincode');
                $phone = $this->request->getPost('phone');
                $address = $this->request->getPost('address');
                $permanent_address = $this->request->getPost('permanent_address');

                $model = new UserDetailsModel();
                $user_id = session()->user_id;
                $record = $model->where("user_id", $user_id)->first();

                $data = [
                    'user_id' => $user_id,
                    'name' => $name,
                    'country' => $country,
                    'state' => $state,
                    'district' => $district,
                    'pincode' => $pincode,
                    'phone' => $phone,
                    'address' => $address,
                    'permanent_address' => $permanent_address
                ];

                if (!is_null($record)) {
                    // Update data if data is present
                    $query = $model->update($record['id'], $data);
                    if (!$query) {
                        echo "fail to update";
                    } else {
                        echo "update success";
                    }
                } else {
                    // Insert data if data is not present 
                    $query = $model->insert($data);
                    if (!$query) {
                        echo "insert fail";
                    } else {
                        echo "insert success";
                    }
                }
            }
        } else {
            echo 'failed';
        }

    }

}
