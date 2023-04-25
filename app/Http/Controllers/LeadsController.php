<?php

namespace App\Http\Controllers;

use App\Models\leads;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lead = leads::orderBy('created_at', 'DESC')->get();
        return view('admin.leads.index', compact('lead'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::pluck('client_name','id');
        return view('admin.leads.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        leads::create([
            'lead_number' => $request->lead_number,
            'lead_name' => $request->lead_name,
            'lead_phone' => $request->lead_phone,
            'lead_email' => $request->lead_email,
            'lead_job' => $request->lead_job,
            'client_id' => $request->client_id,
            'notes' => $request->notes,
            'Created_by' => (Auth::user()->name),
            'user_id' => auth()->id()

        ]);
        return redirect()->route('admin.leads.index')->with('message','Lead added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function show(leads $leads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leads = leads::find($id);
        $client = Clients::pluck('client_name', 'id');
        return view('admin.leads.edit', compact('client','leads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, leads $leads , $id)
    {
        $leads = leads::find($id);
        $leads->update([
            'lead_number' => $request->lead_number,
            'lead_name' => $request->lead_name,
            'lead_phone' => $request->lead_phone,
            'lead_email' => $request->lead_email,
            'lead_job' => $request->lead_job,
            'client_id' => $request->client_id,
            'notes' => $request->notes,
            'status' => $request->has('status'),
        ]);
        return redirect()->route('admin.leads.index')->with('message','Lead updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leads = leads::find($id);
        $leads->delete();
        return redirect()->route('admin.leads.index')->with('error','Lead Deleted Successfully');
    }
}
