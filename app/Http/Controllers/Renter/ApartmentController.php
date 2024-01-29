<?php

namespace App\Http\Controllers\Renter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Image;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\Reply;
use App\Models\User;
use Auth;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Notification;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartment = Apartment::find(1);
        $apartments = Apartment::where('user_id', Auth::user()->id)->get();

        return view('renter.apartments.index')->with([
            'apartments' => $apartments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('renter.apartments.create')->with([
            'cities' => City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'title' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'contact' => 'required|min:3|max:255',
            'price' => 'required|digits_between:3,4',
            'square_meter' => 'required|digits_between:2,3',
            'description' => 'required|min:3',
            'floor' => 'required|digits_between:1,2',

        ]);

        Apartment::create($request->all());

        $last_id = Apartment::latest()->first()->id;
        
        $images = array();

        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $image_name = $file->getClientOriginalName();
                $file->move('storage/', $image_name);
                $images[] = $image_name;

            }
            foreach ($images as $image) {
                Image::insert([
                    'image' => $image,
                    'apartment_id' => $last_id
                ]);
            }
        }

        return redirect()->route('renter.apartment.index')->with('success', 'Uspjesno ste dodali stan!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('renter.apartments.show')->with('apartment', Apartment::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('renter.apartments.edit')->with([
            'apartment' => Apartment::find($id),
            'cities' => City::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'city_id' => 'required',
            'title' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'contact' => 'required|min:3|max:255',
            'price' => 'required|digits_between:3,4',
            'square_meter' => 'required|digits_between:2,3',
            'description' => 'required|min:3',
            'floor' => 'required|digits_between:1,2',
        ]);
        Apartment::find($id)->update($request->all());
        return redirect()->route('renter.apartment.index')->with('success', 'Uspjesno ste ažurirali stan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function read (Request $request)
    {
        Auth::user()->unreadNotifications->when($request->input('message_id'), function ($query) use ($request) {
            return $query->where('data', $request->input('message_id'));
        })->markAsRead();

    }

    public function deleteImage ($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect()->back()->with('success', 'your message,here');  
    }

    public function message ()
    {
        $apartments = Apartment::where('user_id', Auth::user()->id)->get();
        return view('renter.apartments.message')->with('apartments', $apartments);
    }

    public function reply (Request $request)
    {
        $message = Message::where('id', $request->input('message_id'))->get()->first();
        $user = User::find($message->user_id);
        
        Reply::insert([
            'content' => $request->input('content'),
            'message_id' => $request->input('message_id'),
            'user_id' => Auth::user()->id,
        ]);
        
        Notification::send($user, new MessageNotification($request->message_id));
        Auth::user()->unreadNotifications->when($request->input('message_id'), function ($query) use ($request) {
            return $query->where('data', $request->input('message_id'));
        })->markAsRead();
        
        return redirect()->route('renter.apartment.message');
    }
}
