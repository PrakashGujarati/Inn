<?php

namespace App\Http\Controllers;

use Auth;
use App\RoomType;
use http\Env\Response;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:roomtypes.index')->only(['index']);
        $this->middleware('permission:roomtypes.create')->only('create','store');
        $this->middleware('permission:roomtypes.edit')->only('show','edit','update');
        $this->middleware('permission:roomtypes.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = RoomType::all();
        return response()->json($roomtypes);
        //return View('RoomMaster.RoomType.add',compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('RoomMaster.RoomType.add');
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
            'short_name' => 'required'
        ]);

        //RoomType::create($request->all());
        Auth::user()->roomtypes()->create($request->all());
        return redirect('/roomtypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomtype)
    {
        $roomtype = RoomType::findOrFail($roomtype->id);
        $roomtypes = RoomType::all();
        return View('RoomMaster.RoomType.edit',compact(["roomtype","roomtypes"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required'
        ]);

        //$roomtypes = RoomType::findOrFail($id);
        //$roomtypes->update($request->all());
        $ledgergroup = Auth::user()->roomtypes()->findOrFail($id);
        $ledgergroup->update($request->all());
        return redirect('/roomtypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        RoomType::destroy($request->id);
        return Response('Success');
    }

    public function getRoomTypePrices(Request $request)
    {
        $roomtypes = RoomType::findOrFail($request->id);
        return $roomtypes;
    }
}
