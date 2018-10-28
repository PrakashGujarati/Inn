<?php

namespace App\Http\Controllers;

use Instruction;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:instruction.index')->only(['index']);
        $this->middleware('permission:instruction.create')->only('create','store');
        $this->middleware('permission:instruction.edit')->only('show','edit','update');
        $this->middleware('permission:instruction.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GeneralMaster.Instruction.view');
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

        Auth::user()->instruction()->create($request->all());
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

         $ins = Auth::user()->instruction()->findOrFail($id);
         $ins->update($request->all());
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
        $ins = Auth::user()->instruction()->findOrFail($id);
        $ins->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $inst = Auth::user()->instruction(); // It will only takes taxes of the logged in user
        return DataTables::of($inst)
            ->addColumn('edit',function ($ins){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$ins->name.'" data-id="'.$ins->id.'"></button>';
            })
            ->addColumn('delete',function ($ins){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$ins->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
