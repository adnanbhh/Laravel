<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Labos;

class LabosController extends Controller
{
   public function index()
   {
       return view('admin.labos');
   }
   public function store(Request $request)
   {
       $labos= new Labos();
       $labos->name=$request->input('name');
       $labos->email=$request->input('email');
       $labos->post=$request->input('post');
        if($request->hasfile('image'))
        {
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filename=time() . '.' . $extension;
          $file->move('uploads/labos/',$filename);
          $labos->image=$filename;

        }else{
            return $request;
            $highlights->image='';
        }
        if($labos->post=='casa')
        {
            $labos->state_id='1';
        }elseif ($labos->post=='rabat')
        {
        $labos->state_id='2';
	    }elseif ($labos->post=='paris')
        {
        $labos->state_id='3';
	    }elseif ($labos->post=='lyon')
        {
        $labos->state_id='4';
	    }

        $labos->save();
         $labos=Labos::all();
        return view('admin.labosform')->with('labos',$labos);
   }
    public function showlabos(Request $request)
   {
        $labos=Labos::all();
        return view('home')->with('labos',$labos);
        }
   public function show(Request $request)
   {
    $labos=Labos::all();
    return view('admin.data_view')->with('data',$labos);
   }
}
