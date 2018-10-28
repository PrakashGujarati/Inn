<?php

namespace App\Http\Controllers;

use Functionmaster;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class FunctionmasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:function.index')->only(['index']);
        $this->middleware('permission:function.create')->only('create','store');
        $this->middleware('permission:function.edit')->only('show','edit','update');
        $this->middleware('permission:function.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GeneralMaster.Functionmaster.view');
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
        $request->validate([
            'name' => 'required'
        ]);

        Auth::user()->functionMaster()->create($request->all());
        return response('success');
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
        $request->validate([
            'name' => 'required'
        ]);

         $fun = Auth::user()->functionMaster()->findOrFail($id);
         $fun->update($request->all());
         return response('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fun = Auth::user()->functionMaster()->findOrFail($id);
        $fun->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $function = Auth::user()->functionMaster(); // It will only takes taxes of the logged in user
        return DataTables::of($function)
            ->addColumn('edit',function ($fun){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$fun->name.'" data-id="'.$fun->id.'"></button>';
            })
            ->addColumn('delete',function ($fun){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$fun->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
