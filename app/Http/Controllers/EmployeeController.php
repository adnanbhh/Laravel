<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUser;
use Laravel\Jetstream\Jetstream;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     public function index()
   {
       return view('admin.employee');
   }


   public function store(Request $request)
   {
       $employees= new User();
       $employees->name=$request->input('name');
       $employees->email=$request->input('email');
       $employees->password=$request->input('password');
       $employees->utype='EMP';
       if($request->hasfile('image'))
       {
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filename=time() . '.' . $extension;
          $file->move('uploads/employee/',$filename);
          $employees->image=$filename;

       }else{
            return $request;
            $highlights->image='';
       }
        $employees->save();
        $employees=User::where('utype', 'EMP')->get();
        return view('admin.employeeform')->with('employees',$employees);
   }

    public function showEmployee(Request $request)
   {
    $employees=User::where('utype', 'EMP')->get();
        return view('admin.employeeform')->with('employees',$employees);
   }

   public function show(Request $request)
   {
    $employees=User::where('utype', 'EMP')->get();
    return view('admin.data_view_employee')->with('data',$employees);
   }
}
