<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function appointment(Request $request)
    {
        $appointment = new Appointment;

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->phone = $request->phone;
        $appointment->message = $request->message;
        $appointment->doctor = $request->doctor;
        $appointment->status = 'Ditunda';

        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        return redirect()->back()->with('message', 'Appointment created successfully! We will contact you as soon as possible!');
    }

    public function myappointment()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $get_appointments = Appointment::where('user_id', '=', $userid)->get();

            return view('user.my_appointment', compact('get_appointments'));
        } else {
            return redirect()->back();
        }
    }

    public function cancelappointment($id)
    {
        $data = Appointment::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Appointment canceled successfully!');
    }
}
