document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var to_day = new Date();
    var to_y= to_day.getFullYear();
    var to_m= to_day.getMonth()+1;
    var to_d= to_day.getDate();
      
    if(to_d<10){
       to_d='0'+to_d;
    }
    if(to_m<10){
       to_m='0'+to_m;
    }
  
    var to_full_day = to_y+'-'+to_m+'-'+to_d;   
    console.log(to_full_day);
      
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: to_full_day,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2020-06-01'
        },
        {
          title: 'Long Event',
          start: '2020-06-07',
          end: '2020-06-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-06-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-06-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-06-11',
          end: '2020-06-13'
        },
        {
          title: 'Meeting',
          start: '2020-06-12T10:30:00',
          end: '2020-06-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-06-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-06-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-06-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-06-12T20:00:00'
        },
        {
          title: '지옥 Party',
          start: '2020-11-04T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-06-28'
        }
      ]
    });

    calendar.render();
  });
