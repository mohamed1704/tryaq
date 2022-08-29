<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Department;
use Illuminate\Support\Str;



class ServiceController extends Controller
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
                // ->editColumn('department_id', function (Service $model) {
                //     return $model->department_id ? $model->Service->name : '';
                // })
                ->addColumn('action', 'admin.servises.action_icon')
                ->editColumn('image', 'admin.servises._image')
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        $dep = Department::get(['id','name']);
        $service = Service::all();
        $ser = Service::get(['id','status']);
        return view('admin.servises.index', [
            'service' => $service,
            'dep' => $dep,
            'ser' => $ser
        ]);

        // return view('admin.servises.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $serv = Service::all();
        return view('admin.servises.create', compact('serv'));
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


        $service = Service::create($input);

        //  Write into session
        $success = $request->session()->flash('success', $request->name . ' ' . 'تمت الإضافة بنجاح');
        return redirect()->route('service.index', ['service' => $service]);
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
        $service = Service::findorfail($id);
        // $request->merge([
        //     'department_id' => $request->departments,
        // ]);
        return view('admin.servises.edit', compact('service'));

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
        $service = Service::find($id);
        #Method 4 : Mass assignment
        $request->merge([
            'slug' => Str::slug($request->get('name')),
        ]);

        $service->update($request->all());
        $success = $request->session()->flash('success', $request->name . ' ' . 'تم التحديث');



        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findorfail($id);
        $service->delete();
        $success = session()->flash('success', $service->name . ' تم الحذف بنجاح');

        return redirect()->back();
    }
}
