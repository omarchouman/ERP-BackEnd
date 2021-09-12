<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::with('team')->paginate(10);
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
        $project = new Project();
        $project->fill($inputs);
        $project->save();

        return response()->json([
            'message' => 'Project Created Successfully!',
            'project' => $project
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
        return Project::with('team')->where('id', $id)->get();
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
        $project = Project::where('id', $id)->first();
        $project->update($inputs);

        return response()->json([
            'message' => 'Project Updated Successfully!',
            'project' => $project
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
        $project = Project::where('id', $id)->first();

        if($project) {
            if(ProjectTeam::where('project_id', $id)->count() > 0) {
                return response()->json([
                    'message' => 'Cant delete project while teams assigned to it'
                ]);
            } else {
                return response()->json([
                    'message' => "Project deleted successfully"
                ]);
            };
        } else {
                return response()->json([
                    'message' => "Unable to delete project"
                ]);
        }

        Project::where('id', $id)->delete();

        return response()->json([
            'message' => 'Project Deleted Successfully!'
        ]);
    }
}
