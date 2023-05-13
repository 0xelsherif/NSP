<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\services;
use App\Models\projects;
use App\Models\leads;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::pluck('client_name','id');
        $services = services::pluck('service_name','id');
        // $projects = projects::pluck('project_name','id');
        return view('admin.invoices.create', compact('clients','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        invoices::create([
        'invoice_number' => $request->invoice_number,
        'invoice_Date' => date('Y-m-d' , strtotime($request->invoice_Date)),
        'collect_date' => date('Y-m-d' , strtotime($request->collect_date)),
        'due_date' => date('Y-m-d' , strtotime($request->due_date)),
        'client_id' => $request->client_id,
        'lead_id' => $request->lead_id,
        'service_id' => $request->service_id,
        'project_id' => $request->project_id,
        'price' => $request->price,
        'vat' => $request->vat,
        'total' => $request->total,
        // 'status' => $request->status,
        // 'value_Status' => $request->value_Status,
        'note' => $request->note,
        'Created_by' => (Auth::user()->name),
        'user_id' => auth()->id()
    
    ]);
    return redirect()->route('admin.invoices.index')->with('message','Invoice created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoices $invoices)
    {
        //
    }
    public function getexProject($id)
    {
        $clp = projects::where('client_id',$id)->get();
        return response()->json($clp);
    }
    public function getexLead($id)
    {
        $cll = leads::where('client_id',$id)->get();
        return response()->json($cll);
    }
}
