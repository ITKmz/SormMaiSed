<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>SormMaiSed</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="">
  <!-- Navbar -->
  @include('components\_navbar_admin')


  <!-- Content -->

  <div class="w-3/5 h-max mt-20 mx-auto p-2 grid grid-cols-2 gap-2">
    <a href="technician" class="text-black font-normal text-2xl text-center">Technician</a>
    <a href="customer" class="text-gray-400 font-normal text-2xl text-center">Customer</a>
    <hr class="border-t-2 text-gray-400 my-4">
    <hr class="border-t-2 border-gray-900 my-4">
  </div>

  <!-- Content -->

  <div class="flex justify-center">
    <div class="bg-gray-200 w-3/5 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-4 gap-4">
      <div class="col-span-4 flex text-black-400 font-bold text-lg text-center">Employee ID : xxxxxx</div>

      <div class="col-span-1 text-black-300 font-normal text-lg text-center">Name xxxx</div>
      <div class="col-span-1 text-black-300 font-normal text-lg text-center">Last Name xxxx</div>
      <div class="col-span-1 text-black-300 font-normal text-lg text-center">Tel xxxxxxxxx</div>
      <div class="col-span-1"></div> <!-- This is an empty div to fill the remaining space in the row -->

      <div class="col-span-1 text-black-300 font-normal text-lg text-center">Username</div>
      <div class="col-span-1 text-black-300 font-normal text-lg text-center">Password</div>
      <div class="col-span-1 text-black-300 font-normal text-lg text-center"></div>
      <div class="col-span-1 flex justify-center">
        <a href="/ordercustomerform"
          class="bg-zinc-400 rounded-xl px-5 text-black-300 font-normal text-lg text-center">Order</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  @include('components._footer')
</body>

</html>