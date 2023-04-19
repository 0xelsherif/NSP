<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Country;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Clients::get();
        return view('admin.clients.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $categories = Categories::pluck('name', 'id');
        return view('admin.clients.create', compact('countries','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this -> getRules();
        $messages = $this -> getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        //    return $validator -> errors(); 
        }
        Clients::create([
            'client_number' => $request->client_number,
            'client_name' => $request->client_name,
            'country_id' => $request->country_id,
            'categories_id' => $request->categories_id,
            'notes' => $request->notes,
            'Created_by' => (Auth::user()->name),
            'user_id' => auth()->id()

        ]);
        return redirect()->route('admin.clients.index')->with('message','Client added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::find($id);
        $countries = Country::pluck('name', 'id');
        $categories = Categories::pluck('name', 'id');
        return view('admin.clients.edit', compact('client', 'countries', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clients = Clients::find($id);
        $clients->update([
            'client_number' => $request->client_number,
            'client_name' => $request->client_name,
            'country_id' => $request->country_id,
            'categories_id' => $request->categories_id,
            'notes' => $request->notes,
            'status' => $request->has('status'),
        ]);
        return redirect()->route('admin.clients.index')->with('message','Client updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
//     public function delete($id)
// {
//     $clients = Clients::find($id);

//     return view('admin.clients.delete', compact('clients'));
// }
     public function destroy($id)
    {
        $clients = Clients::find($id);
        $clients->delete();
        return redirect()->route('admin.clients.index')->with('error','Client Deleted Successfully');
    }
    protected function getRules(){
        return $rules = [
            'client_number' => 'required|max:10|unique:clients,client_number',
            'client_name' => 'required|max:100|unique:clients,client_name',
            'country_id' => 'required',
            'categories_id' => 'required',
        ];
    }
    protected function getMessages(){
        return $messages = [
            'client_number.required' => 'Client Serial required!',
            'client_number.max' => 'Client Serial must not be greater than 10 characters!',
            'client_number.unique' => 'Client Serial has already been taken!',
            'client_name.required' => 'Client Name required!',
            'client_name.max' => 'Client Name must not be greater than 10 characters!',
            'client_name.unique' => 'Client Name has already been taken!',
        ];
    }
}
