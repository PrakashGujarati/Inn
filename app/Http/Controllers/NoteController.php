<?php

namespace App\Http\Controllers;

use Note;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:note.index')->only(['index']);
        $this->middleware('permission:note.create')->only('create','store');
        $this->middleware('permission:note.edit')->only('show','edit','update');
        $this->middleware('permission:note.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GeneralMaster.Note.view');
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

        Auth::user()->note()->create($request->all());
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

         $nt = Auth::user()->note()->findOrFail($id);
         $nt->update($request->all());
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
        $nt = Auth::user()->note()->findOrFail($id);
        $nt->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $note = Auth::user()->note(); // It will only takes taxes of the logged in user
        return DataTables::of($note)
            ->addColumn('edit',function ($nt){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" data-name="'.$nt->name.'" data-id="'.$nt->id.'"></button>';
            })
            ->addColumn('delete',function ($nt){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$nt->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
