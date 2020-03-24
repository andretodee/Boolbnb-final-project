<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Option;
use Illuminate\Database\Eloquent\Builder;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function querySearch($lat,$lon,$circle_radius,$visibilita,$postiLetto,$options)
    {

        //dd($options);
        $apartments = Apartment::where(function($query) use ($lat, $lon, $circle_radius){
            $query->whereRaw("6371 * acos(
                                      cos(radians(" . $lat . "))
                                    * cos(radians(apartments.lat))
                                    * cos(radians(apartments.lon) - radians(" . $lon . "))
                                    + sin(radians(" .$lat. "))
                                    * sin(radians(apartments.lat))) <= " . $circle_radius);
        })->where('visibilita', '>=', $visibilita)->where('posti_letto', '>=' , $postiLetto)->whereHas('options',function ($query) use($options){
            $query->whereIn('nome',$options);
        })->paginate();

        return $apartments;

    }
    public function index(Request $request)
    {

        //Get lat , lon ,visibilita and nr of posti letto
        $lat = $request->lat;
        $lon = $request->lon;
        $visibilita = $request->visibilita;
        $postiLetto = $request->posti_letto;
        $circle_radius = 50;//50 km
        //check if all the field as different of null
        if (!$lat || !$lon) {
            $lat = $lon = 0.0;
            $circle_radius = 20000000000;//If no lat or no lon assign  both 0.0 and assign a very large km number that cover all the earth to return alla apartment
        }
        if(!$visibilita || !$postiLetto){
            $visibilita =  1;//If this values are null assign 1
            $postiLetto = 1;
        }
        $options = Option::all();   //['Portineria']; //
        //dd($lat,$lon);
        $apartments = $this->querySearch($lat,$lon,$circle_radius,$visibilita,$postiLetto,$options);




        return view('apartments.index',['apartments'=>$apartments, 'options'=> $options, 'lat'=>$lat,'lon'=>$lon]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()){

            //Get lat , lon ,visibilita and nr of posti letto
//            $lat = $request->lat;
//            $lon = $request->lon;
//            $visibilita = $request->visibilita;
//            $postiLetto = $request->posti_letto;
//            $circle_radius = $request->circle_radius;//50 km
//            //check if all the field as different of null
//            if (!$lat || !$lon) {
//                $lat = $lon = 0.0;
//                $circle_radius = 20000000000;//If no lat or no lon assign  both 0.0 and assign a very large km number that cover all the earth to return alla apartment
//            }
//            if(!$visibilita || !$postiLetto){
//                $visibilita =  1;//If this values are null assign 1
//                $postiLetto = 1;
//            }
//            $options = $request->options;   //['Portineria']; //
//            //dd($lat,$lon);
//            $apartments = $this->querySearch($lat,$lon,$circle_radius,$visibilita,$postiLetto,$options);

            return Response($request);
        }

//        $input = $request->all();
//
//        return response()->json(['success'=>'Got Simple Ajax Request.']);

    }
    // 111.045

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
      $apartment = Apartment::find($id);
      // $apartment = Apartment::where('titolo')->get();
      return view('apartments.show', compact('apartment'));
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
    public function update($id)
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
