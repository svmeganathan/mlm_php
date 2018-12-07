<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;


class DistrictsController extends Controller
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
            $query = District::orderBy($request->input('sortField'),$request->input('sortDirection'));
            if(!empty($request->input('search'))){
                $query->where( 'districtname', 'like', '%'.$request->input('search').'%' );
            }
            $count = $query->count();
            if(!empty($request->input('startOffset'))){
                $query->offset($request->input('startOffset'),$request->input('endOffset'))->limit($request->input('limit'));
            }
            $districts = $query->get();
            if (!empty($districts)) {
                $response = array(
                    'msg'   => 'Successfully',
                    'count' => $count,
                    'district' => $districts,
                );
            } else {
                $response = array(
                    'msg' => 'Failed'
                );
            }
        } else {
            $districts = User::all();
            $response = array(
                'district' => $districts
            );
            // echo json_encode($response);
        }
        echo json_encode($response);
    }


/////////////////////////Add or Create Data //////////////////////////
    public function add(Request $request){
        $districts = District::create([
            'districtname'=> $request->input('districtname'),
         ]);
        if (!empty($districts)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $districts
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
        $districts = District::find($id);
        if (!empty($districts)) {
            $districts->districtname = $request->input('districtname');
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $districts
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
        $districts = District::find($id);
        if (!empty($districts)) {
            $districts->delete();
            $res['success'] = true;
            return response($res, 200);
        } else {
            $res['success'] = false;
            $res['message'] = 'not found';
            return response($res, 200);
	    }
    }

}
