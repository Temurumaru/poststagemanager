<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./project/image/logo-alibaba.png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Alibabay.uz</title>

  <link href="./project/plugins/remixicon/remixicon.css"  rel="stylesheet" />
  <script src="./project/plugins/tailwind/tailwind.js"></script>
  <style class="./project/plugins/tailwind/tailwind.css"></style>
  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />
</head>
<body>

  <div class="wrapper overflow-x-hidden bg-[#491a86] min-h-screen w-full relative">
    <div class="md:block hidden absolute sm:block hidden rounded-full bottom-[10%] left-[15%] p-30 circle circle-left -z-1" ></div>
    <div class="absolute top-0 bottom-0 left-0 right-0 ">
      <div class="container ">
        <section class="flex flex-col items-center justify-between min-h-screen login py-[15%] md:py-[5%]">
          <a href='#' class="flex items-center justify-center login__logo z-1 md:w-[250px] md:h-[250px] w-[200px] h-[200px]">
            <img src="./project/image/logo-alibaba.png" alt="logo">
          </a>
          <div class="w-full px-4 py-6 bg-white rounded-lg sm:px-6 sm:py-12 md:w-3/4 lg:w-1/2 login__content z-1 ">
            <div class="pb-4 text-center sm:pb-6 login__title">
              <h2 class="mb-[10px] md:mb-4 text-base  font-bold  md:text-3xl lg:text-4xl text-[#491A86]">YUK HOLATINI TEKSHIRISH</h2>
              <p id="text" class="text-[#918989] text-[10px] md:text-base">
                Buyurtma qilingan maxsulotni shtrix raqami yoki ID kiriting !
              </p>

							<p id="textout" class="text-[#ff3030] text-base hidden">
								Shtrix kodi tushirilgan posilka hali omborga yetib kelmadi!
              </p>

            </div>
            <!-- list chiqarish uchun hidden olib tashlanadi -->
            <div class="sm:pb-6 pb-4 overflow-y-scroll login__list h-[300px] space-y-10 hidden" id="posts_table">

            </div>
            <div class="flex items-center justify-center  space-x-1  md:space-x-4 flex-row" >
              <input type="text" name="" id="search" placeholder="Shtrix raqam yoki ID raqam kiriting!" class=" w-full md:w-3/4 p-3 bg-[#F2F0F0] text-[#491a86] rounded-lg border border-[#491a86] text-black text-[9px] md:text-[16px] md:text-md" id="">
              <button class="w-1/4  px-2 md:px-8 py-3 text-white duration-100 bg-green-500 rounded-lg md:w-auto hover:bg-green-600 active:bg-green-600 text-[10px] md:text-[16px] md:text-md" id="search_submit">
                Izlash
              </button>
            </div>
          </div>
          <div class="pb-5 text-center">
            <div class="flex items-center justify-center w-full mt-4 space-x-4">
               <a href="tel:+998990048024" class="w-8 h-8 md:w-10 md:h-10  duration-200 fill-white hover:fill-[#f9a737]" >
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path></svg>
              </a>
              <a href="https://www.instagram.com/alibabay_cargo/" class="w-8 h-8 md:w-10 md:h-10  duration-200 fill-white hover:fill-[#f9a737]" target="_blank">
                 <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" ><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/></svg>
              </a>
              <a href="https://t.me/alibabay_cargo" class="w-8 h-8 md:w-10 md:h-10  duration-200 fill-white hover:fill-[#f9a737]" target="_blank">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-3.11-8.83l.013-.007.87 2.87c.112.311.266.367.453.341.188-.025.287-.126.41-.244l1.188-1.148 2.55 1.888c.466.257.801.124.917-.432l1.657-7.822c.183-.728-.137-1.02-.702-.788l-9.733 3.76c-.664.266-.66.638-.12.803l2.497.78z"/></svg>
              </a>

            </div>
            <a class='text-white mt-4 md:mt-8 block text-[10px] md:text-base' href="https://abduganiev.uz" target="_blank">Websayt ishlab chiquvchi - ABDUGANIEV TECHNOLOGY</a>
          </div>
        </section>
      </div>
    </div>

  </div>

  <script>
    const req_url_search_post = "{{route('SearchClientPost')}}";
  </script>

  @vite('resources/js/client.js')
</body>
</html>
