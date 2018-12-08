<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;


class GendersController extends Controller
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
            $query = Gender::orderBy($request->input('sortField'),$request->input('sortDirection'));
            if(!empty($request->input('search'))){
                $query->where( 'gender', 'like', '%'.$request->input('search').'%' );
            }
            $count = $query->count();
            if(!empty($request->input('startOffset'))){
                $query->offset($request->input('startOffset'),$request->input('endOffset'))->limit($request->input('limit'));
            }
            $genders = $query->get();
            if (!empty($genders)) {
                $response = array(
                    'msg'   => 'Successfully',
                    'count' => $count,
                    'gender' => $genders,
                );
            } else {
                $response = array(
                    'msg' => 'Failed'
                );
            }
        } else {
            $genders = User::all();
            $response = array(
                'gender' => $genders
            );
            // echo json_encode($response);
        }
        echo json_encode($response);
    }


/////////////////////////Add or Create Data //////////////////////////
    public function add(Request $request){
        $genders = Gender::create([
            'gender'=> $request->input('gender'),
         ]);
        if (!empty($genders)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $genders
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
        $genders = Gender::find($id);
        if (!empty($genders)) {
            $genders->gender = $request->input('gender');
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $genders
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
        $genders = Gender::find($id);
        if (!empty($genders)) {
            $genders->delete();
            $res['success'] = true;
            return response($res, 200);
        } else {
            $res['success'] = false;
            $res['message'] = 'not found';
            return response($res, 200);
	    }
    }

}
