'use strict';
$(document).ready(function () {

    let today = new Date().toISOString().slice(0, 10);

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'listDay,listWeek,month'
        },

        views: {
            listDay: {buttonText: 'list day'},
            listWeek: {buttonText: 'list week'}
        },

        defaultView: 'month',
        defaultDate: today,
        navLinks: true,
        editable: true,
        eventLimit: true,
        events: '/setjadwal'
    });

});