<?php

namespace App\Controllers;

use App\Models\TransactionsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Transactions extends BaseController
{
	/**
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }
	
    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
	**/
	
	public function new()
    {
		
		$model = model(TransactionsModel::class);
		
		$data = [
            'allcustomerids'  => $model->getCustomerIDs(),
            'alltenantids' => $model->getTenantIDs(),
        ];
		
        $data['allcustomerids'] = $this->customerids->selectcustomerid(); 
		$data['alltenantids'] = $this->tenantids->selecttenantid();
		
        $this->load->view('add', $data);
		
        helper('form');

        return view('templates/header', ['title' => 'Add new transaction'])
            . view('transactions/add')
            . view('templates/footer');
    }
	
	public function add()
    {
		
        helper('form');
		
		$db      = \Config\Database::connect();
		$builder = $db->table('transactions');
		
		$couponsarray = $this->input->post('coupons');
		
		foreach($couponsarray as $couponid){
			
			$couponconditions = ['couponid' => $couponid, 'status' => "Available"];
			
			$checkresult = $builder->where($couponconditions)->countAllResults();
			
			if ($checkresult != 1) {
				return $this->new();
			}
		}
		
		// Checks for the second time whether all coupons are valid.
        if (! $this->validateData($data, [
			'customerid' => 'required|max_length[255]|min_length[3]',
			'tenantid' => 'required|max_length[255]|min_length[3]',
            'totalprice' => 'required|max_length[255]|min_length[3]',
            'discount'  => 'required|max_length[5000]|min_length[10]',
			'finalprice'  => 'integer|max_length[14]|min_length[12]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        $data = $this->request->getPost(['tenantname', 'tenantaddress', 'tenantphone']);

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(TenantsModel::class);

        $model->save([
            'tenantname' => $post['tenantname'],
            'tenantaddress'  => $post['tenantaddress'],
            'tenantphone'  => $post['tenantphone'],
        ]);
		
        return view('templates/header', ['title' => 'New Customer Registered'])
            . view('tenants/success')
            . view('templates/footer');
		
		
		/**
		return view('welcome_message');
		**/
    }
}