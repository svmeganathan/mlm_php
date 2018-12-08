<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;


class StatesController extends Controller
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
            $query = State::orderBy($request->input('sortField'),$request->input('sortDirection'));
            if(!empty($request->input('search'))){
                $query->where( 'statename', 'like', '%'.$request->input('search').'%' );
            }
            $count = $query->count();
            if(!empty($request->input('startOffset'))){
                $query->offset($request->input('startOffset'),$request->input('endOffset'))->limit($request->input('limit'));
            }
            $states = $query->get();
            if (!empty($states)) {
                $response = array(
                    'msg'   => 'Successfully',
                    'count' => $count,
                    'states' => $states,
                );
            } else {
                $response = array(
                    'msg' => 'Failed'
                );
            }
        } else {
            $states = State::all();
            $response = array(
                'states' => $states
            );
            // echo json_encode($response);
        }
        echo json_encode($response);
    }


/////////////////////////Add or Create Data //////////////////////////
    public function add(Request $request){
        $state = State::create([
            'statename'=> $request->input('statename'),
         ]);
        if (!empty($state)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $state
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
        $state = State::find($id);
        if (!empty($state)) {
            $state->statename = $request->input('statename');
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $state
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
        $state = State::find($id);
        if (!empty($state)) {
            $state->delete();
            $res['success'] = true;
            return response($res, 200);
        } else {
            $res['success'] = false;
            $res['message'] = 'not found';
            return response($res, 200);
        }
        echo json_encode($res);
    }

}
