<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\\App\\Proyek',
            'date_field' => 'created_at',
            // 'field'      => 'name',
            // 'prefix'     => 'Event',
            // 'suffix'     => '',
            // 'route'      => 'admin.events.edit',
        ],
    ];

    public function index()
    {
        // $events = [];


        // foreach ($this->sources as $source) {
        //     $calendarEvents = $source['model']::when(request('venue_id') && $source['model'] == '\App\Event', function($query) {
        //         return $query->where('venue_id', request('venue_id'));
        //     })->get();
        //     foreach ($calendarEvents as $model) {
        //         $crudFieldValue = $model->getOriginal($source['date_field']);

        //         if (!$crudFieldValue) {
        //             continue;
        //         }

        //         $events[] = [
        //             // 'title' => trim($source['prefix'] . " " . $model->{$source['field']}
        //             //     . " " . $source['suffix']),
        //             'start' => $crudFieldValue,
        //             // 'url'   => route($source['route'], $model->id),
        //         ];
        //     }
        // }
        return view('calendar.calendar');
    }
}
