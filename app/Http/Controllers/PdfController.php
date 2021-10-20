<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Clan;
use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    public function events(){
        $events = Event::all();
        $pdf = PDF::loadView('events/pdf', compact('events'));
        return $pdf->setPaper('a4')->stream('');
    }
    public function clans(){
        $clans = Clan::all();
        $pdf = PDF::loadView('clans/pdf', compact('clans'));
        return $pdf->setPaper('a4')->stream('');
    }
}
