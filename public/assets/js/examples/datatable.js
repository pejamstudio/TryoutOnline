'use strict';
$(document).ready(function () {
	var x = document.getElementById('s');
	x.style.display = 'none';
    $('#example1').DataTable({
        "search":{
        	"search": x.value
        }
    });

    $('#example2').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "paging": false
    });

});