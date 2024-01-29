<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Auth;
use App\Models\Message;
use App\Models\Reply;
use App\Models\User;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Notification;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.apartments.index')->with('apartments', Apartment::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        return view('user.apartments.show')->with([
            'messages' => Message::all(),
            'apartment' => $apartment,
            'replies'   => Reply::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }

    public function getAparmentsByCityId($id) 
    {
        $apartments = Apartment::where('city_id', $id)->get();
        return view('user.apartments.index')->with('apartments', $apartments);
    }

    public function sendMessage ($id)
    {
        $apartment = Apartment::find($id);

        $messages = Message::where('apartment_id', $id)->where('user_id', Auth::user()->id)->get();
    
        return view('user.apartments.message')->with([
            'replies' => Reply::all(),
            'messages' => $messages,
            'apartment' => $apartment,
        ]);
    }

    public function message () 
    {
        $apartments = Apartment::all();
        
        $messages = Message::where('user_id', Auth::user()->id)->get();
        
        return view('user.apartments.message')->with([
            'replies' => Reply::all(),
            'messages' => $messages,
        ]);
    }

    public function reply (Request $request) 
    {
        $message = Message::where('id', $request->input('message_id'))->get()->first();
        $apartment = Apartment::find($message->apartment_id);
        $user = User::find($apartment->user_id);

        Reply::insert([
            'content' => $request->input('content'),
            'message_id' => $request->input('message_id'),
            'user_id' => Auth::user()->id,
        ]);
        
        Notification::send($user, new MessageNotification($request->message_id));
        
        Auth::user()->unreadNotifications->when($request->input('message_id'), function ($query) use ($request) {
            return $query->where('data', $request->input('message_id'));
        })->markAsRead();

        return redirect()->back()->with('success', 'your message,here');
    }

    public function send (Request $request) 
    {   
        $apartment = Apartment::find($request->input('apartment_id'));
        $user = User::find($apartment->user_id);
        $message = Message::create([
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id,
            'apartment_id' => $request->input('apartment_id'),
        ]);
    
        Notification::send($user, new MessageNotification($message->id));
        return redirect()->back()->with('success', 'your message,here');
 
    }

    public function read (Request $request)
    {
        Auth::user()->unreadNotifications->when($request->input('message_id'), function ($query) use ($request) {
            return $query->where('data', $request->input('message_id'));
        })->markAsRead();

        return "OK";
    }

    
}
