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
  @include('components\_navbar')

  <!-- Content -->
  <div class="mx-auto w-full max-w-screen-xl h-full flex items-center justify-center">
    <div class="text-center">
      <h1 class="text-4xl font-semibold text-gray-900 dark:text-white">Welcome to SormMaiSed</h1>
      <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">A Website for Maintennance / Service.</p>
      <div class="mt-8 grid">
        <a href="/maintain" class="px-6 py-3 my-2 mx-auto bg-white text-black rounded-md hover:bg-blue-500 hover:text-white w-2/3 lg:w-full">Maintennance
          / Service</a>
        <a href="/follow" class="px-6 py-3 my-2 mx-auto bg-white text-black rounded-md hover:bg-blue-600 hover:text-white w-2/3 lg:w-full">Follow
          up your device</a>
      </div>
    </div>
  </div>




  <!-- Footer -->
  @include('components\_footer')
</body>

</html>