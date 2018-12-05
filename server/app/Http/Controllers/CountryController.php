<?php
namespace App\Http\Controllers;
use App\Country;
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
    public function createCountry(Request $request)
    {
        $response =
        $this->validate(
            $request, [
                'name' => 'required',
                'isactive' => 'required'
            ]
        );

        $user = new Country();
        $user->name = $request->name;
        $user->isactive = $request->isactive;

        $user->save();

        echo "DATA SAVED";
    }
}
