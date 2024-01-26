<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function estadoTicket($ticket_id)
    {
            // Buscar el ticket por su ID
    $ticket = Ticket::find($ticket_id);

    // Verificar si el ticket existe
    if ($ticket) {
        // Cambiar el estado del ticket a "atendiendo" (estado 2)
        $ticket->estado = 2; // Suponiendo que el estado 2 corresponde a "atendiendo"
        $ticket->save();

        // Retornar una respuesta JSON indicando que se actualizó el estado del ticket
        return response()->json(['message' => 'El estado del ticket ha sido actualizado a "atendiendo"']);
    } else {
        // Retornar una respuesta JSON si el ticket no fue encontrado
        return response()->json(['message' => 'No se encontró el ticket con el ID proporcionado'], 404);
    }   
    }

    public function mostrarTicketUser($user_id)
    {
        // Utiliza Eloquent para buscar todos los tickets asociados al user_id proporcionado
        $tickets = Ticket::where('user_id', $user_id)->get();

        // Retorna los tickets encontrados en formato JSON
        return response()->json($tickets);
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
