<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hardware;
use App\Models\Dependencia;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class TicketController extends Controller
{
    public function exportarTicket($id)
    {
        $tickets = Ticket::with(['user.dependencia', 'user.cargo', 'hardware.tipo'])
            ->where('id', $id)
            ->first();
        $nombrePdf = 'ticket-00' . $tickets->id . '.pdf';
        $pdf = PDF::loadView('pdf.ticket', compact('tickets'))
            ->setPaper('a4', 'portrait');

        return $pdf->download($nombrePdf);

        // return response()->json($tickets);
    }
    public function mostrarTicketsActivos()
    {
        // Obtiene todos los tickets que no están marcados como finalizados (estado <> 3)
        $ticketsActivos = Ticket::where('estado', '<>', 3)->get();

        // Retorna los tickets activos en formato JSON
        return response()->json($ticketsActivos);
    }


    public function atenderTicket($ticket_id)
    {
        // Buscar el ticket por su ID
        $ticket = Ticket::find($ticket_id);

        // Verificar si el ticket existe
        if ($ticket) {
            // Cambiar el estado del ticket a "atendiendo" (estado 2)
            $ticket->estado = 2; // Suponiendo que el estado 2 corresponde a "atendiendo"

            // Asignar la fecha y hora de atención
            $ticket->fecha_atencion = Carbon::now()->toDateString(); // Fecha actual
            $ticket->hora_atencion = Carbon::now()->toTimeString(); // Hora actual

            // Guardar los cambios en el ticket
            $ticket->save();

            // Retornar una respuesta JSON indicando que se actualizó el estado del ticket
            return response()->json([
                'message' => 'El estado del ticket ha sido actualizado a "atendiendo"',
                'ticket' => $ticket // Agregar el ticket actualizado a la respuesta
            ]);
        } else {
            // Retornar una respuesta JSON si el ticket no fue encontrado
            return response()->json(['message' => 'No se encontró el ticket con el ID proporcionado'], 404);
        }
    }


    public function marcarComoFinalizado(Request $request, $ticket_id)
    {
        // Validar los campos requeridos
        $request->validate([
            'conclusion' => 'required',
            'urgencia_verdad' => 'required',
            'hardware_id' => 'required|exists:hardware,id',
        ]);

        // Encuentra el ticket que se marcará como finalizado
        $ticket = Ticket::findOrFail($ticket_id);

        // Cambia el estado del ticket a "finalizado" (estado 3)
        $ticket->estado = 3;

        // Establecer la fecha y hora de conclusión
        $ticket->fecha_conclu = Carbon::now()->toDateString(); // Fecha actual
        $ticket->hora_conclu = Carbon::now()->toTimeString(); // Hora actual

        // Llenar los campos adicionales
        $ticket->conclusion = $request->conclusion;
        $ticket->urgencia_verdad = $request->urgencia_verdad;
        $ticket->hardware_id = $request->hardware_id;

        // Guardar los cambios en el ticket
        $ticket->save();

        // Retorna la respuesta adecuada
        return response()->json(['message' => 'El ticket ha sido marcado como finalizado']);
    }



    public function obtenerPosicion($user_id)
    {
        $idTickeUser = Ticket::where('user_id', $user_id)
            ->where('estado', 1)
            ->get();
        if ($idTickeUser->isEmpty()) {
            return response()->json(['message' => 'El usuario no tiene ningún ticket en estado activo'], 404);
        }

        $ticketsActivos = Ticket::where('estado', 1)
            ->get();

        $arrayIds = [];
        foreach ($ticketsActivos as $ticketActivo) {
            $arrayIds[] = $ticketActivo['id'];
        }
        $idTickeUser = $idTickeUser[0]->id;
        $posicion = array_search($idTickeUser, $arrayIds);
        return response()->json([
            'message' => 'El ticket del usuario está en posición ' . $posicion + 1,
            'orden' => $posicion + 1
        ]);
    }





    public function mostrarTicketsDependencia($dependencia_id)
    {
        $dependencia = Dependencia::find($dependencia_id);
        if (!$dependencia) {
            return response()->json(['error' => 'La dependencia no existe'], 404);
        }
        $hardwares = $dependencia->hardwares;
        $tickets = [];

        foreach ($hardwares as $hardware) {
            $hardwareTickets = $hardware->tickets()->get()->toArray();
            if (!empty($hardwareTickets)) {
                $tickets = array_merge($tickets, $hardwareTickets);
            }
        }

        if (empty($tickets)) {
            return response()->json(['message' => 'No se encontraron tickets asociados a esta dependencia'], 404);
        }

        return response()->json($tickets);
    }


    public function mostrarTicketUser($user_id)
    {
        $tickets = Ticket::where('user_id', $user_id)
            ->orderBy('estado')
            ->orderBy('fecha', 'desc')
            ->get();

        return response()->json($tickets);
    }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with(['user.dependencia', 'user.cargo'])
            ->orderByRaw('CASE WHEN estado = 1 THEN 1 WHEN estado = 2 THEN 2 ELSE 3 END')
            ->orderBy('fecha', 'desc')
            ->get();

        return response()->json($tickets);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar que el usuario con el ID proporcionado existe en la base de datos
        $user = User::find($request->user_id);

        // Verificar si el usuario existe
        if (!$user) {
            // Si el usuario no existe, devuelve un error
            return response()->json(['error' => 'El usuario no existe'], 404);
        }

        // Verificar si el usuario tiene un ticket en estado de espera (estado 1)
        $ticketEnEspera = Ticket::where('user_id', $user->id)
            ->where('estado', 1)
            ->first();

        if ($ticketEnEspera) {
            // Si el usuario ya tiene un ticket en espera, devolver un mensaje
            return response()->json(['message' => 'Usted ya emitió un ticket que se encuentra en espera de atención'], 400);
        }

        // Verificar si el usuario tiene un ticket en proceso de atención (estado 2)
        $ticketEnAtencion = Ticket::where('user_id', $user->id)
            ->where('estado', 2)
            ->first();

        if ($ticketEnAtencion) {
            // Si el usuario ya tiene un ticket en proceso de atención, devolver un mensaje
            return response()->json(['message' => 'Usted ya emitió un ticket y está siendo atendido, por favor espere'], 400);
        }

        // Si no hay ningún ticket en estado 1 o 2, se procede con la creación del nuevo ticket
        // Si se proporciona un ID de hardware, validar su existencia
        if ($request->has('hardware_id')) {
            // Validar que el hardware con el ID proporcionado existe en la base de datos
            $hardware = Hardware::find($request->hardware_id);

            // Verificar si el hardware existe
            if (!$hardware) {
                // Si el hardware no existe, devuelve un error
                return response()->json(['error' => 'El hardware no existe'], 404);
            }
        }

        // Crear el ticket
        $ticket = new Ticket();
        $ticket->detalle = $request->detalle;
        $ticket->fecha = Carbon::now()->toDateString(); // Asigna la fecha actual
        $ticket->urgencia = $request->urgencia;
        $ticket->hora = Carbon::now()->toTimeString(); // Asigna la hora actual
        $ticket->user_id = $request->user_id;

        // Si se proporcionó un ID de hardware válido, asignarlo al ticket
        if ($request->has('hardware_id') && $hardware) {
            $ticket->hardware_id = $request->hardware_id;
        }

        // Guardar el ticket
        $ticket->save();

        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos = Ticket::with('user')->find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($datos);
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
        $datos = Ticket::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Ticket no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Ticket eliminado']);
    }
}
