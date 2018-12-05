<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function createUser(Request $request)
    {
        $response =
        $this->validate(
            $request, [
                'username' => 'required',
                'password' => 'required',
                'email' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'lastname' => 'required',
                'gender_id' => 'required',
                'address' => 'required',
                'Role_id' => 'required',
                'district_id' => 'required',
                'state_id' => 'required',
                'country_id' => 'required',
                'pincode' => 'required',
            ]
        );

        $user = new User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->gender_id = $request->gender_id;
        $user->address = $request->address;
        $user->Role_id = $request->Role_id;
        $user->district_id = $request->district_id;
        $user->state_id = $request->state_id;
        $user->country_id = $request->country_id;
        $user->pincode = $request->pincode;

        $user->save();

        echo "DATA SAVED";
    }
}
