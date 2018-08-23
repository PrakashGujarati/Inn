<?php

namespace App\Http\Controllers;

use App\Tariff;
use App\Room;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tariffs = Tariff::all();
        return View('RoomMaster.Tariff.list',compact('tariffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = Room::pluck('room_no', 'id');
        return View('RoomMaster.Tariff.add',compact('room'));
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
            'noofpersons' => 'required',
            'tariff' => 'required',
            'extra_bad' => 'required'
        ]);

        // return $request->all();
        Tariff::create($request->all());

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
    public function edit(Tariff $tariff)
    {
        $room = Room::pluck('room_no', 'id');
        $tariffs = Tariff::findOrFail($tariff->id);
        return View('RoomMaster.Tariff.edit',compact(["tariffs","room"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tariff  $tariff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tariff $tariff)
    {
        $request->validate([
            'noofpersons' => 'required',
            'tariff' => 'required',
            'extra_bad' => 'required'
        ]);

        $tariffs = Tariff::findOrFail($tariff->id);
        $tariffs->update($request->all());
        return redirect('/tariffs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tariff  $tariff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tariff $tariff)
    {
        //
    }
}
