<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Event;
use DB;
use URL;

class EventController extends Controller
{
   public function index()
    {
        $data = Event::select('events.*','companies.comp_name')
                       ->leftJoin('companies','companies.id','=','events.company_id')
                       ->get();
        $events = [];
        $i=0;
        foreach($data as $value){
             $events[$i] = array(
                            "id"=>$value->id,
                            "title"=> $value->comp_name.'-' .$value->type,
                            'allDay'=> false,
                            "start"=> date("M d Y",strtotime($value->start_date)),
                            //"end"=> date("M d Y H:i:s",strtotime($value->end_date)),
                            "url"=> URL::to(strtolower($value->type).'/'.$value->company_id),
                            "className"=>'bg-success',
                        );
        $i++;
        }
         $calendars = json_encode($events,true);
        return view('fullcalender', compact('calendars'));
    }
}
