<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table = 'transactions';
	
	protected $allowedFields = ['customerid', 'tenantid', 'totalprice', 'discount', 'finalprice'];
	
	public function getCustomerIDs()
    {
		$this->db->select('customerid');
		$query = $this->db->get('customers');
    }
	
	public function getTenantIDs()
    {
		$this->db->select('tenantid');
		$query = $this->db->get('tenants');
    }
	
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