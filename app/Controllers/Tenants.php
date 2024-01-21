<?php

namespace App\Controllers;

use App\Models\TenantsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tenants extends BaseController
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
        helper('form');

        return view('templates/header', ['title' => 'Add new tenant'])
            . view('tenants/add')
            . view('templates/footer');
    }
	
	public function add()
    {
		
        helper('form');

        $data = $this->request->getPost(['tenantname', 'tenantaddress', 'tenantphone']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'tenantname' => 'required|max_length[255]|min_length[3]',
            'tenantaddress'  => 'required|max_length[5000]|min_length[10]',
			'tenantphone'  => 'integer|max_length[14]|min_length[12]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

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