<?php

namespace App\Http\Controllers;

use App\Designation;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('LedgerMaster.Designation.view');
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
        Designation::create($request->all());
        return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Designation::findOrFail($id)->update($request->all());
        return response('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Designation::destroy($request->id);
        return response('Success');
    }

    public function getDataTable()
    {
        $designations = Designation::all();
        return DataTables::of($designations)
            ->addColumn('edit',function ($designation){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$designation->name.'"  data-id="'.$designation->id.'"></button>';
            })
            ->addColumn('delete',function ($designation){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$designation->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
