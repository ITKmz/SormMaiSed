<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>SormMaiSed</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>


     <!-- Navbar -->
  <nav class="bg-white dark:bg-gray-900 fixed top-0 w-full z-10">
    <body class="bg-gray-900">
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

    <div class="w-3/5 h-max mt-20 mx-auto p-2 grid grid-cols-2 gap-2">
        <a href="customerform" class="dark:text-blue-200 font-normal text-2xl text-center">Customer</a>
        <a href="techform" class="dark:text-white font-normal text-2xl text-center">Technician</a>
        <hr class="border-t-2 border-blue-200 my-4">
        <hr class="border-t-2 border-gray-900 my-4">
    </div>
  

  <!-- Content -->
  <div class="bg-gray-200 w-fit my-5 mx-72 rounded-xl p-3 text-xl font-bold"> EmployeeID : xxxxxxx </div>

  <div class="bg-gray-200 w-3/5 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-4 gap-4">
    
    <div class="flex text-black-400 font-bold text-lg text-center"> Order ID : xxxxxx</div>
    <div class="col-start-5 bg-zinc-400 rounded-xl px-5 text-black-300 font-normal text-lg text-center"> Paid </div>
    

    <div class="text-black-300 font-normal text-lg text-center">Keyboard</div>
    <div class="text-black-300 font-normal text-lg text-center">Switch wont work</div>
    <div class="text-black-300 font-normal text-lg text-center"> Mr.Puen </div>
    <div class="text-black-300 font-normal text-lg text-center"> 500 Baht </div>
    <div class="bg-yellow-400 rounded-xl px-5 text-black-300 font-normal text-lg text-center"> In progress </div>

    <div class="text-black-300 font-normal text-lg text-center">Keyboard</div>
    <div class="text-black-300 font-normal text-lg text-center">Switch wont work</div>
    <div class="text-black-300 font-normal text-lg text-center"> Mr.Puen </div>
    <div class="text-black-300 font-normal text-lg text-center"> 400 Baht </div>
    <div class="bg-yellow-400 rounded-xl px-5 text-black-300 font-normal text-lg text-center"> In progress </div>

    <hr class="col-span-4 border-t-2 border-gray-400 my-4">
    <div class="col-start-4 font-normal text-lg text-right mr-10">Total 900 Baht</div>
</div>


         


    <!-- พยายามจะทำให้อันนี้เปลี่ยนสถานะ -->
    <!-- <script>
    const condition = 1;
    if (condition == 1) {
        const div = document.createElement('div');
        div.className = 'w-fit px-4 bg-green-400 rounded-xl text-black-300 font-normal text-lg text-center';
        div.textContent = 'ควย';
        document.body.appendChild(div);
    } else if (condition == 0) {
        const div = document.createElement('div');
        div.className = 'w-fit px-4 bg-yellow-400 rounded-xl text-black-300 font-normal text-lg text-center';
        div.textContent = 'In progress';
        document.body.appendChild(div);
    }</script> -->
   


  <!-- Footer -->
  @include('components._footer')
</body>

</html>
