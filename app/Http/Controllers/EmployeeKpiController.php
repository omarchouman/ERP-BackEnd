<?php

namespace App\Http\Controllers;

use App\Models\EmployeeKpi;
use Illuminate\Http\Request;

class EmployeeKpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeKpi::paginate(10);
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
            'level' => 'integer|min:1|max:100',
        ]);

        $inputs = $request->all();
        $employee_kpi = new EmployeeKpi();
        $employee_kpi->fill($inputs);
        $employee_kpi->save();

        return response()->json([
            'message' => 'Employee Kpi Created Successfully!',
            'employee_kpi' => $employee_kpi
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
        return EmployeeKpi::where('id', $id)->get();
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

        $request->validate([
            'level' => 'integer|min:1|max:100',
        ]);

        $inputs = $request->all();
        $employee_kpi = EmployeeKpi::where('id', $id)->first();
        $employee_kpi->update($inputs);

        return response()->json([
            'message' => 'Employee Kpi Updated Successfully!',
            'employee_kpi' => $employee_kpi
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
        EmployeeKpi::where('id', $id)->delete();

        return response()->json([
           'message' => 'Employee Kpi Deleted Successfully'
        ]);
    }
}
