<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Doctor::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('department_id', function (Doctor $model) {
                    return $model->department_id ? $model->Department->name : '';
                })
                ->addColumn('action', 'admin.doctors.action_icon')

                ->editColumn('image', 'admin.doctors._image')
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        //$categories = Category::paginate(5);
        return view('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $doctors = Doctor::where('status', '=', 'Active')->get();
        $doctor = new Doctor();
        // return view('admin.doctors.create', ['doctors' => $doctors, 'category' => $category , 'cities'=>$cities]);

        return view('admin.doctors.create', compact('doctors', 'doctor', 'cities'));
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


        $doctors = Doctor::create($input);
        //  Write into session
        $success = $request->session()->flash('success', $request->name . ' ' . 'تمت الإضافة بنجاح');
        return redirect()->route('doctors.index', ['doctors' => $doctors]);
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
        // Gate::authorize('doctors.update');
        // $doctor = Doctor::all();
        $doc = Doctor::findorfail($id);
        // $doctors = Doctor::where('status', '=', 'Active')->get();
        // return view('admin.doctors.edit', ['doctors' => $doctors, 'doc' => $doc]);
        return view('admin.doctors.edit', compact('doc'));
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
        // Gate::authorize('doctors.update');
        // $request->validate(Doctor::validateRule($id));
        $doctor = Doctor::find($id);
        #Method 4 : Mass assignment
        $request->merge([
            'slug' => Str::slug($request->get('name')),
        ]);

        $doctor->update($request->all());
        $success = $request->session()->flash('success', $request->name . ' ' . 'تم التحديث');



        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Gate::authorize('categories.delete');
        $doc = Doctor::findorfail($id);
        $doc->delete();
        $success = session()->flash('success', $doc->name . ' تم الحذف بنجاح');
        return redirect()->back();
    }
}
