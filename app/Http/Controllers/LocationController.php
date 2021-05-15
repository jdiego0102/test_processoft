<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 
     * @author JDCASTRO
     * @param 
     * @return \Illuminate\Http\Response
     * @Descripcion:
     * Consultar departamentos
     * 
     */
    public function getDepartments()
    {
        $departments = Department::select('department_id', 'name')
            ->where('deleted_at', null)
            ->where('active', true)
            ->get();
        // Crear coleccion
        $dep_coll = Collection::make($departments);
        $array_departments = $dep_coll->all();

        if (count($departments) > 0) {
            return response()->json([
                'status' => ParamsController::SUCCESS,
                'departments' => $array_departments
            ], 200);
        } else {
            return response()->json([
                'status' => ParamsController::ERROR,
                'title' => "¡Error!",
                'msg' => "No se encontraron departamentos.",
            ], 204);
        }
    }

    /**
     * 
     * @author JDCASTRO
     * @param  $department_id
     * @return \Illuminate\Http\Response
     * @Descripcion:
     * Consultar ciudades
     * 
     */
    public function getCities($department_id)
    {
        $cities = City::select('city_id', 'name')
            ->where('department_id', $department_id)
            ->where('deleted_at', null)
            ->where('active', true)
            ->get();
        // Crear coleccion
        $city_coll = Collection::make($cities);
        $array_cities = $city_coll->all();

        if (count($array_cities) > 0) {
            return response()->json([
                'status' => ParamsController::SUCCESS,
                'cities' => $array_cities
            ], 200);
        } else {
            return response()->json([
                'status' => ParamsController::ERROR,
                'title' => "¡Error!",
                'msg' => "No se encontraron Ciudades.",
            ], 204);
        }
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
        //
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
        //
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
