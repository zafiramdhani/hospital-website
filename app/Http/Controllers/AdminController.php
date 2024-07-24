<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showdoctors()
    {
        $doctors = Doctor::all();

        return view('admin.show_doctors', compact('doctors'));
    }

    public function adddoctor()
    {
        return view('admin.add_doctor');
    }

    public function uploaddoctor(Request $request)
    {
        if ($request->hasFile('picture')) {
            // picture upload
            $doctor = new Doctor;
            $picture = $request->file('picture');
            $picturename = time() . '.' . $picture->getClientOriginalExtension();
            $request->file('picture')->move('doctorpicture', $picturename);
            $doctor->image = $picturename;

            $doctor->name = $request->name;
            $doctor->phone = $request->number;
            $doctor->speciality = $request->speciality;
            $doctor->room = $request->room;

            $doctor->save();

            return redirect()->back()->with('message', 'A Doctor has been added!');
        } else {
            return redirect()->back()->with('error', 'Please upload a picture!');
        }
    }

    public function delete_doctor($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->back();
    }

    public function showappointments()
    {
        $datas = Appointment::all();

        return view('admin.show_appointments', compact('datas'));
    }

    public function delete_appointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect()->back();
    }

    public function approve($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Disetujui';
        $data->save();

        return redirect()->back();
    }

    public function refuse($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Ditolak';
        $data->save();

        return redirect()->back();
    }
}
