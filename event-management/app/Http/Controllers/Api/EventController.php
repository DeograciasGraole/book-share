<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\CanLoadRelationships;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Resources\EventResource;
class EventController extends Controller
{
      use CanLoadRelationships;
      private  array $relations=['user','attendees','attendees.user'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          
         $query=$this->loadRelationships(Event::query());
        
     
        // return  EventResource::collection(Event::with('user')->paginate());
        return  EventResource::collection($query->latest()->paginate());
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $event=Event::create([
            ...$request->validate([
            'name'=>'required |string|max:225',
            'description'=>'nullable|string',
            'start_time'=>'required|date',
            'end_time'=>'required|date|after:start_time'
            ]),
            'user_id'=>1
        ]);

        return new EventResource($this->loadRelationships( $event));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        // $event->load('user','attendees');
           return new EventResource($this->loadRelationships( $event));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Event $event)
    {
      $event->update(
            $request->validate([
            'name'=>'sometimes|string|max:225',
            'description'=>'nullable|string',
            'start_time'=>'sometimes|date',
            'end_time'=>'sometimes|date|after:start_time'
            ])
        );
        return new EventResource($this->loadRelationships( $event));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        // return response()->json([
        //     'message'=>'Event deleted successfully'
        // ]);
        return response(status:204);
    }

}
