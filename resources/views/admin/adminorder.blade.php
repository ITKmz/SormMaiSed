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
  @include('components\_navbar_admin')

  <!-- Content -->
  <div class="mt-24">
    @foreach($orders as $order)
    <div class="flex justify-center">
      <div class="bg-gray-200 w-3/5 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-3 gap-4">
        <div class="col-span-3 flex text-black-400 font-bold text-lg text-center">Order ID : {{ $order->order_id }}
        </div>
        <div class="col-span-1 text-black-300 font-normal text-lg">Status : @if ($order->employee_id == null) Unassigned
          @else Assigned @endif</div>
        <div class="col-span-1 text-black-300 font-normal text-lg">Name : {{ $order->customer_name }}</div>

        <div class="col-span-3 text-black-300 font-normal text-lg">Tel : {{ $order->customer_tel }}</div>

        <div class="col-span-1 text-black-300 font-normal text-lg">Payment method : {{ $order->payment_method }}</div>
        <div class="col-span-3 text-black-300 font-normal text-lg">Payment date : {{ $order->payment_date }}</div>
        <hr class="col-span-4 border-t-2 border-gray-400 my-2">
        <div class="col-span-1 text-black-300 font-normal text-lg">Product type : {{ $order->product_type }}</div>
        <div class="col-span-2 text-black-300 font-normal text-lg">Product description : {{ $order->product_description }}</div>

        {{-- button fire employee --}}
        @if ($order->employee_id == null)
        <div class="col-span-1 col-end-5 flex justify-center mt-4">
          <button id="dropdownDefaultButton" data-dropdown-toggle="employeedropdown{{ $order->product_id }}"
                    class="ml-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Assign
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="employeedropdown{{ $order->product_id }}"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        @foreach ($technicians as $technician)
                        <li>
                            <a href="{{ route('assignorder', ['product_id' => $order->product_id, 'employee_id' => $technician->employee_id]) }}"
                                class="block px-4 py-2 hover:bg-gray-100 ">{{ $technician->employee_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
        </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  
  <!-- Footer -->
  @include('components._footer')
</body>

</html>