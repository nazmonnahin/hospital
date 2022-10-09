<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview(){

        return view('admin.add_doctor');
    }

    public function upload(Request $request ){

        $doctor=new doctor();

        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $doctor->save();

        return back()->with('message','Doctor Added Successfully');


     
    }

    public function show_appoinment ()
    {
        $data = appointment::all();
        
        return view('admin.show_appoinment',compact('data'));
    }

    public function approved($id)
    {
       $data=Appointment::find($id);

       $data->status='Approved';
       $data->save();

       return back();
    }

    public function cancel($id)
    {
       $data=Appointment::find($id);

       $data->status='Canceled';
       $data->save();

       return back();
    }
}
