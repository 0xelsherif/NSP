<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = projects::orderBy('created_at', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::pluck('client_name','id');
        return view('admin.projects.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        projects::create([
            'project_number' => $request->project_number,
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'notes' => $request->notes,
            'project_status' => $request->project_status,
            'Created_by' => (Auth::user()->name),
            'user_id' => auth()->id()

        ]);
        return redirect()->route('admin.projects.index')->with('message','Project created successfully  ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects, $id)
    {
        $projects = projects::find($id);
        $client = Clients::pluck('client_name', 'id');
        return view('admin.projects.edit', compact('projects','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $projects , $id)
    {
        $projects = projects::find($id);
        $projects->update([
            'project_number' => $request->project_number,
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'notes' => $request->notes,
            'project_status' => $request->project_status,
            'status' => $request->has('status'),
        ]);
        return redirect()->route('admin.projects.index')->with('message','Project updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects, $id)
    {
        $projects  = projects::find($id);
        $projects->delete();
        return redirect()->route('admin.projects.index')->with('error','Project deleted successfully ');
    }
}
