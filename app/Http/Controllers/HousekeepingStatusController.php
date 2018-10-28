<?php

namespace App\Http\Controllers;

use App\HousekeepingStatus;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class HousekeepingStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:hkstatus.index')->only(['index']);
        $this->middleware('permission:hkstatus.create')->only('create','store');
        $this->middleware('permission:hkstatus.edit')->only('show','edit','update');
        $this->middleware('permission:hkstatus.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('HouseKeeping.Status.view');
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
            'status' => 'required',
            'color' => 'required'
        ]);

        Auth::user()->housekeepingStatus()->create($request->all());
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
            'status' => 'required',
            'color' => 'required'
        ]);

         $hks = Auth::user()->housekeepingStatus()->findOrFail($id);
         $hks->update($request->all());
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
        $hks = Auth::user()->housekeepingStatus()->findOrFail($id);
        $hks->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $hkstatus = Auth::user()->housekeepingStatus()->get(); // It will only takes all records of the logged in user for particular table
        return DataTables::of($hkstatus)
            ->addColumn('edit',function ($hks){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-status="'.$hks->status.'" data-color="'.$hks->color.'" data-is_dirty="'.$hks->is_dirty.'" data-id="'.$hks->id.'"></button>';
            })
            ->addColumn('delete',function ($hks){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$hks->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
