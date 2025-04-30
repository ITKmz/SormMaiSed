<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>SormMaiSed</title>
  @vite('resources/css/app.css')
</head>

<body class="">
  <!-- Navbar -->
  @include('components._navbar')

  <!-- Content -->

  <!-- หน้านี้จะมีแต่ออเด้อที่ทำเสร็จแล้ว ตรง Received จะมีอันนี้กับ Sucessful -->
  <div class="w-3/5 h-max my-5 mx-auto p-2 grid grid-cols-2 gap-2 mt-24">
  <a href="{{ route('inprogress') }}" class="text-gray-400 font-normal text-2xl text-center">In progress</a>
    <a href="{{ route('completed') }}" class="text-black font-normal text-2xl text-center">Completed</a>
    <hr class="border-t-2 border-gray-400 my-4">
    <hr class="border-t-2 border-gray-900 my-4">
  </div>

  <div class="bg-gray-200 w-4/6 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-4 gap-4">
    
    <div class="ml-10 col-span-4 text-black-400 font-bold text-xl text-center flex"> Order ID : xxxxxx</div>
    <div class="col-start-1 font-normal text-lg text-center">Maintennance</div>
    <div class="text-black-300 font-normal text-lg text-center">Monitor</div>
    <div class="text-black-300 font-normal text-lg text-center"> Detail </div>
    <div class="bg-gray-400 rounded-xl text-black-300 font-normal text-lg text-center w-fit px-5"> Received </div>

    <hr class="col-span-5 border-t-2 border-gray-400 my-2">

    <div class="ml-10 col-span-2 flex text-black-400 font-bold text-lg text-center">Feedback</div>
    <div class="col-span-2 flex text-black-400 font-bold text-lg text-center"> Advice </div>
    <div class="ml-10 col-span-2 flex text-black-400 font-normal text-lg text-center"> ข้อมูล Feedback</div>
    <div class="col-span-2 flex text-black-400 font-normal text-lg text-center"> ข้อมูล Advice </div>
</div>

  <!-- Footer -->
  @include('components._footer')
</body>

</html>