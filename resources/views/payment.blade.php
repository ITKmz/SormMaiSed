<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>SormMaiSed</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-900">
  <!-- Navbar -->
  @include('components._navbar')

  <!-- Content -->

  <p class="mt-5 mx-auto text-4xl font-normal text-white-900 dark:text-white w-fit"> order : xx </p>
  <div class="bg-gray-200 w-3/5 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-4 gap-4">

    <!--  -->
    <div class="ml-20 text-black-400 font-normal text-lg text-center">product_type</div>
    <div class="mx-auto text-black-400 font-normal text-lg text-center">product_description</div>
    <div class="mx-auto text-black-400 font-normal text-lg text-center">จำนวน</div>
    <div class="mx-20 text-black-400 font-normal text-lg text-center">product_price</div>
    <!--  -->
    <hr class="col-span-4 border-t-2 border-gray-400 my-2">
    <div class="col-span-4 text-right mr-20">Total xxxxxxx Bath</div>

  </div>
  <div class="flex justify-end space-x-2 mr-80">
    <button type="submit" class="bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Pay now</button>
  </div>


  <!-- Footer -->
  @include('components._footer')
</body>

</html>