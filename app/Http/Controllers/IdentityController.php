<?php

namespace App\Http\Controllers;

use Identity;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class IdentityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:identity.index')->only(['index']);
        $this->middleware('permission:identity.create')->only('create','store');
        $this->middleware('permission:identity.edit')->only('show','edit','update');
        $this->middleware('permission:identity.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Masters.Identity.view');
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

        Auth::user()->identity()->create($request->all());
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

         $ide = Auth::user()->identity()->findOrFail($id);
         $ide->update($request->all());
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
        $ide = Auth::user()->identity()->findOrFail($id);
        $ide->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $identity = Auth::user()->identity(); // It will only takes taxes of the logged in user
        return DataTables::of($identity)
            ->addColumn('edit',function ($ide){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$ide->name.'" data-sname="'.$ide->sname.'" data-id="'.$ide->id.'"></button>';
            })
            ->addColumn('delete',function ($ide){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$ide->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
