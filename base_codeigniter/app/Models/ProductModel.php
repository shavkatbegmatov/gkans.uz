<?php

namespace App\Models;

use CodeIgniter\Model;

// if (!defined('BASEPATH'))
// 	exit('No direct script access allowed');

class ProductModel extends Model
{
	protected $table      = 'products';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	// protected $returnType     = 'array';
	// protected $useSoftDeletes = true;

	protected $allowedFields = ['product_name', 'product_price'];

	// protected $useTimestamps = false;
	// protected $createdField  = 'created_at';
	// protected $updatedField  = 'updated_at';
	// protected $deletedField  = 'deleted_at';

	// protected $validationRules    = [];
	// protected $validationMessages = [];
	// protected $skipValidation     = false;
	/*
	function findAll()
	{
		$query   = $this->$db->query('SELECT name, title, email FROM my_table');
		$results = $query->getResult();
		return $this->db->get('product')->result();
	}
	function find($id)
	{
		return $this->db->where('id', $id)->get('product')->row();
	}
*/
}
