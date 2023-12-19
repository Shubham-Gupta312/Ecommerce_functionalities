<?php

namespace App\Controllers;
use App\Models\ProductCategoryModel;

class ProductCategoryController extends BaseController
{
    public function product_categories(){
        // echo "Product Category";
        if($this->request->getMethod() == 'get'){
            return view('Product_Category/product_categories');
        }
        else if($this->request->getMethod() == 'post'){
            //validation
            $validation = $this->validate([
                'name' => 'required|max_length[120]',
                'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,png,jpg,gif,jpeg]',
            ]);
            if (!$validation) {
                return view('admin/product_categories', ['validation' => $this->validator]);
            } else {
                $name = $this->request->getPost('name');
                $image = $this->request->getFile('image');

                //new name of image
                $new_name = $image->getRandomName();
                $image->move("../public/images/product_cat", $new_name);
                $model = new ProductCategoryModel();
                $data = [
                    'name'=>$name,
                    'image'=>$new_name
                ];
                $model->insert($data);
                return redirect()->to(base_url('admin/product_categories'));
            }
        }
    }

    public function products(){
        if($this->request->getMethod() == 'get'){
            $model = new ProductCategoryModel();
            $data = [
                'records' => $model->paginate(10),
                'pager' => $model->pager,
            ];
            return view ('Product_Category/product', $data);
        }
    }
}