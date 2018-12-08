<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;


class CountriesController extends Controller
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
            $query = Country::orderBy($request->input('sortField'),$request->input('sortDirection'));
            if(!empty($request->input('search'))){
                $query->where( 'countryname', 'like', '%'.$request->input('search').'%' );
           }
            $count = $query->count();
            if(!empty($request->input('startOffset'))){
                $query->offset($request->input('startOffset'),$request->input('endOffset'))->limit($request->input('limit'));
            }
            $countries = $query->get();
            if (!empty($countries)) {
                $response = array(
                    'msg'   => 'Successfully',
                    'count' => $count,
                    'countries' => $countries,
                );
            } else {
                $response = array(
                    'msg' => 'Failed'
                );
            }
        } else {
            $countries = Country::all();
            $response = array(
                'countries' => $countries
            );
            // echo json_encode($response);
        }
        echo json_encode($response);
    }


/////////////////////////Add or Create Data //////////////////////////
    public function add(Request $request){
        $country = Country::create([
            'countryname'=> $request->input('countryname'),
         ]);
        if (!empty($country)) {
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $country
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
        $country = Country::find($id);
        if (!empty($country)) {
            $country->countryname = $request->input('countryname');
            $response = array(
                'error'=> false,
                'msg'  => 'Successfully',
                'data' => $country
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
        $country = Country::find($id);
        if (!empty($country)) {
            $country->delete();
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
