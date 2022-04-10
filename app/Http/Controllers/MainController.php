<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\State;
use  App\Models\Country;
use  App\Models\Labos;
use DB;
class MainController extends Controller
{
    public function index()
    {
    $country = Country::all();
    return view('choixindex',compact('country'));
    }

    public function getStates($id)
    {
    $states = DB::table("states")->where("country_id",$id)->pluck("name","id");
    return json_encode($states);
    }

   public function getData($id)
   {
    $data =Labos::where("state_id",$id)->get();
    return view('data_view',compact('data'));
   }
}
