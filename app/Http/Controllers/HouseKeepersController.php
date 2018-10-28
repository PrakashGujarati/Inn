<?php

namespace App\Http\Controllers;

use HouseKeeper;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class HouseKeepersController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:housekeepers.index')->only(['index']);
        $this->middleware('permission:housekeepers.create')->only('create','store');
        $this->middleware('permission:housekeepers.edit')->only('show','edit','update');
        $this->middleware('permission:housekeepers.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('HouseKeeping.HouseKeeper.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        Auth::user()->houseKeepers()->create($request->all());
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

         $hk = Auth::user()->houseKeepers()->findOrFail($id);
         $hk->update($request->all());
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
        $hk = Auth::user()->houseKeepers()->findOrFail($id);
        $hk->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $hkeepers = Auth::user()->houseKeepers(); // It will only takes taxes of the logged in user
        return DataTables::of($hkeepers)
            ->addColumn('edit',function ($hk){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$hk->name.'" data-mobile_no="'.$hk->mobile_no.'" data-user_name="'.$hk->user_name.'" data-password="'.$hk->password.'" data-id="'.$hk->id.'"></button>';
            })
            ->addColumn('delete',function ($hk){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$hk->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
