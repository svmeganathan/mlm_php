<?php
namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
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

        $country = new Country();
        $country->name = $request->name;
        $country->isactive = $request->isactive;
      $country->save();

        if($country->save())
        {
            $response = response()->json(
                [
                    'response' => [
                        'created' => true,
                        'userId' => $country->id
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
