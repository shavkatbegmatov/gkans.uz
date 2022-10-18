<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ShavkatController extends BaseController
{
    public function index()
    {
        $date = [
            'name' => 'Product Not Found!',
            'price' => 'Product Not Found!',
        ];
        $this->model = new ProductModel();
        $myProduct = $this->model->find('1');
        $data = [
            'name' => $myProduct['name'],
            'price' => $myProduct['price'],
        ];
        // $data = [
        //     'title'   => 'My title',
        //     'heading' => 'My Heading',
        //     'message' => 'My Message',
        // ];
        return view('shavkat', $data);
    }
}
