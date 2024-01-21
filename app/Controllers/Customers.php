<?php

namespace App\Controllers;

use App\Models\CustomersModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
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

        return view('templates/header', ['title' => 'Add new customer csb'])
            . view('customers/add')
            . view('templates/footer');
    }
	
	public function add()
    {
		
        helper('form');

        $data = $this->request->getPost(['customername', 'customeraddress', 'customerphone']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'customername' => 'required|max_length[255]|min_length[3]',
            'customeraddress'  => 'required|max_length[5000]|min_length[10]',
			'customerphone'  => 'integer|max_length[14]|min_length[12]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(CustomersModel::class);

        $model->save([
            'customername' => $post['customername'],
            'customeraddress'  => $post['customeraddress'],
            'customerphone'  => $post['customerphone'],
        ]);
		
        return view('templates/header', ['title' => 'New Customer Registered'])
            . view('customers/success')
            . view('templates/footer');
		
		
		/**
		return view('welcome_message');
		**/
    }
}