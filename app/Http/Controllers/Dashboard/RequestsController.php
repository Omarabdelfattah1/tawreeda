<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request as Prequest;
use App\Models\Offer;
class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.requests.index')->with('requests',Prequest::paginate(4));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prequest $request)
    {
        return view('dashboard.requests.show')->with('request',$request);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function offer(Offer $offer)
    {
        return view('dashboard.requests.offer')->with('offer',$offer);
        
    }

}
