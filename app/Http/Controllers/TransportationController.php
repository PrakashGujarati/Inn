<?php

namespace App\Http\Controllers;

use Transportation;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:transmode.index')->only(['index']);
        $this->middleware('permission:transmode.create')->only('create','store');
        $this->middleware('permission:transmode.edit')->only('show','edit','update');
        $this->middleware('permission:transmode.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Masters.Transportation.view');
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

        Auth::user()->transportation()->create($request->all());
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

         $tm = Auth::user()->transportation()->findOrFail($id);
         $tm->update($request->all());
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
        $tm = Auth::user()->transportation()->findOrFail($id);
        $tm->delete();
        return response('Success');
    }
    public function getDataTable()
    {
        $tmode = Auth::user()->transportation(); // It will only takes taxes of the logged in user
        return DataTables::of($tmode)
            ->addColumn('edit',function ($tm){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$tm->name.'" data-id="'.$tm->id.'"></button>';
            })
            ->addColumn('delete',function ($tm){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$tm->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
