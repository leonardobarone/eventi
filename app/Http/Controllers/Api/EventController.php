<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return response()->json([
            'success' => true,
            'data' => [
                'response' => $events,
            ]
        ]);
    }
}
