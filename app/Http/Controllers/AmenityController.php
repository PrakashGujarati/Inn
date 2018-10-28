<?php

namespace App\Http\Controllers;

use Amenity;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class AmenityController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:amenity.index')->only(['index']);
        $this->middleware('permission:amenity.create')->only('create','store');
        $this->middleware('permission:amenity.edit')->only('show','edit','update');
        $this->middleware('permission:amenity.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('RoomMaster.Amenity.view');
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

        Auth::user()->amenity()->create($request->all());
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

         $amt = Auth::user()->amenity()->findOrFail($id);
         $amt->update($request->all());
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
        $amt = Auth::user()->amenity()->findOrFail($id);
        $amt->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $amenity = Auth::user()->amenity(); // It will only takes taxes of the logged in user
        return DataTables::of($amenity)
            ->addColumn('edit',function ($amt){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$amt->name.'" data-atype="'.$amt->amenity_type.'" data-id="'.$amt->id.'"></button>';
            })
            ->addColumn('delete',function ($amt){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$amt->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
