<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Invoice;


class CustomerController extends Controller
{
    //

    public function index()
    {
    	
    	return response()

    	->json([

    		'collection' => Customer::advancedFilter()

    		]);
    }
}
