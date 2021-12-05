<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Buyer;
use App\Models\OfferItem;
use App\Notifications\Offer as OfferNotification;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->userable);
        return view('supplier.offers.index')
        ->with('offers',auth()->user()->userable->offers);
    }

    

    
    public function store(Request $request)
    {
        $offer = Offer::create($request->all());
        $items = [];
        foreach($request->offerItems as $i){
            $items[] = new OfferItem($i);
        }
        $offer->items()->saveMany($items);

        $notifiable = Buyer::find($request->buyer_id)->user->notify(new OfferNotification($offer->id));
    
        return redirect()->back();
    }

    
    public function show(Offer $offer)
    {
        
        return view('supplier.offers.show')->with('offer',$offer);
    }

}
