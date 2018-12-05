<?php
namespace App\Http\Controllers;
use App\District;
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
    public function createDistrict(Request $request)
    {
        $response =
        $this->validate(
            $request, [
                'name' => 'required'
                'isactive' => 'required'
            ]
        );

        $user = new District();
        $user->name = $request->name;
        $user->isactive = $request->isactive;

        $user->save();

        echo "DATA SAVED";
    }
}
