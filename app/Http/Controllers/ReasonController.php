<?php

namespace App\Http\Controllers;

use Reason;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:reason.index')->only(['index']);
        $this->middleware('permission:reason.create')->only('create','store');
        $this->middleware('permission:reason.edit')->only('show','edit','update');
        $this->middleware('permission:reason.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GeneralMaster.Reason.view');
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

        Auth::user()->reason()->create($request->all());
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

         $res = Auth::user()->reason()->findOrFail($id);
         $res->update($request->all());
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
        $res = Auth::user()->reason()->findOrFail($id);
        $res->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $reason = Auth::user()->reason(); // It will only takes taxes of the logged in user
        return DataTables::of($reason)
            ->addColumn('edit',function ($res){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$res->name.'" data-id="'.$res->id.'"></button>';
            })
            ->addColumn('delete',function ($res){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$res->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
