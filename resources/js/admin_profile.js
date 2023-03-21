import $ from 'jquery';


$("#search_post_submit").on("click", function(e) {
  e.preventDefault();

  $.ajax({
    url: req_url_search_table_post,
    type: "get",
    dataType: 'html',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: ({
      id: getQueryVariable('id'),
      search: $('#search_post').val()
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
      html += '<th scope="col">Track №</th>';
      html += '<th scope="col">Jarayon</th>';

      html += '</tr>';

      data.forEach(function(obj) { 
        let state_china = "";
        let state_uzb = "";
        let state_cli = "";

        if(obj.state == "china") {
          state_china = "active";
        }
        if(obj.state == "uzb") {
          state_uzb = "active";
        }
        if(obj.state == "cli") {
          state_cli = "active";
        }

        html += '<tr>';
        
        html += '<td scope="row">'+token+'</td>';
        html += '<td>'+username+'</td>';
        html += '<td>'+phone+'</td>';
        html += '<td>'+obj.track_no+'</td>';
        html += `
        <td class="d-flex ">
          <div class="pagetitle ">
            <a href="#" class="post_state_button" track-no="`+obj.track_no+`">
            <nav style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item `+state_china+`"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="`+obj.china_date+`" aria-describedby="tooltip718021`+obj.id+`">Xitoy</li>
                <li class="breadcrumb-item `+state_uzb+`" data-bs-toggle="tooltip" data-bs-placement="bottom" title="`+obj.uzbekistan_date+`" aria-describedby="tooltip718032`+obj.id+`" >Uzbekistan</li>
                <li class="breadcrumb-item `+state_cli+`" data-bs-toggle="tooltip" data-bs-placement="bottom" title="`+obj.client_date+`" aria-describedby="tooltip718013`+obj.id+`">Mijoz</li>
              </ol>
            </nav>
            </a>
                            
          </div>
                         
        </td>
        `;

        html += '</tr>';
      });

      html += '</table>';
      $('#posts_table').html(html);
    }
  });

});

// $("body").on("click", function() {
//   console.log("HEEEL");
// });

$(document).on('click', '.post_state_button', function() {
  $.ajax({
    url: req_url_sontinue_post,
    type: "put",
    dataType: 'html',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: ({
      track_no: $(this).attr('track-no'),
    }),
    error: function(err) {
      if(err.status == 500) {
        alert("Internet Ochiq");
      } else {
        alert("Hato: "+err.status+"!");
      }
    },
    success: function(data) {
      if(data == "OK") $('#search_post_submit').trigger('click');
      if(data != "OK") alert(data);
    }
  });

});



$('#search_post').on('keypress', function (e) {
  if (e.key === 'Enter') {
    $('#search_post_submit').trigger('click');
  }
});


$('#search_post_submit').trigger('click');

$('#tkn').html(token);


function getQueryVariable(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++)
  {
    var pair = vars[i].split("=");
    if (pair[0] == variable)
    {
      return pair[1];
    }
  }
  return -1; //not found
}