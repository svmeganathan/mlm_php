<?php
namespace App\Http\Controllers;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
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
    public function add(Request $request)
    {
        $response =
        $this->validate(
            $request, [
                'name' => 'required',
                'isactive' => 'required'
            ]
        );

        $district = new District();
        $district->name = $request->name;
        $district->isactive = $request->isactive;
      $district->save();

        if($district->save())
        {
            $response = response()->json(
                [
                    'response' => [
                        'created' => true,
                        'userId' => $district->id
                    ]
                ], 201
            );
        }
      }
	  public function update(Request $request){
    }

    public function delete(Request $request){
    }
    }
