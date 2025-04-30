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
        <hr class="border-t-2 border-gray-900 my-4">
        <hr class="border-t-2 border-gray-400 my-4">
    </div>

    @foreach($technicians as $technician)
    <div class="flex justify-center">
        <div class="bg-gray-200 w-3/5 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-4 gap-4">
            <div class="col-span-3 flex text-black-400 font-bold text-lg text-center">Employee ID : {{ $technician->employee_id }}</div>
            <div class="col-span-1 text-black-300 font-normal text-lg text-center">Status : @if ($technician->is_active == 0) Available @else Unavailable @endif</div>
            <div class="col-span-4 text-black-300 font-normal text-lg">Name : {{ $technician->employee_name }}</div>
            
            <div class="col-span-1 text-black-300 font-normal text-lg">Tel : {{ $technician->employee_tel }}</div>

            <div class="col-span-1 text-black-300 font-normal text-lg">Department : {{ $technician->department }}</div>
            <div class="col-span-1 text-black-300 font-normal text-lg">Completed work : {{ $technician->product_count }}</div>
            <div class="col-span-1 text-black-300 font-normal text-lg">Average rating : {{ $technician->avg_rating }}</div>
            {{-- button fire employee --}}
            <div class="col-span-1 col-end-5 flex justify-center mt-4">
                <a href="{{ route('firedtechnician', $technician->employee_id) }}"
                    class="bg-red-700 rounded-xl px-5 text-white font-normal text-lg text-center py-3 px-12">Fired</a>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Footer -->
    @include('components._footer')
</body>

</html>