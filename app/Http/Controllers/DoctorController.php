<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use Illuminate\Http\Request;
use App\Http\Requests\StroeDoctor;
use App\Http\Requests\UpdateDoctor;
use App\Models\department;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = doctor::all();


        return view('doctor.main', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = department::all();

        return view("doctor.create", compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StroeDoctor $request)
    {
        $insert = doctor::create($request->all());
        $insert->departments()->attach($request->department);
        return redirect()->to('/doctor')->with('massage', __('Add Doctor profile successful'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(doctor $doctor)
    {
        $doctors = doctor::find($doctor->id);
        if ($doctors) {

            $doctorDepartments = $doctors->departments()->pluck('id')->toArray();
            $departments = department::all();
            return view('doctor.edit', compact('doctors', 'departments', 'doctorDepartments'));
        } else {
            return  abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctor $doctor)
    {

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required||unique:doctors,email,' . $doctor->id . ',id,deleted_at,NULL',
            'phone' => 'required||unique:doctors,phone,' . $doctor->id . ',id,deleted_at,NULL',
            'gender' => 'required',
            'description' => 'required'
        ]);

        $doctor->update($request->all());
        $doctor->departments()->sync($request->department);
        return redirect()->to('/doctor')->with('massage', __('Update information successful'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctor $doctor)
    {
        $doctor->update(['email' => time() . '::' . $doctor->email, 'phone' => time() . '::' . $doctor->phone]);
        $doctor->delete();

        return redirect()->to('/doctor')->with('massage', __('Delete profile successful'));
    }
}
