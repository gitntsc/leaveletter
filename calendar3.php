<meta name="viewport" content="width=device-width, initial-scale=1">
<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        //editable: true,
        events: "fetch-event3.php",
        displayEventTime: false,
        eventClick: function(calEvent) {
    			/*console.log(calEvent.start.format('DD/MM/YYYY'));
    			console.log(calEvent.end.format('DD/MM/YYYY'));*/
    			/*console.log(calEvent.dataEventDetail);
    			console.log(calEvent.dataEvent/*/
          console.log(calEvent.id);
       location.href='http://192.168.23.6/leaveletter/fullview_leave.php?leave_id=' + calEvent.id;

        },
        

        /*eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },

        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            var detail = prompt('Event Detail:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");



                $.ajax({
                    url: 'add-event.php',
                    dataType: "JSON",
                    data: 'title=' + title + '&detail=' + detail + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            detail : detail,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },

        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }*/

    });
});

function displayMessage(message) {
      $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

<style>
body {
    margin-top: 50px;
    text-align: center;
    font-size: 14px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
    color : blue;

}

.calendar {
    width: 100%;
    margin: 0 auto;
    border-color: blue;
}

.response {
    height: 100%;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 4px solid;
    display: inline-block;

}



/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #9f9dbd;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}


</style>
</head>
<body>


    <div class="response">
      <div id='calendar'></div>
    </div>

  </body>
