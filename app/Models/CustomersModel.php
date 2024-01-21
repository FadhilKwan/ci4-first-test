<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table = 'customers';
	
	protected $allowedFields = ['customername', 'customeraddress', 'customerphone'];
	
	/*
	public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
	*/
}