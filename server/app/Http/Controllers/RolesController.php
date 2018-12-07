<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;


class RolesController extends Controller
{
    public function __construct(){
    }

    /**
     * Fetch the users.
     *
     * @return void
    */
  /////////////////////////Searching or Sorting//////////////////////////
	public function index(Request $request){
        if(!empty($request->input('sortField'))){
            $query = Role::orderBy($request->input('sortField'),$request->input('sortDirection'));
            if(!empty($request->input('search'))){
                $query->where( 'rolename', 'like', '%'.$request->input('search').'%' );
            }
            $count = $query->count();
            if(!empty($request->input('startOffset'))){
                $query->offset($request->input('startOffset'),$request->input('endOffset'))->limit($request->input('limit'));
            }
            $roles = $query->get();
            if (!empty($roles)) {
                $response = array(
                    'msg'   => 'Successfully',
                    'count' => $count,
                    'role' => $roles,
                );
            } else {
                $response = array(
                    'msg' => 'Failed'
                );
            }
        } else {
            $roles = Role::all();
            $response = array(
                'country' => $roles
            );
            // echo json_encode($response);
        }
        echo json_encode($response);
    }


/////////////////////////Add or Create Data //////////////////////////
    public function add(Request $request){
        $roles = Role::create([
            'rolename'=> $request->input('rolename'),
         ]);
        if (!empty($roles)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $roles
            );
        } else {
            $response = array(
                'error'=> true,
                'msg'  => 'Invalid'
            );
        }
        echo json_encode($response);
    }


/////////////////////////Update Data //////////////////////////
	public function update(Request $request, $id){
        $roles = Role::find($id);
        if (!empty($roles)) {
            $roles->rolename = $request->input('rolename');
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $roles
            );
	    } else {
            $response = array(
                'error'=> true,
                'msg'  => 'Invalid'
            );
        }
        echo json_encode($response);

    }


/////////////////////////Delete Data //////////////////////////
	public function delete($id){
        $roles = Role::find($id);
        if (!empty($roles)) {
            $roles->delete();
            $res['success'] = true;
            return response($res, 200);
        } else {
            $res['success'] = false;
            $res['message'] = 'not found';
            return response($res, 200);
	    }
    }

}
