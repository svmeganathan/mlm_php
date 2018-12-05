<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;


class UsersController extends Controller
{
    public function __construct(){
    }

    /**
     * Fetch the users.
     *
     * @return void
    */
    public function index(Request $request){
        //$users = User::all();

        $users = array(
            'Tamil',
            'Megu',
            'Ram',
            'Hari'
        );
        $response = array(
            'users' => $users
        );
		echo json_encode($response);
    }
    
    public function add(Request $request){
    }

    public function update(Request $request){
    }

    public function delete(Request $request){
    }
} 