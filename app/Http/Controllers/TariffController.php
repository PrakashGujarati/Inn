<?php

namespace App\Http\Controllers;

use Auth;
use App\Tariff;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tariffs.index')->only(['index']);
        $this->middleware('permission:tariffs.create')->only('create','store');
        $this->middleware('permission:tariffs.edit')->only('show','edit','update');
        $this->middleware('permission:tariffs.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tariffs = Tariff::all();  /** select * from table **/
        return response()->json($tariffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$tariffs = Tariff::all();
        $roomtype = RoomType::pluck('name', 'id'); /** To get only selected field from table **/
        return View('RoomMaster.Tariff.add',compact('roomtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Tariff::create($request->all()); /** Create method is for Insert query to store all fields **/
        Auth::user()->tariffs()->create($request->all());
        return redirect('/tariffs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tariff  $tariff
     * @return \Illuminate\Http\Response
     */
    public function show(Tariff $tariff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tariff  $tariff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tariffs = Tariff::findOrFail($id);
        $roomtype = RoomType::pluck('name', 'id');
        $id = $id;
        return View('RoomMaster.Tariff.edit',compact(["tariffs","roomtype","id"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tariff  $tariff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required',
            'tariff' => 'required',
            'extra_bed_tariff' => 'required'
        ]);

        //$tariffs = Tariff::findOrFail($id);
        //$tariffs->update($request->all());
        $ledgergroup = Auth::user()->tariffs()->findOrFail($id);
        $ledgergroup->update($request->all());
        return redirect('/tariffs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tariff  $tariff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Tariff::destroy($request->id);
        return Response('Success');
    }

}
