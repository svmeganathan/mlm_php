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
        if(!empty($request->input('sortField'))){
            $query = User::orderBy($request->input('sortField'),$request->input('sortDirection'));
            if(!empty($request->input('search'))){
                $query->where( 'username', 'like', '%'.$request->input('search').'%' );
            }
            $count = $query->count();
            if(!empty($request->input('startOffset'))){
                $query->offset($request->input('startOffset'),$request->input('endOffset'))->limit($request->input('limit'));
            }
            $users = $query->get();
            if (!empty($users)) {
                $response = array(
                    'msg'   => 'Successfully',
                    'count' => $count,
                    'users' => $users,
                );
            } else {
                $response = array(
                    'msg' => 'Failed'
                );
            }
        } else {
            $users = User::all();
            $response = array(
                'users' => $users
            );
            // echo json_encode($response);
        }
        echo json_encode($response);
    }

    public function add(Request $request){
        $users = User::create([
            'username'=> $request->input('username'),
            'password'=> $request->input('password'),
         ]);
        if (!empty($users)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $users
            );
        } else {
            $response = array(
                'error'=> true,
                'msg'  => 'Invalid'
            );
        }
        echo json_encode($response);
    }

    public function update(Request $request, $id){
        $users = User::find($id);
        if (!empty($users)) {
            $users->username = $request->input('username');
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $users
            );
	    } else {
            $response = array(
                'error'=> true,
                'msg'  => 'Invalid'
            );
        }
        echo json_encode($response);

    }

    public function delete($id){
        $users = User::find($id);
        if (!empty($users)) {
            $users->delete();
            $res['success'] = true;
            return response($res, 200);
        } else {
            $res['success'] = false;
            $res['message'] = 'not found';
            return response($res, 200);
	    }
    }
}
