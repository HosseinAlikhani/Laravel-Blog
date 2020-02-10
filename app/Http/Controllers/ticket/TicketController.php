<?php

namespace App\Http\Controllers\ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function submitTicket()
    {
        $title = 'ESTeam - Submit Ticket';
        return view('submit', compact(['title']));
    }
    public function listTicket()
    {
        $title = ' ESTeam - List Ticket';
        return view('ticket-list', compact(['title']));
    }
    public function ticketRequest(Request $request)
    {
        dd($request->attachment);
//        $data = [
//            'name'  =>  $request->title,
//            'priority'  =>  $request->priority,
//            'department'    =>  $request->department,
//        ];
//        $data = json_decode(json_encode($data));
//        dd($data);
    }
}
