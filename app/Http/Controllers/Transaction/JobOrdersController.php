<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Job\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobOrdersController extends Controller
{
	public $viewBasePath = 'admin.transaction.job-order';

    public function index(Request $request)
    {
    	if($request->ajax()) {
    		$joborders = Order::all();
    		return datatables($joborders)->toJson();
    	}

    	return view($this->viewBasePath . '.index');
    }

    public function create()
    {
    	return view($this->viewBasePath . '.create');
    }
}
