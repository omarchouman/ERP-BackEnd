<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $inputs = $request->all();

        $newImageName = time() . '-' . $request->first_name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $inputs['image'] = "/images/" . $newImageName;
        $employee = new Employee();
        $employee->fill($inputs);
        $employee->save();

        return response()->json([
           'message' => 'Employee Created Successfully!',
           'employee' => $employee
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::where('id', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $employee = Employee::where('id', $id)->get();
        $employee->update($inputs);

        return response()->json([
            'message' => 'Employee Updated Successfully!',
            'employee' => $employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Employee::where('id', $id)->delete();

        return response()->json([
            'message' => 'Employee Deleted Successfully!'
        ]);
    }
}
