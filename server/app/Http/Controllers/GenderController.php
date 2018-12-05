<?php
namespace App\Http\Controllers;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
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

        $gender = new Gender();
        $gender->name = $request->name;
        $gender->isactive = $request->isactive;
      $gender->save();

        if($gender->save())
        {
            $response = response()->json(
                [
                    'response' => [
                        'created' => true,
                        'userId' => $gender->id
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
