<?php
namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
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

        $role = new Role();
        $role->name = $request->name;
        $role->isactive = $request->isactive;
        $role->save();

        if($role->save())
        {
            $response = response()->json(
                [
                    'response' => [
                        'created' => true,
                        'userId' => $role->id
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
