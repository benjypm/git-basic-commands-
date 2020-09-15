<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Countrie;
use App\Region;
use App\Citie;
use App\Type;
use Illuminate\Support\Facades\DB;
class CountrieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $countries = Countrie::pluck('name','id');
        $types = Type::pluck('name','id');
        return view('news.create',compact('countries', 'types'));

        //return view('create')->with('countries', $countries);
        //return view('newss.create')->with('countries', $countries);
        /*var_dump($countries);
        add($countries);*/
        /*$data = Countrie::get();
        return response()->json($data);*/
    }
    public function getCountries()
    {       
        $data = Countrie::get();
        /*var_dump($data);*/
        return response()->json($data);
        /*return view('news.create',compact('$data', '$data2'));*/
        /*$data = ['$data1' => [], 
         'errors' => []];*/
        /*return response()->json($data);*/
        /*$data1[] = Countrie::get();
        $data2[] = Type::get();
        $data = array_merge($data1, $data2); */
    }

    /*public function getRegions(Request $request, id){*/
    public function getRegions(Request $request){
        /*if($request->ajax()){
            $regions = Region::regions($id);
            return response()->json($regions);
        }*/
        $data = Region::where('country_id', $request->country_id)->get();
        return response()->json($data);
    }

    /*public function getCities(Request $request, $id){*/
    public function getCities(Request $request){
        /*if($request->ajax()){
            $cities = Citie::cities($id);
            return response()->json($cities);
        }*/
        $data = Citie::where('region_id', $request->region_id)->get();
        return response()->json($data);
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
