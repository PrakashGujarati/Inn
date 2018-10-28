<?php

namespace App\Http\Controllers;

use Purpose;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:purpose.index')->only(['index']);
        $this->middleware('permission:purpose.create')->only('create','store');
        $this->middleware('permission:purpose.edit')->only('show','edit','update');
        $this->middleware('permission:purpose.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return view('GeneralMaster.Purpose.view');
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

        Auth::user()->purpose()->create($request->all());
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

         $pur = Auth::user()->purpose()->findOrFail($id);
         $pur->update($request->all());
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
        $pur = Auth::user()->purpose()->findOrFail($id);
        $pur->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $purpose = Auth::user()->purpose(); // It will only takes taxes of the logged in user
        return DataTables::of($purpose)
            ->addColumn('edit',function ($pur){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$pur->name.'" data-id="'.$pur->id.'"></button>';
            })
            ->addColumn('delete',function ($pur){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$pur->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
