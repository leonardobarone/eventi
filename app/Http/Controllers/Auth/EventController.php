<?php

namespace App\Http\Controllers\Auth;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('auth.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione
        $request->validate([
            'title_it' => 'required|string|max:100', 
            'title_en' => 'nullable|string|max:100', 
            'description_it' => 'nullable|string|max:65535', 
            'description_en' => 'nullable|string|max:65535', 
            'place' => 'required|string|max:100',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'phone_1' => 'nullable|string|max:50',
            'phone_2' => 'nullable|string|max:50',
            'whatsapp_1' => 'nullable|string|max:50',
            'whatsapp_2' => 'nullable|string|max:50',
            'site' => 'nullable|url',
            'organizer' => 'nullable|string|max:100',
            'playbill' => 'nullable|image'
        ]);

        // Dom
        $data = $request->all();

       // Playbill
        if (array_key_exists('playbill', $data)) {

            // Ottieni il file
            $playbill = $data['playbill'];

            // Genera un nome di file univoco
            $fileName = uniqid() . '_' . $playbill->getClientOriginalName();

            // Salva il file su S3 con il nome univoco all'interno della cartella specifica
            $playbill_path = Storage::disk('s3')->put('events_playbill/' . $fileName, file_get_contents($playbill));
            
            // Salva path
            $data['playbill'] = $playbill_path;
        }

        // Creazione
        Event::create($data);

        // Return
        return redirect()->route('auth.events.index')->with('success', 'Hai creato un evento');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('auth.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        // Validazione
        $request->validate([
            'title_it' => 'required|string|max:100', 
            'title_en' => 'nullable|string|max:100', 
            'description_it' => 'nullable|string|max:65535', 
            'description_en' => 'nullable|string|max:65535', 
            'place' => 'required|string|max:100',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'phone_1' => 'nullable|string|max:50',
            'phone_2' => 'nullable|string|max:50',
            'whatsapp_1' => 'nullable|string|max:50',
            'whatsapp_2' => 'nullable|string|max:50',
            'site' => 'nullable|url',
            'organizer' => 'nullable|string|max:100',
            'playbill' => 'nullable|image'
        ]);

        // Dom
        $data = $request->all();

        // Playbill
        if (array_key_exists('playbill', $data)) {
            if ($event->playbill) {
                Storage::delete($event->playbill);
            }
            $playbill_path = Storage::put('events_playbill', $data['playbill']);
            $data['playbill'] = $playbill_path;
        } else {
            if (isset($data['delete_playbill']) && $event->playbill) {
                Storage::delete($event->playbill);
                $event->playbill = NULL;
            }
        }

        // Aggiornamento
        $event->update($data);

        // Return
        return redirect()->route('auth.events.index')->with('success', 'Hai modificato un evento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        if ($event->playbill) {
            Storage::delete($event->playbill);
        }

        $event->delete();

        return redirect()->route('auth.events.index')->with('success', 'Hai eliminato un evento');
    }
}
