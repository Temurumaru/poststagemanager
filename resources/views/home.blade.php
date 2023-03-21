<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Yukni Qidirish</title>

  <link href="./project/plugins/remixicon/remixicon.css"  rel="stylesheet" />
  <script src="./project/plugins/tailwind/tailwind.js"></script>
  <style class="./project/plugins/tailwind/tailwind.css"></style>
  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />
</head>
<body>
  
  <div class="wrapper overflow-x-hidden bg-[url('./project/image/bg.png')] bg-cover min-h-screen w-full relative">
    <div class="md:block hidden absolute rounded-full -top-10 -right-10 p-30 circle-top circle" ></div>
    <div class="md:block hidden absolute sm:block hidden rounded-full bottom-[10%] left-[15%] p-30 circle circle-left -z-1" ></div>
    <div class="md:block hidden absolute block rounded-full md:none -top-10 -left-10 p-30 circle circle-bottom" ></div>
    <div class="absolute top-0 bottom-0 left-0 right-0 ">
      <div class="container ">
        <section class="flex flex-col items-center justify-between min-h-screen login">
          <div class="flex items-center justify-center login__logo z-1 sm:w-[200px] sm:h-[200px] w-[150px] h-[150px]">
            <img src="./project/image/MT.png" alt="">
          </div>
          <div class="w-full px-4 py-6 bg-white rounded-lg sm:px-6 sm:py-12 md:w-3/4 lg:w-1/2 login__content z-1 ">
            <div class="pb-4 text-center sm:pb-6 login__title">
              <h2 class="mb-4 text-xl text-2xl font-bold sm:text-2xl md:text-3xl lg:text-4xl">YUK HOLATINI TEKSHIRISH</h2>
              <p id="text" class="text-[#918989] sm:text-lg text-base ">
                Buyurtma qilingan maxsulotni shtrix raqami yoki ID kiriting !
              </p>
              
            </div>
            <!-- list chiqarish uchun hidden olib tashlanadi -->
            <div class="sm:pb-6 pb-4 overflow-y-scroll login__list h-[300px] space-y-10 hidden" id="posts_table">

            </div>
            <div class="flex flex-col items-center justify-center py-5 space-x-0 space-y-3 md:space-y-0 md:space-x-4 md:flex-row" >
              <input type="text" name="" id="search" placeholder="Shtrix raqam yoki ID raqam kiriting!" class=" w-full md:w-3/4 p-3 bg-[#F2F0F0] text-[#C8C8C8] rounded-lg border border-[#F2F0F0] text-black" id="">
              <button class="w-full px-8 py-3 text-white duration-100 bg-green-500 rounded-lg md:w-auto hover:bg-green-600 active:bg-green-600" id="search_submit">
                Izlash
              </button>
            </div> 
          </div>
          <div class="pb-5 text-center">
            <a href="tel:+998330055100" class="text-xl font-bold text-white duration-200 hover:text-green-600">+998 33 005 51 00</a>
            <div class="flex items-center justify-center w-full mt-4 space-x-4"> 
              <a href="https://www.instagram.com/cip_cargo/" class="w-10 h-10 duration-200 fill-white hover:fill-green-600"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-3.11-8.83l.013-.007.87 2.87c.112.311.266.367.453.341.188-.025.287-.126.41-.244l1.188-1.148 2.55 1.888c.466.257.801.124.917-.432l1.657-7.822c.183-.728-.137-1.02-.702-.788l-9.733 3.76c-.664.266-.66.638-.12.803l2.497.78z"/></svg>
              </a>
              <a href="https://t.me/cip_cargo" class="w-10 h-10 duration-200 fill-white hover:fill-green-600"> 
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" ><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/></svg>
              </a>
            </div>
            <a class='text-white text-lg mt-4 block' href="https://abduganiev.uz">Websayt ishlab chiquvchi - ABDUGANIEV TECHNOLOGY</a>
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