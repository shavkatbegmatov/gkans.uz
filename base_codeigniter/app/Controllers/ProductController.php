<?php

namespace App\Controllers;

use App\Models\ProductModel;

// defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends BaseController
{
	public function index()
	{
		$this->model = new ProductModel();
		$all_products = $this->model->findAll();
		if ($all_products) {
			$my_products = array('products' => $all_products);
		} else {
			$my_products = array('products' => '');
		}
		return view('Products/main', $my_products);
	}

	public function addProduct()
	{
		$data = [
			'product_name' => 'Daftar 96',
			'product_price' => 8000,
		];
		// $data = [];
		if (strtolower($this->request->getMethod()) === 'post') {
			$model = new ProductModel();
			// echo json_encode($_POST);
			//$data = $_POST;
			// $request->getPost('foo');
			// $data->name = $this->request->getVar('post_name');
			// $data->price = $this->request->getVar('post_price');
			// array_push($data, $this->request->getVar('post_name'));
			// array_push($data, $this->request->getVar('post_price'));
			// $data2 = $this->request->getVar('post_name');
			$data2['name'] = $this->request->getPost("post_name");
			// $data[price] = $this->request->getVar('post_price');
			// var_dump($data2);
			// var_dump($data);
			// $data = [];
			// $data = $this->request->getRawInput();
			$data = $_POST;
			if ($_REQUEST['product_name'])
			$data = [
				'product_name' => $_REQUEST['product_name'],
				'product_price' => intval($_REQUEST['product_price']),
			];
			$model->save($data);
		}
		return view('Products/add_product', $data);
	}

	public function changeProduct() {
		$data = $_POST;
		return view('Products/change_product', $data);
	}

	public function product($id) {
		$model = new ProductModel();
		$product = $model->find($id);
		if($product) {
			$data = [
				'product_name' => $product['product_name'],
				'product_price' => $product['product_price'],
			];
		} else {
			$data = [
				'product_name' => 'Product Not Found',
				'product_price' => 'Product Not Found',
			];
		}
		return view('single_product', $data);
	}

	public function shop()
	{
		return view('shop');
	}

	public function productDetails()
	{

		$this->load->model('product_model');
		$data = $this->product_model->findAll();
		echo json_encode($data);
	}

	public function addToCart()
	{

		$data = json_decode(file_get_contents("php://input"));
		$id = $data->id;
		$this->load->model('product_model');
		$product = $this->product_model->find($id);
		$this->load->library('cart');
		$data = array(
			'id' => $id,
			'name' => $product->product_name,
			'price' => $product->product_price,
			'qty' => 1,
			'image' => $product->product_image
		);

		$this->cart->insert($data);
		$this->cartCount();
	}

	public function cartCount()
	{
		$no = 0;
		foreach ($this->cart->contents() as $item) {
			$no += $item['qty'];
		}
		echo $no;
	}

	public function showCartItems()
	{

		$data = $this->cart->contents();
		echo json_encode($data);
	}

	public function removeCart()
	{

		$data = json_decode(file_get_contents("php://input"));
		$rowid = $data->rowid;
		$data = array(
			'rowid'  => $rowid,
			'qty'  => 0
		);

		$this->cart->update($data);
		echo true;
	}
	public function updateCart()
	{

		$data = json_decode(file_get_contents("php://input"));
		$item = array(
			'rowid' => $data->rowid,
			'qty' => $data->qty
		);

		if ($this->cart->update($item)) {
			echo true;
		} else {
			echo  false;
		}
	}
}
