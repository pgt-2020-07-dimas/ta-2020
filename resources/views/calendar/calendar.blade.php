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
      
        <div id='calendar'></div>


    </div>
</div>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
    //   initialDate: '2020-07-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'Hari Patah Hati',
          start: '2020-07-01'
        },
        // {
        //   title: 'Long Event',
        //   start: '2020-06-07',
        //   end: '2020-06-10'
        // },
        // {
        //   groupId: 999,
        //   title: 'Repeating Event',
        //   start: '2020-06-09T16:00:00'
        // },
        // {
        //   groupId: 999,
        //   title: 'Repeating Event',
        //   start: '2020-06-16T16:00:00'
        // },
        // {
        
      ]
    });

    calendar.render();
  });

</script>
@endsection

