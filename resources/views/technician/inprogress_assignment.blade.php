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
  
  <!-- หน้านี้จะแสดงข้อมูลของออเด้อที่ยังทำไม่เสร็จ -->

  <div class="w-3/5 h-max my-5 mx-auto p-2 grid grid-cols-2 gap-2 mt-24">
    <a href="{{ route('inprogress') }}" class="text-black font-normal text-2xl text-center">In progress</a>
    <a href="{{ route('completed') }}" class="text-gray-400 font-normal text-2xl text-center">Completed</a>
    <hr class="border-t-2 border-gray-900 my-4">
    <hr class="border-t-2 border-gray-400 my-4">
  </div>

  <div class="bg-gray-200 w-4/6 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-5 gap-5">
    
    <div class="ml-10 col-span-4 text-black-400 font-bold text-xl text-center flex"> Order ID : xxxxxx</div>
    <!-- โยนงานคือถ้ากดแล้วจะมีชื่อคนอื่นเป็นให้เลือกอะะ -->
    <form class=" ">
      <div class="">
        <label class="text-red-600">โยนงาน</label>
        <select id="type"
          class="col-start-5 bg-red-50 border border-red-300 text-red-900 text-lg rounded-xl focus:ring-red-500 focus:border-blue-500 block px-3 py-1.5  dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">

          <option>อิทธิกร</option>
          <option>มุตุ้</option>
          <option>ขนมถ้วย</option>
          <option>งง</option>
        </select>
      </div>
    </form>
    <div class="text-black-300 font-normal text-lg text-center">Maintennance</div>
    <div class="text-black-300 font-normal text-lg text-center">Monitor</div>
    <div class="text-black-300 font-normal text-lg text-center col-span-2"> Detail </div>
    <div class="bg-yellow-400 rounded-xl text-black-300 font-normal text-lg text-center"> In progress </div>
    
    <!-- ถ้าทำเสร็จแล้วจะมากดต้องนี้ แ้ลว status จะเปลี่ยน -->
    <button type="submit"
        class="col-start-5 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-xl text-lg w-full sm:w-auto px-5 py-1 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">เสร็จเเน้ว</button>
  </div>
   
  <!-- Footer -->
  @include('components._footer')
</body>

</html>