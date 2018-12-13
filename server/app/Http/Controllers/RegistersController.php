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
        function random_string($length){
            $charset = array_merge(range('a','z'),range('A','Z'),range('0','9'));
            shuffle($charset);
            $password = array_slice($charset,0,$length);
            return implode('',$password);
            }
            function ranstring($string){
            $charsett = array('Inactive');
            return implode('',$charsett);            
            }                
            $register = Register::create([
            'firstname'=> $request->input('firstname'),
            'middlename'=> $request->input('middlename'),
            'lastname'=> $request->input('lastname'),
            'gender_id'=> $request->input('gender_id'),
            'email'=> $request->input('email'),
            'phoneno'=> $request->input('phoneno'),
            'address'=> $request->input('address'),
            'pincode'=> $request->input('pincode'),
            'district_id'=> $request->input('district_id'),
            'state_id'=> $request->input('state_id'),
            'country_id'=> $request->input('country_id'),            
            'role_id'=> $request->input('role_id'),
            'username'=> $request->input('username'),
            'password'=> $request->input('password'),
            'retypsd'=> $request->input('retypsd'),  
             'otp'=>random_string(5),
             'status'=>ranstring(8),
             ]);                        
           if (!empty($register)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $register
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
