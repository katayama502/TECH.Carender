<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<link href="js/packages/core/main.css" rel="stylesheet"></script>
<link href='js/packages/daygrid/main.css' rel='stylesheet' />
<link href='js/packages/timegrid/main.css' rel='stylesheet' />
<link href='js/packages/list/main.css' rel='stylesheet' />

<script src="js/packages/core/main.js"></script>
<script src="js/packages/daygrid/main.js"></script>
<script src="js/packages/interaction/main.js"></script>
<script src="js/packages/timegrid/main.js"></script>
<script src="js/packages/list/main.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<form method="POST">
<body>
  <a href="{{ url('/') }}" class="btn btn--yellow btn--cubic">ログアウト</a>
  <a href="{{ url('graph_main') }}" class="btn btn--yellow btn--cubic">進捗確認</a>
  <div id='calendar'></div>
<script>


  document.addEventListener('DOMContentLoaded', function() {
    
  var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      // plugins: [ interactionPlugin, dayGridPlugin ],
      initialView: 'dayGridMonth',
      selectable: true,
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      defaultDate: '2019-08-12',
      navLinks:true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      droppable: true,
      drop: function(info) {
      if (checkbox.checked) {
        info.draggedEl.parentNode.removeChild(info.draggedEl);
      }
    },
      locale:'ja',
      dateClick: function(info) {
      
      window.location.href="{{ url('goal_input') }}";
      },
      events: [
        
        {
          title: 'Business Lunch',
          start: '2019-08-03T13:00:00',
          constraint: 'businessHours'
        },
        
        {
          title: 'Conference',
          start: '2019-08-18',
          end: '2019-08-20'
        },
        {
          title: 'Party',
          start: '2019-08-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        {
          groupId: 'availableForMeeting',
          start: '2019-08-11T10:00:00',
          end: '2019-08-11T16:00:00',
          rendering: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2019-08-13T10:00:00',
          end: '2019-08-13T16:00:00',
          rendering: 'background'
        },

        // red areas where no events can be dropped
        {
          start: '2019-08-24',
          end: '2019-08-28',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        },
        {
          start: '2019-08-06',
          end: '2019-08-08',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        }
      ]
    });
    
    calendar.render();
  });

  

</script>



</body>
</form>
</html>


<script>
    toastr.options = {
          "positionClass": "toast-top-center",
          "timeOut": "2000",
    };
    @if (session('flash_message'))
        $(function () {
            toastr.success('{{ session('flash_message') }}');              
        });
    @endif
  
</script>