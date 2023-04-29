<?php

namespace App\Http\Controllers;

use App\Models\services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = services::get();
        return view('admin.services.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
        services::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'Created_by' => (Auth::user()->name),
            'user_id' => auth()->id()

        ]);
        return redirect()->route('admin.services.index')->with('message','Service created successfully  ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = services::find($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = services::find($id);
        $service->update([
            'service_name' => $request->service_name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.services.index')->with('message','Service updated successfully ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = services::find($id);
        $service->delete();
        return redirect()->route('admin.services.index')->with('error','Service deleted successfully ');
    }
    protected function getRules(){
        return $rules = [
            'service_name' => 'required|max:255|unique:services,service_name',
        ];
    }
    protected function getMessages(){
        return $messages = [
            'service_name.required' => 'Service required!',
            'service_name.max' => 'Service must not be greater than 255 characters!',
            'service_name.unique' => 'This Service has already been taken!',
        ];
    }
}
