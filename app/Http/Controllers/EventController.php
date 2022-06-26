<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $request->validate([
            'eventName' => 'required|max:255',
            'eventPlace' => 'nullable',
            'eventDate' => 'nullable',
            'thumbnail' => 'nullable',
            'description' => 'nullable',
        ]);

        $dateInput = str_replace('/', '-', $request->eventDate);
        $date = date('Y-m-d h:i', strtotime($dateInput));

        if($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = time()."_".$image->getClientOriginalName();
            $path = 'public/event';
            $image->storeAs($path, $file_name);

            Event::create([
                'event_name' => $request->eventName,
                'slug' => Str::slug($request->eventName),
                'place' => $request->eventPlace,
                'date' => $date,
                'thumbnail' => $file_name, 
                'description' => $request->description,
            ]);

        }else{
            Event::create([
                'event_name' => $request->eventName,
                'slug' => Str::slug($request->eventName),
                'place' => $request->eventPlace,
                'date' => $date, 
                'description' => $request->description,
            ]);
        }
        
        session()->flash('success', 'Berhasil membuat acara!');
        return redirect()->route('event.index');
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
        if($request->hasFile('image')){
            if($event->thumbnail != null){
                Storage::delete('public/event/'.$event->thumbnail);
            }

            $image = $request->file('image');
            $file_name = time()."_".$image->getClientOriginalName();
            $path = 'public/event';
            $image->storeAs($path, $file_name);

            $event->update([
                'event_name' => $request->eventName,
                'place' => $request->eventPlace,
                'date' => $request->eventDate,
                'thumbnail' => $file_name, 
                'description' => $request->description,
            ]);

        }else{
            $event->update([
                'event_name' => $request->eventName,
                'place' => $request->eventPlace,
                'date' => $request->eventDate, 
                'description' => $request->description,
            ]);
        }
        $event->update([
            'event_name' => $request->eventName,
            'place' => $request->eventPlace,
            'date' => $request->eventDate,
            'description' => $request->description,
        ]);

        session()->flash('success', 'Berhasil mengubah acara!');
        return redirect()->route('event.index');
    }

    public function destroy(Event $event)
    {   
        if($event->thumbnail !== null){
            Storage::delete('public/event/'.$event->thumbnail);
        };
        Event::destroy($event->id);
        session()->flash('success', 'Event telah dihapus!');
        return back();
    }
}
