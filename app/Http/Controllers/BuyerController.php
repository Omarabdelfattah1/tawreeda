<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as PRequest;
use App\Models\Supplier;
use App\Models\Buyer;
use App\Models\Review;
use App\Notifications\Call;
class BuyerController extends Controller
{
  public function requests(){
    return view('buyer.requests.index')->with('requests' ,auth()->user()->userable->requests);
  }
  
  public function calls(){
    return view('buyer.calls');
  }
  public function call(Request $request,Supplier $supplier)
  {
    // dd($request->all());
    $buyer = auth()->user()->userable;
    $call = $buyer->calls()->create([
      'supplier_id' => $supplier->id,
      'date' => $request->date,
      'from_time' => $request->from_time,
      'to_time' => $request->to_time,
      'way' => $request->way,
      
    ]);
    $supplier->user->notify(new Call($call->id));
    return redirect()->route('buyer.calls');

  }
  public function reviews(){
    return view('buyer.reviews');
  }
  public function review(Request $request,Supplier $supplier)
  {
    // dd($request->all());
    $buyer = auth()->user()->userable;
    $buyer->reviews()->create([
      'supplier_id' => $supplier->id,
      'comment' => $request->comment,
      'stars' => $request->review,
      'title' => $request->title
    ]);
    return redirect()->route('buyer.reviews');

  }

  //settings
  public function settings(){
    return view('buyer.settings')
    ->with('buyer',auth()->user()->userable);
  }
  public function updateSettings(Request $request)
  {
    // dd($request);
    $buyer = auth()->user()->userable;
    $updates = $request->all();
    if($request->file('company_logo'))
    {
      $path = str_replace('public/','',$request->file('company_logo')->store('public/logos'));
      $updates['company_logo'] = $path;
    }
    // dd($updates);
    if($buyer instanceof buyer){
      $buyer->update($updates);
    }
    return redirect()->route('buyer.settings');
  }

  //profile
  public function profile(){
    return view('buyer.profile');
  }
  public function updateProfile(Request $request){
    $user = auth()->user();
    $updates = $request->all();
    if($request->file('photo'))
    {
      $path = str_replace('public/','',$request->file('photo')->store('public/users/photos'));
      $updates['photo'] = $path;
    }
    $user->update(array_filter($updates));
    return redirect()->back();
  }
}
