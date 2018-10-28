<?php

namespace App\Http\Controllers;

use App\Tax;
use App\TaxSlab;
use DataTables;
use Auth;
use Illuminate\Http\Request;

class TaxesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:taxes.index')->only(['index']);
        $this->middleware('permission:taxes.create')->only('create','store');
        $this->middleware('permission:taxes.edit')->only('show','edit','update');
        $this->middleware('permission:taxes.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Settings.Taxes.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'tax_name' => 'required'
        ]);

        $tax = Auth::user()->taxes()->create($request->all());

        if(isset($request->no_slab)) {
            $slabs = [];
            for ($i = 0; $i < count($request->from); $i++) {
                $slab = array(
                    'tax_id' => $tax->id,
                    'from' => $request->from[$i],
                    'to' => $request->to[$i],
                    'percentage' => $request->percentage[$i]
                );
                $slabs[] = $slab;
            }
            TaxSlab::insert($slabs);
        }

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
            'tax_name' => 'required'
        ]);

         $tax = Auth::user()->taxes()->findOrFail($id);
         $tax->update($request->all());

        if($request->posting_type=="Amount") {
            $tax = Auth::user()->taxes()->findOrFail($id);
            $tax->update(['flat_percentage'=>0]);
            TaxSlab::where('tax_id','=',$tax->id)->delete();
        }
        if($request->posting_type=="Percentage") {
            $tax = Auth::user()->taxes()->findOrFail($id);
            $tax->update(['flat_amount'=>0]);
            TaxSlab::where('tax_id','=',$tax->id)->delete();
        }
        if(isset($request->from)) {
            TaxSlab::where('tax_id','=',$tax->id)->delete();
            $slabs = [];
            for ($i = 0; $i < count($request->from); $i++) {
                $slab = array(
                    'tax_id' => $tax->id,
                    'from' => $request->from[$i],
                    'to' => $request->to[$i],
                    'percentage' => $request->percentage[$i]
                );
                $slabs[] = $slab;
            }
            TaxSlab::insert($slabs);
        }
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
        $tax = Auth::user()->taxes()->findOrFail($id);
        $tax->delete();
        return response('Success');
    }

    public function getDataTable()
    {
        $taxes = Auth::user()->taxes(); // It will only takes taxes of the logged in user
        return DataTables::of($taxes)
            ->addColumn('edit',function ($tax){
                return '<button type="button" class="edit btn btn-sm btn-primary ti-pencil" 
                data-short-name="'.$tax->short_name.'" data-tax-name="'.$tax->tax_name.'" data-applies-from="'.$tax->applies_from.'" 
                data-exempt-after="'.$tax->exempt_after.'" 
                data-posting-type="'.$tax->posting_type.'" data-flat-amount="'.$tax->flat_amount.'" 
                data-flat-percentage="'.$tax->flat_percentage.'" data-no-of-slab="'.$tax->no_of_slab.'"
                data-apply-pax="'.$tax->apply_pax.'" data-apply-tax="'.$tax->apply_tax.'" 
                data-is-on-rackrate="'.$tax->is_on_rackrate.'" data-id="'.$tax->id.'"></button>';
            })
            ->addColumn('delete',function ($tax){
                return '<button type="button" class="delete btn btn-sm btn-danger  ti-trash" data-delete-id="'.$tax->id.'" data-token="'.csrf_token().'" ></button>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
    }

    public function getTaxSlab(Request $request)
    {
        if($request->type == "Amount")
            return Tax::where('id','=',$request->tax_id)->select('flat_amount')->first();
        elseif($request->type == "Percentage")
            return Tax::where('id','=',$request->tax_id)->select('flat_percentage')->first();
        elseif($request->type == "Slab")
            return TaxSlab::where('tax_id','=',$request->tax_id)->get();

    }
}
