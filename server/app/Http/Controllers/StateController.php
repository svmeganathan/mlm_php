<?php
namespace App\Http\Controllers;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
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

        $state = new State();
        $state->name = $request->name;
        $state->isactive = $request->isactive;
        $state->save();

        if($state->save())
        {
            $response = response()->json(
                [
                    'response' => [
                        'created' => true,
                        'userId' => $state->id
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
