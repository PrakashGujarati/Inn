<?php

namespace App\Http\Controllers\Auth;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class HotelPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = \Route::getRoutes();
        $routes = [];
        foreach($collection as $route) {
            if($route->getName()!=NULL && preg_match('/\.index\b/',$route->getName())
                || preg_match('/\.create\b/',$route->getName())
                || preg_match('/\.edit\b/',$route->getName())
                || preg_match('/\.destroy\b/',$route->getName())
            )
                $routes[] = $route->getName();
        }
        $hotels = User::select('hotelcode')->distinct()->get();
        $formtype="insert";
        return view('auth.hotel_permission',compact('hotels','routes','formtype'));
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
        $hotelcode = $request->hotel_id;
        for($i=0;$i<count($request->route);$i++){
            $route = $request->route[$i];
            $hotelpermission = new Permission();
            $hotelpermission->name =  "Can ".$route;
            $hotelpermission->hotelcode = $hotelcode[0];
            $hotelpermission->slug = $route;
            $route = explode(".",$route);
            $hotelpermission->description = $route[0];
            $hotelpermission->model =  "Permission";
            $hotelpermission->save();
        }
        return redirect()->route('permissions.index');
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
        $collection = \Route::getRoutes();
        $routes = [];
        foreach($collection as $route) {
            if($route->getName()!=NULL && preg_match('/\.index\b/',$route->getName())
                || preg_match('/\.create\b/',$route->getName())
                || preg_match('/\.edit\b/',$route->getName())
                || preg_match('/\.destroy\b/',$route->getName())
            )
                $routes[] = $route->getName();
        }
        $hotels = $id;
        $formtype="edit";
        $rolePermissions = DB::table("permissions")->where("hotelcode","=",$id)
            ->pluck('permissions.slug','permissions.id')
            ->all();
        return view('auth.hotel_permission',compact('hotels','routes','formtype','rolePermissions'));
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

        $hotelcode = $request->hotel_id;
        $hotelpermission = Permission::where('hotelcode','=',$hotelcode[0]);

        $hotelcode = $request->hotel_id;
        for($i=0;$i<count($request->route);$i++){
            $route = $request->route[$i];
            $hotelpermission->name =  "Can ".$route;
            $hotelpermission->hotelcode = $hotelcode[0];
            $hotelpermission->slug = $route;
            $route = explode(".",$route);
            $hotelpermission->description = $route[0];
            $hotelpermission->model =  "Permission";
            $hotelpermission->save();
        }
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
