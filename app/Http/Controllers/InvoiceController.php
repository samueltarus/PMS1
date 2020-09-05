<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function all_invoices(){
        return view('admin.all_invoice');
    }
    public function add_invoice(){
        return view('admin.add_invoice');
    }
    public function view_invoice(){
        return view('admin.view_invoice');
    }

    public  function edit_invoice(){
        return view('admin.edit_invoice');
    }
}
