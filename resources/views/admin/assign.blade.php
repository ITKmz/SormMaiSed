<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>SormMaiSed</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-900">

  <!-- Navbar -->
  <nav class="bg-white dark:bg-gray-900 fixed top-0 w-full z-10">
    <div class="mx-auto w-full max-w-screen-xl p-4">
      <div class="flex justify-between">
        <a href="/" class="flex items-center">
          <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">SormMaiSed</span>
        </a>
        <div class="flex items-center">
          <a href="/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Home</a>
          <a href="/customerform" class="ml-6 text-gray-500 hover:text-gray-900 dark:hover:text-white">Information</a>
          <a href="/orderall" class="ml-6 text-gray-500 hover:text-gray-900 dark:hover:text-white">Order</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Content -->

  <div class="relative overflow-x-auto sm:rounded-lg" style="margin-top: 80px;">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-grey dark:bg-grey-900">
      <div>

        <!-- Dropdown menu -->
        <div class="mb-5 ml-40"> <!-- เพิ่ม ml-4 เพื่อขยับทางขวา -->
          <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sorted by</label>
          <select id="type" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
            <option>Maintenance</option>
            <option>Service</option>
            <option>Precedent</option>
          </select>
        </div>
      </div>
    </div>
  </div>

<div class="flex justify-center">
    <div class="bg-gray-200 w-3/5 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-1 gap-4">
        <div class="col-span-3 text-black-400 font-bold text-lg text-left">Employee ID: xxxxxxx</div>
        <div class="flex flex-col my-3 mx-10">
            <div class="flex space-x-40 ">
                <div class="text-black-400 font-bold text-lg">Name xxxxxx</div>
                <div class="text-black-400 font-bold text-lg">Last Name XXxxxxx</div>
            </div>
            <div class="flex space-x-40 mt-4">
                <div class="text-black-400 font-bold text-lg">Tel XXxxxxx</div>
                <div class="flex space-x-5">
                    <div class="text-black-400 font-bold text-lg">Department XXxxxxx</div>
                    <a class="bg-green-600 rounded-xl px-5 text-white font-normal text-lg text-center">Free</a>
                    <a href="/admintech" class="bg-red-600 rounded-xl px-5 text-white font-normal text-lg text-center">Assign work</a>
                </div>
            </div>
        </div>
    </div>
</div>




  <!-- Footer -->
  @include('components._footer')
</body>

</html>
