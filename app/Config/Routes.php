<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Customers;
use App\Controllers\Tenants;
use App\Controllers\Transactions;
use App\Controllers\News;
use App\Controllers\Pages;

$routes->get('customers/register', [Customers::class, 'new']);
$routes->post('customers', [Customers::class, 'add']);

$routes->get('tenants/register', [Tenants::class, 'new']);
$routes->post('tenants', [Tenants::class, 'add']);

$routes->get('transactions/new', [Transactions::class, 'new']);
$routes->post('transactions', [Transactions::class, 'add']);

$routes->get('news', [News::class, 'index']);
$routes->get('news/new', [News::class, 'new']);
$routes->post('news', [News::class, 'create']);
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);