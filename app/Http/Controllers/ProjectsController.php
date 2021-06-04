<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return projects::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Project_name' => 'required',
            'share_amount' => 'required',
            'share_value' => 'required',
            'minimum_share' => 'required',
            'description' => 'required',
            'share_type' => 'required',
            'catagory_id' => 'required',
        ]);

        return projects::create($request->all());

        
        // $int = 0;
        // $count = count($request->Project);
        // for ($i = 0; $i < $count; $i++){
        // return projects::create($request->Project[$i]);
        // // return $request->Project;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $project = projects::find($id);
        $project->update($request->all());
        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return projects::destroy($id);
    }
    public function search($name)
    {
        return projects::where('name', 'like', '%'.$name.'%')->get();
    }
    public function findbyid(Request $id)
    {
        $project = projects::find($id);
        // $project->update($request->all());
        return response()->json($project);
    }
}
