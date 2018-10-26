<?php

namespace App\Http\Controllers;

use App\LedgerGroup;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class LedgerGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ledgergroups.index')->only(['index']);
        $this->middleware('permission:ledgergroups.create')->only('create','store');
        $this->middleware('permission:ledgergroups.edit')->only('show','edit','update');
        $this->middleware('permission:ledgergroups.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('LedgerMaster.Group.view');
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
            'name' => 'required',
            'alias' => 'required'
        ]);

        Auth::user()->ledgerGroups()->create($request->all());
        return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function show(LedgerGroup $ledgerGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(LedgerGroup $ledgerGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'alias' => 'required'
        ]);

        $ledgergroup = Auth::user()->ledgerGroups()->findOrFail($id);
        $ledgergroup->update($request->all());
        return response('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ledgergroup = Auth::user()->ledgerGroups()->findOrFail($id);
        $ledgergroup->delete();
        return response('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function getDataTable()
    {
        $ledgergroups = Auth::user()->ledgerGroups();
        return DataTables::of($ledgergroups)
            ->addColumn('edit',function ($ledgergroup){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$ledgergroup->name.'" data-alias="'.$ledgergroup->alias.'" data-id="'.$ledgergroup->id.'"></button>';
            })
            ->addColumn('delete',function ($ledgergroup){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$ledgergroup->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
