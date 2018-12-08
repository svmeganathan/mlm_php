<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;


class RegistersController extends Controller
{
    public function __construct(){
    }

    /**
     * Fetch the users.
     *
     * @return void
    */
    

    public function add(Request $request){
        $registers = Register::create([
            'username'=> $request->input('username'),
            'password'=> $request->input('password'),
            'firstname'=> $request->input('firstname'),
            'middlename'=> $request->input('middlename'),
            'lastname'=> $request->input('lastname'),
            'gender_id'=> $request->input('gender_id'),
            'email'=> $request->input('email'),
            'address'=> $request->input('address'),
            'district_id'=> $request->input('district_id'),
            'state_id'=> $request->input('state_id'),
            'country_id'=> $request->input('country_id'),
            'pincode'=> $request->input('pincode'),
            'role_id'=> $request->input('role_id'),
         ]);
        if (!empty($registers)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $registers
            );
        } else {
            $response = array(
                'error'=> true,
                'msg'  => 'Invalid'
            );
        }
        echo json_encode($response);
    }

    
}
