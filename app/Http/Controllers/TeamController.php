<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Employee;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::paginate(10);
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
        $team = new Team();
        $team->fill($inputs);
        $team->save();

        return response()->json([
            'message' => 'Team Created Successfully!',
            'team' => $team
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
        return Team::where('id',$id)->get();
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
        $team = Team::where('id', $id)->get();
        $team->update($inputs);

        return response()->json([
            'message' => 'Team Updated Successfully!',
            'team' => $team
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
        $team = Team::where('id', $id)->first();

        if($team){
            if(Employee::where('team_id', $id)->count()>0) {
                return response()->json([
                    'message' => 'Cant delete team while employees assigned to it'
                ]);
            } else {
                return response()->json([
                    'message' => 'Team deleted successfully'
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Unable to delete team'
            ]);
        }

        Team::where('id', $id)->delete();

        return response()->json([
            'message' => 'Team Deleted Successfully!'
        ]);
    }
}
