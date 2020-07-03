@extends('layouts.app', [
    'namePage' => 'Calendar',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'kalender',
   
])

@section('content')
<div class="card">
    <div class="card-header">
    {{ __('Calendar') }}
    </div>

    <div class="card-body">
      
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

        <div id='calendar'></div>


    </div>
</div>
@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                // events: events,


            })
        });
</script>
@stop