<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    /**
     * Create a new Event
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $event = new Event();
        $event->lernfeldId = $request->input('lernfeldId');
        $event->timeslotId = $request->input('timeslotId');
        $event->creatorId = $request->input('creatorId');
        $event->isArchived = 0;
        $event->save();

        // TODO: implement event_users_relation

        return response()->json(['event' => $event], 201);
    }

    /**
     * List all Events that user with userId participates in
     */
    public function list()
    {
        $userId = auth()->user()->id;
        $events = DB::table('event_users_relation')
            ->select(DB::raw("events.id as 'eventId', lernfelder.number as 'lernfeldNumber', lernfelder.name as 'lernfeldName', timeslots.slot 'timeslot', timeslots.available as 'timeslotAvailable', users.name 'userRealName', classes.name as 'className', schulform.name as 'schulformName', schulform.short as 'schulformShort'"))
            ->join('events', 'event_users_relation.eventId', '=', 'events.id')
            ->join('users', 'event_users_relation.userId', '=', 'users.id')
            ->join('lernfelder', 'events.lernfeldId', '=', 'lernfelder.id')
            ->join('timeslots', 'events.timeslotId', '=', 'timeslots.id')
            ->join('schulform', 'users.schulformId', '=', 'schulform.id')
            ->join('classes', 'users.classId', '=', 'classes.id')
            ->where('users.id', '=', $userId)
            ->get();
        return response()->json(['events' => $events], 200);
    }

    /**
     * Get a Event by Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $userId = auth()->user()->id;
        $event = DB::table('event_users_relation')
            ->select(DB::raw("events.id as 'eventId', lernfelder.number as 'lernfeldNumber', lernfelder.name as 'lernfeldName', timeslots.slot 'timeslot', timeslots.available as 'timeslotAvailable', users.name 'userRealName', classes.name as 'className', schulform.name as 'schulformName', schulform.short as 'schulformShort'"))
            ->join('events', 'event_users_relation.eventId', '=', 'events.id')
            ->join('users', 'event_users_relation.userId', '=', 'users.id')
            ->join('lernfelder', 'events.lernfeldId', '=', 'lernfelder.id')
            ->join('timeslots', 'events.timeslotId', '=', 'timeslots.id')
            ->join('schulform', 'users.schulformId', '=', 'schulform.id')
            ->join('classes', 'users.classId', '=', 'classes.id')
            ->where('events.id', '=', $id)
            ->where('users.id', '=', $userId)
            ->get();
        return response()->json(['event' => $event], 200);
    }

    /**
     * Update a Event by Id
     */
    public function update()
    {
        return response()->json(['This feature is currently under development, check our Changelog for more information.'], 200);
    }

    /**
     * Delete a Event by Id
     */
    public function delete()
    {
        return response()->json(['This feature is currently under development, check our Changelog for more information.'], 200);
    }
}
