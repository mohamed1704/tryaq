<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Meal;
use App\Models\Patient;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Patient::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('image', 'admin.patients._image')

                ->editColumn('status', 'admin.patients.status')

                ->addColumn('action', 'admin.patients.action_icon')
                ->rawColumns(['action', 'image', 'status'])
                ->make(true);
        }
        $patient = Patient::all();
        return view('admin.patients.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $patient = Patient::all();
        return view('admin.patients.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);
        //requset Merge ^_^
        $request->merge([
            'slug' => Str::slug($request->get('name')),
            'department_id' => $request->departments,
        ]);


        $input = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $input['image'] = $image_path;
        }


        $patient = Patient::create($input);
        //  Write into session
        $success = $request->session()->flash('success', $request->name . ' ' . 'تمت الإضافة بنجاح');
        return redirect()->route('patients.index', ['patient' => $patient]);
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
        $patient = Patient::find($id);

        return view('admin.patients.edit', compact('patient'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'resturant_id' => 'required',

        ]);
        //requset Merge ^_^

        $patient = Patient::find($id);
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $input['image'] = $image_path;
        }


        $patient->update($input);
        //  Write into session
        $success = $request->session()->flash('success', $request->name . 'add successfully');
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findorfail($id);
        $patient->delete();
        $success = session()->flash('success',  $patient->name . ' Deleted successfully');
        return redirect()->back();
    }
}
