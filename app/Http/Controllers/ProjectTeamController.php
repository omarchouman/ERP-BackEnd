<?php

namespace App\Http\Controllers;

use App\Models\ProjectTeam;
use Illuminate\Http\Request;

class ProjectTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProjectTeam::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $project_team = new ProjectTeam();
        $project_team->fill($inputs);
        $project_team->save();

        return response()->json([
            'message' => 'Project Team Created Successfully!',
            'project_team' => $project_team
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
        return ProjectTeam::where('id',$id)->get();
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
        $project_team = ProjectTeam::where('id', $id)->get();
        $project_team->update($inputs);

        return response()->json([
            'message' => 'Project Team Updated Successfully!',
            'project_team' => $project_team
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
        ProjectTeam::where('id', $id)->delete();

        return response()->json([
            'message' => 'Project Team Deleted Successfully!'
        ]);
    }
}
