// resources/js/fullcalendar.js
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import momentTimezonePlugin from "@fullcalendar/moment-timezone";
// import listPlugin from "@fullcalendar/list";

document.addEventListener("DOMContentLoaded", function () {
    const calendarEl = document.getElementById("calendar");

    const calendar = new Calendar(calendarEl, {
        allDaySlot: false,
        plugins: [dayGridPlugin,timeGridPlugin, momentTimezonePlugin, interactionPlugin],
        timeZone: "Asia/Tokyo", // momentTimezonePlugin
        defaultView: "timeGridMonth",
        locale:'ja',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listMonth'
        },
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,

        events: [],
    });

    calendar.render();
});
