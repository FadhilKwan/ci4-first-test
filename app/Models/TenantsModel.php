<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table = 'tenants';
	
	protected $allowedFields = ['tenantname', 'tenantaddress', 'tenantphone'];
	
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