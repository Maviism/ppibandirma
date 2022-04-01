<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        return view('admin/event/index',[
            'events' => Event::all()
        ]);
    }

    public function create()
    {
        return view('admin/event/createEvent');
    }


    public function store(Request $request)
    {   
        
        
        Event::create([
            'event_name' => $request->eventName,
            'event_place' => $request->eventPlace,
            'date' => $request->eventDate,
            'description' => $request->description,
        ]);
        
        session()->flash('success', 'Berhasil membuat acara!');
        return redirect()->route('event');
    }

    public function show(Event $event)
    {
        //
    }

   
    public function edit(Event $event)
    {
        return view('/admin/event/editEvent',
        ['event'=> $event]);
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        session()->flash('success', 'Event telah dihapus!');
        return back();
    }
}
