<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function mostrarTicketUser($id)
    {
        return "hola";
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->detalle = $request->detalle;
        $ticket->fecha = $request->fecha;
        $ticket->urgencia = $request->urgencia;
        $ticket->hora = $request->hora;
        $ticket->user_id = $request->user_id;
        $ticket->save();
        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "soy show";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "soy update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "soy destroy";
    }
}
