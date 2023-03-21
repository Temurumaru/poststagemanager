import $ from "jquery";
import Chart from 'chart.js/auto';


$("#search_client").on("click", function(e) {
  e.preventDefault();

  $.ajax({
    url: req_url_search_table,
    type: "get",
    dataType: 'html',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: ({
      search: $('#search').val()
    }),
    error: function(err) {
      if(err.status == 500) {
        alert("Internet Ochiq");
      } else {
        alert("Hato: "+err.status+"!");
      }
    },
    success: function(data) {

      data = JSON.parse(data);

      let html = '<table class="table table-striped">';
      html += '<tr>';
      
      html += '<th scope="col">ID</th>';
      html += '<th scope="col">F.I.O</th>';
      html += '<th scope="col">Tel</th>';
      html += '<th scope="col">Harakat</th>';

      html += '</tr>';

      data.forEach(function(obj) { 
        html += '<tr>';
        
        html += '<td scope="row">'+obj.token+'</td>';
        html += '<td>'+obj.username+'</td>';
        html += '<td>'+obj.phone+'</td>';
        html += '<td><button type="button" class="btn btn-info m-1"><a href="/admin_client_update?id='+obj.id+'"><i class="ri-pencil-line"></i></a></button><a href="/admin_profile?id='+obj.id+'"  class="btn btn-success"><i class="bi bi-info-circle"></i></a></td>';

        html += '<tr>';
      });

      html += '</table>';
      $('#clients_table').html(html);
    }
  });

});

$("#track_no_change").on('click', function() {
  $.ajax({
    url: req_url_sontinue_post,
    type: "put",
    dataType: 'html',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: ({
      track_no: $("#track_no").val(),
    }),
    error: function(err) {
      if(err.status == 500) {
        alert("Internet Ochiq");
      } else {
        alert("Hato: "+err.status+"!");
      }
    },
    success: function(data) {
      if(data == "OK") bip(830.6, 'sine');
      if(data != "OK") alert(data);
      $("#track_no").val("");
    }
  });

});


$('#search').on('keypress', function (e) {
  if (e.key === 'Enter') {
    $('#search_client').trigger('click');
  }
});

$('#track_no').on('keypress', function (e) {
  if (e.key === 'Enter') {
    $('#track_no_change').trigger('click');
  }
});


$('#search_client').trigger('click');

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: dates,
    datasets: [{ 
        data: uc,
        label: "Kelgan",
        borderColor: "#2C95EB",
        fill: false
      }, { 
        data: cc,
        label: "Obketishdi",
        borderColor: "#23C739",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});

var context = new AudioContext()
var o = null
var g = null


function bip(frequency, type){
  o = context.createOscillator()
  g = context.createGain()
  o.type = type
  o.connect(g)
  o.frequency.value = frequency
  g.connect(context.destination)
  o.start(0)

  g.gain.exponentialRampToValueAtTime(
    0.00001, context.currentTime + 1
  )
}
