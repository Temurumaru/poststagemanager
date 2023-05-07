import $ from "jquery";


$("#search_submit").on("click", function(e) {
  e.preventDefault();

  $.ajax({
    url: req_url_search_post,
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

			if(data == "NOT_HAVE") {
				$('#text').addClass('hidden');
				$('#textout').removeClass('hidden');
			}

      data = JSON.parse(data);

      let html = '';

      data.forEach(function(obj) {

        let vl2 = "Kelmadi";
        let vl3 = "Mijoz hali qabul qilmadi";

        if(obj.uzbekistan_date != "0000-00-00 00:00:00") {
          vl2 = obj.uzbekistan_date;
        }

        if(obj.client_date != "0000-00-00 00:00:00") {
          vl3 = "Mijoz qabul qildi ✅ "+obj.client_date;
        }

        html += `
          <div class="flex flex-col login__list-item">
            <div class="flex space-x-3 text-sm sm:text-lg" >
              <p class="text-[#918989] font-bold">ID:  </p>
              <p class="text-[#918989]"> `+obj.token+`</p>
            </div>
            <div class="flex space-x-3 text-sm sm:text-lg" >
              <p class="text-[#918989] font-bold">Track No:  </p>
              <p class="text-[#918989]">  `+obj.track_no+`</p>
            </div>
            <div class="flex space-x-3 text-sm sm:text-lg" >
              <p class="text-[#918989] font-bold">Yuk:  </p>

              <p class="text-[#918989] flex  space-x-2 items-center "><span> <img class="w-6 h-6" src="./project/image/icons8-china-96.png" alt=""></span> `+obj.china_date+`</p>

            </div>
            <div class="flex space-x-3 text-sm sm:text-lg" >
              <p class="text-[#918989] font-bold">
                Yuk
              </p>
               <p class="text-[#918989]  flex  space-x-2 items-center"> <span><img class="w-6 h-6" src="./project/image/icons8-uzbekistan-48.png" alt=""></span> `+vl2+`</p>
            </div>
            <div class="flex space-x-3 text-sm sm:text-lg " >
              <p class="text-[#918989] font-bold">Yuk   </p>
              <p class="text-[#918989]">`+vl3+`</p>
            </div>
          </div>
        `;
      });

			$('#textout').addClass('hidden');
      $('#text').addClass('hidden');
      $('#posts_table').removeClass('hidden');
      $('#posts_table').html(html);
    }
  });

});


$('#search').on('input', function() {
  let inp = $(this).val();
  // console.log(inp.length);
  if (inp.length >= 15) {
    $('#search_submit').trigger('click');
  }
});


$('#search').on('keypress', function (e) {
  if (e.key === 'Enter') {
    $('#search_submit').trigger('click');
  }
});
