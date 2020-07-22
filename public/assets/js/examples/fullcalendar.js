'use strict';
$(document).ready(function () {

    let hari = new Date().toISOString().slice(0, 10);
    var urlfull = window.location.href;
    var pecahurl = urlfull.split('public/');
    // console.log('url adalah = '+url);
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'listWeek,month'
        },

        views: {
            today: {buttonText: 'hari ini'},
            listDay: {buttonText: 'list hari'},
            listWeek: {buttonText: 'list minggu'},
            month: {buttonText: 'list bulan'}
        },

        defaultView: 'month',
        defaultDate: hari,
        navLinks: true,
        editable: true,
        eventLimit: true,
        events: pecahurl[0]+'public/setjadwal'
    });

});