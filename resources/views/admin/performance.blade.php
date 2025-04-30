<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>SormMaiSed</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="py-40">
    <!-- Navbar -->
    @include('components\_navbar_admin')

    <!-- Content -->
    <!-- show besttechnician and besttype -->
    <div class="w-3/5 h-max  mx-auto p-2 grid grid-cols-2 gap-2">
        <button id="tech" class="text-black font-normal text-2xl text-center">Income</button>
        <button id="type" class="text-gray-400 font-normal text-2xl text-center">Product</button>
        <hr id="hrtech" class="border-t-2 border-gray-900 my-4">
        <hr id="hrtype" class="border-t-2 border-gray-400 my-4">
    </div>
    <div id="besttech" class="bg-gray-200 w-3/5 h-max my-8 mb-48 mx-auto rounded-xl p-10 grid grid-cols-2 gap-4">
        <div class="col-span-2 text-black-400 font-bold text-lg text-center mb-8">Latest year income</div>
        <div class="col-span-1 text-black-300 font-normal text-lg text-center">Year : {{ $income[0]->year}}</div>
        <div class="col-span-1 text-black-300 font-normal text-lg text-center">Total sale : {{ $income[0]->total_orders }}</div>
        <div class="col-span-2 text-black-300 font-normal text-lg text-center">Total earning : {{ $income[0]->total_income }}</div>
    </div>
    <div id="besttype" class="bg-gray-200 w-3/5 h-max my-8 mb-48 mx-auto rounded-xl p-10 grid grid-cols-2 gap-4 hidden">
        <div class="col-span-2 text-black-400 font-bold text-lg text-center mb-8">Best sale product of the year</div>
        <div class="col-span-1 text-black-300 font-normal text-lg text-center">Product Name : {{ $besttype[0]->product_type }}</div>
        <div class="col-span-1 text-black-300 font-normal text-lg text-center">Total sale : {{ $besttype[0]->product_count }}</div>
        <div class="col-span-1 text-black-300 font-normal text-lg text-center">Product price : {{ $besttype[0]->product_price }}</div>
        <div class="col-span-1 text-black-300 font-normal text-lg text-center">Total earning : {{ $besttype[0]->total }}</div>
    </div>
    <script>
        document.getElementById('tech').addEventListener('click', function () {
            // change color
            document.getElementById('tech').classList.remove('text-gray-400');
            document.getElementById('tech').classList.add('text-black');
            document.getElementById('type').classList.remove('text-black');
            document.getElementById('type').classList.add('text-gray-400');
            // change border
            document.getElementById('hrtech').classList.remove('border-gray-400');
            document.getElementById('hrtech').classList.add('border-gray-900');
            document.getElementById('hrtype').classList.remove('border-gray-900');
            document.getElementById('hrtype').classList.add('border-gray-400');
            // show besttech
            document.getElementById('besttech').classList.remove('hidden');
            document.getElementById('besttype').classList.add('hidden');
        });
        document.getElementById('type').addEventListener('click', function () {
            // change color
            document.getElementById('type').classList.remove('text-gray-400');
            document.getElementById('type').classList.add('text-black');
            document.getElementById('tech').classList.remove('text-black');
            document.getElementById('tech').classList.add('text-gray-400');
            // change border
            document.getElementById('hrtype').classList.remove('border-gray-400');
            document.getElementById('hrtype').classList.add('border-gray-900');
            document.getElementById('hrtech').classList.remove('border-gray-900');
            document.getElementById('hrtech').classList.add('border-gray-400');
            // show besttype
            document.getElementById('besttype').classList.remove('hidden');
            document.getElementById('besttech').classList.add('hidden');
        });
    </script>


    <!-- Footer -->
    @include('components._footer')
</body>

</html>