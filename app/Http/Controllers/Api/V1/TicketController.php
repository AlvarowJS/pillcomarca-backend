<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hardware;
use App\Models\Dependencia;
use Carbon\Carbon;



class TicketController extends Controller
{
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
        // Convertir el user_id a string
        $user_id = (string) $user_id;
    
        // Busca todos los tickets con estado 1 y los ordena por fecha y hora de forma ascendente
        $ticketsActivos = Ticket::where('estado', 1)
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();
    
        // Inicializar la posición del ticket del usuario
        $posicion = null;
    
        // Inicializar el estado del ticket del usuario
        $estadoTicket = null;
    
        // Iterar sobre los tickets activos para encontrar la posición y el estado del ticket del usuario
        foreach ($ticketsActivos as $index => $ticket) {
            // Convertir el user_id del ticket a string para asegurar una comparación correcta
            $ticket_user_id = (string) $ticket->user_id;
    
            if ($ticket_user_id === $user_id) {
                $posicion = $index + 1; // Ajustar el índice base 0 al índice base 1
                $estadoTicket = $ticket->estado;
                break;
            }
        }
    
        if ($posicion !== null) {
            // Si el ticket está en estado 2, el usuario está siendo atendido
            if ($estadoTicket === 2) {
                return response()->json(['message' => 'Usted está siendo atendido']);
            }
            // Si el ticket está en estado 3, el usuario ya fue atendido
            elseif ($estadoTicket === 3) {
                return response()->json(['message' => 'Usted ya fue atendido']);
            }
            // Si no, retorna la posición del ticket del usuario y el JSON con solo la orden
            else {
                return response()->json([
                    'message' => 'El ticket del usuario está en posición ' . $posicion,
                    'orden' => $posicion
                ]);
            }
        } else {
            // Si no se encuentra el ticket, retorna un mensaje indicando que el usuario no tiene ningún ticket en estado activo
            return response()->json(['message' => 'El usuario no tiene ningún ticket en estado activo'], 404);
        }
    }
    
    
    
    
    
    public function mostrarTicketsDependencia($dependencia_id)
    {
        // Buscar la dependencia por su ID
        $dependencia = Dependencia::find($dependencia_id);
    
        // Verificar si la dependencia existe
        if (!$dependencia) {
            return response()->json(['error' => 'La dependencia no existe'], 404);
        }
    
        // Obtener todos los hardwares asociados a la dependencia
        $hardwares = $dependencia->hardwares;
    
        // Inicializar un array para almacenar los tickets
        $tickets = [];
    
        // Iterar sobre cada hardware y obtener sus tickets asociados
        foreach ($hardwares as $hardware) {
            $hardwareTickets = $hardware->tickets()->get()->toArray();
            if (!empty($hardwareTickets)) {
                $tickets = array_merge($tickets, $hardwareTickets);
            }
        }
    
        // Verificar si se encontraron tickets
        if (empty($tickets)) {
            return response()->json(['message' => 'No se encontraron tickets asociados a esta dependencia'], 404);
        }
    
        // Retornar los tickets encontrados en formato JSON
        return response()->json($tickets);
    }
    

    public function mostrarTicketUser($user_id)
    {
        // Buscar el usuario por su ID
        $user = User::find($user_id);
        
        // Verificar si el usuario existe
        if (!$user) {
            // Si el usuario no existe, devuelve un error
            return response()->json(['error' => 'El usuario no existe'], 404);
        }
        
        // Utiliza Eloquent para buscar todos los tickets asociados al user_id proporcionado
        $tickets = Ticket::where('user_id', $user_id)->get();
    
        // Formatear la fecha en cada ticket
        // foreach ($tickets as $ticket) {
        //     // Formatear la fecha en el formato deseado
        //     $ticket->fecha = Carbon::parse($ticket->fecha)->format('d/m/Y');
            
        //     // Formatear la fecha de atención si está presente
        //     if ($ticket->fecha_atencion) {
        //         $ticket->fecha_atencion = Carbon::parse($ticket->fecha_atencion)->format('d/m/Y');
        //     }
    
        //     // Formatear la fecha de conclusión si está presente
        //     if ($ticket->fecha_conclu) {
        //         $ticket->fecha_conclu = Carbon::parse($ticket->fecha_conclu)->format('d/m/Y');
        //     }
        // }
    
        // Retorna los tickets encontrados en formato JSON con fechas formateadas
        return response()->json($tickets);
    }
    
    
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los tickets
        $tickets = Ticket::all();
    
        // Formatear la fecha en cada ticket
        foreach ($tickets as $ticket) {
            // Convertir la fecha a un objeto Carbon y luego formatearla
            $ticket->fecha = Carbon::parse($ticket->fecha)->format('d/m/Y');
            // Puedes ajustar el formato de fecha según tus preferencias
        }
    
        // Retornar la respuesta JSON con los tickets
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
        $datos = Ticket::find($id);
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
        if(!$datos) {
            return response()->json(['message' => 'Ticket no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Ticket eliminado']);
    }
}
