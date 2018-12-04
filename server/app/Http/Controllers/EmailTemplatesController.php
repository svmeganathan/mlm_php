<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplatesController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        //
    }
    /**
     * Fetch the email Template.
     *
     * @return json
    */
    public function index(Request $request)
    {
        // $sample = "hello world";
        // echo $sample;   
	}
}