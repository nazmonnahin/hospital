<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id()){

            if(Auth::User()->usertype=='0'){
                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{

                return view('admin.home');
            }
        }
        else{

            return redirect()->back();
        }
    }

    public function index(){

        if (Auth::id()) {
            return redirect('home');
        } 
        
        else {

            $doctor = Doctor::all();
            return view('user.home',compact('doctor'));
        }
        
    }

    public function appointment(Request $request)
    {
        $data = new Appointment;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->doctor=$request->doctor;
        $data->text=$request->text;
        $data->status='In Progress';

        if (Auth::id()) {
            $data->user_id=Auth::user()->id;
        }

        $data->save();
        return back()->with('message','Appoinment Request Submit Successfully . We will contact soon');
        
    }



    public function myappointment (){

        if(Auth::id()){

            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();

            return view('user.my_appointment',compact('appoint'));
        }
        else{
            return back();
        }

    }


    public function cancel_appoint($id){

        $data= appointment::find($id);
        $data->delete();

        return back();

    }

     
}
