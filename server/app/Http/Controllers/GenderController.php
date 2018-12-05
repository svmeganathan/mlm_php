<?php
namespace App\Http\Controllers;
use App\Gender;
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
    public function createGender(Request $request)
    {
        $response =
        $this->validate(
            $request, [
                'name' => 'required',
                'isactive' => 'required'
            ]
        );

        $user = new Gender();
        $user->name = $request->name;
        $user->isactive = $request->isactive;

        $user->save();

        echo "DATA SAVED";
    }
}
