<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Gate::authorize('ads.view');
        $emergency = Emergency::get();
        return view('admin.emergency.create', ['emergency' => $emergency]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Gate::authorize('ads.create');

        $ads = new Emergency();
        return view('admin.emergency.create', ['ads' => $ads]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(Emergency::validateRule());

        $input = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $input['image'] = $image_path;
        }
        $success = $request->session()->flash('success', $request->name . ' ' . 'Update successfully');

        $Emergency = Emergency::create($input);
        return redirect()->route('emergency.index');
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
        // Gate::authorize('ads.update');
        $ads = Emergency::findOrfail($id);
        return view('admin.emergency.edit', ['ads' => $ads]);
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

        $ads = Emergency::find($id);
        $ads->update($request->all());
        $success = $request->session()->flash('success', $request->name . ' ' . 'Update successfully');
        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ads = Emergency::findorfail($id);
        $ads->delete();
        $success = session()->flash('success', $ads->title . ' Deleted successfully');
        return redirect()->back();
    }
}
