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
  <div class="bg-gray-100 w-6/12 my-10 mx-auto rounded-3xl p-10">
    <h1 class="mx-auto text-4xl font-semibold text-gray-900 dark:text-black w-fit my-4">EDIT PROFILE</h1>
    <form class="max-w-sm mx-auto my-10">
      @csrf

      <div class="mb-5">
        <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-400">First name</label>
        <input type="text" id="fname"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="First name" required />
      </div>
      <div class="mb-5">
        <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-400">Last name</label>
        <input type="text" id="lname"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Last name" required />
      </div>
      <div class="mb-5">
        <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-400">Phone number</label>
        <input type="tel" id="tel" minlength="10"
          class="remove-arrow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Phone number" pattern="[0-9]{10,}" required />
      </div>

      <div class="mb-5">
        <label for="useranme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-400">Username</label>
        <input type="text" id="username"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Username" required />
      </div>
      <div class="mb-5">
        <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black-400">Password</label>
        <input type="text" id="pass"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Password" required />
      </div>
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CONFIRM</button>
    </form>
  </div>

  <!-- Footer -->
  @include('components._footer')
</body>

</html>