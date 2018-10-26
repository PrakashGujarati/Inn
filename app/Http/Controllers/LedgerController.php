<?php

namespace App\Http\Controllers;

use App\Ledger;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ledgers.index')->only(['index']);
        $this->middleware('permission:ledgers.create')->only('create','store');
        $this->middleware('permission:ledgers.edit')->only('show','edit','update');
        $this->middleware('permission:ledgers.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgergroups = Auth::user()->ledgerGroups()->get();
        return view('LedgerMaster.Ledger.view',compact('ledgergroups'));
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

        Auth::user()->ledgers()->create($request->all());
        return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function show(Ledger $ledger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function edit(Ledger $ledger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'alias' => 'required'
        ]);

        $ledger = Auth::user()->ledgers()->findOrFail($id);
        $ledger->update($request->all());
        return response('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ledger = Auth::user()->ledgers()->findOrFail($id);
        $ledger->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        // $ledgergroups = LedgerGroup::all();
        $ledgers = Auth::user()->ledgers()->with(['user','group'])->get();
        return DataTables::of($ledgers)
            ->addColumn('edit',function ($ledger){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" 
                data-name="'.$ledger->name.'" data-alias="'.$ledger->alias.'" data-group-id="'.$ledger->group_id.'" data-city="'.$ledger->city.'" 
                data-opening="'.$ledger->opening.'" data-connect-with="'.$ledger->connect_with.'" data-tally-name="'.$ledger->tally_name.'" data-dob="'.$ledger->dob.'" 
                data-is-employee="'.$ledger->is_employee.'" data-address="'.$ledger->address.'" data-pincode="'.$ledger->pincode.'" data-phone-no="'.$ledger->phone_no.'" 
                data-mobile-no="'.$ledger->mobile_no.'" data-email="'.$ledger->email.'" data-discount="'.$ledger->discount.'" data-native="'.$ledger->native.'" 
                data-reference-name="'.$ledger->reference_name.'" data-state="'.$ledger->state.'" data-nationality="'.$ledger->nationality.'" data-gstn-no="'.$ledger->gstn_no.'" 
                data-id="'.$ledger->id.'"></button>';
            })
            ->addColumn('delete',function ($ledger){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$ledger->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }
}
