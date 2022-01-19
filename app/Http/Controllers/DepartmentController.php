<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartment;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = department::all();

        return view('department.main',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartment $request)
    {
        $departments = department::create($request->all());
        return redirect()->to('/department')->with('massage','Add Department Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department)
    {
       $departments=department::find($department->id);
       if($departments){
return view('department.edit', compact('department'));
       } else {
           return abort(401);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartment $request, department $department)
    {
     $department->update($request->all());
     return redirect()->to('/department')->with('massage','Department Update Information Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(department $department)
    {
      $department->delete();
      return redirect()->to('/department')->with('massage','Department Delete Information Successful');

    }
}
