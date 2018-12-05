<?php
namespace App\Http\Controllers;
use App\State;
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
    public function createState(Request $request)
    {
        $response =
        $this->validate(
            $request, [
                'name' => 'required',
                'isactive' => 'required'
            ]
        );

        $user = new State();
        $user->name = $request->name;
        $user->isactive = $request->isactive;

        $user->save();

        echo "DATA SAVED";
    }
}
