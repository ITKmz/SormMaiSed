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
  @include('components._navbar')

  <!-- Content -->
  <div class="my-24">
    <div class="w-3/5 h-max my-4 mx-auto p-2 grid grid-cols-2 gap-2">
      <a href="{{ route('waitpayment') }}" class="text-black font-normal text-2xl text-center">Waiting for
        payment</a>
      <a href="{{ route('orders') }}" class="text-gray-400 font-normal text-2xl text-center">Orders</a>
      <hr class="border-t-2 border-gray-900 my-4">
      <hr class="border-t-2 border-blue-200 my-4">
    </div>

    @foreach($data as $item)
    <div class="bg-gray-200 w-4/6 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-4 gap-4">
      <div class="ml-10 col-span-3 text-black-400 font-bold text-xl text-center flex"> Order ID :{{ $item[0]->order_id }}</div>
      <div class="col-start-4 rounded-xl dark:text-red-600 font-normal text-lg text-center"> Waiting for payment </div>
      @foreach($item as $subitem)
      <div class="col-start-1 text-black-300 font-normal text-lg text-center">{{ $subitem->product_type }}</div>
      <div class="col-start-2 text-black-300 font-normal text-lg text-center">{{ $subitem->product_description }}</div>
      <div class="col-start-3 text-black-300 font-normal text-lg text-center ">{{ $subitem->product_price }} Baht</div>
      @endforeach
      <hr class="col-span-4 border-t-2 border-gray-400 my-2">
      <div class="col-start-1 text-black-300 font-normal text-lg text-center ">{{ $subitem->order_time }}</div>
      <div class="col-start-3 text-black-300 font-normal text-lg text-center "> Total {{ $item[0]->total_price }} </div>
      <a href="{{ route('paynow', $item[0]->order_id) }}"
        class="col-start-4 text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-xl text-lg w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        Pay Now
      </a>
      <a href="{{ route('cancel', $item[0]->order_id) }}"
        class="col-start-4 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-xl text-lg w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        Cancel
      </a>
    </div>
    @endforeach
  </div>
  <!-- Footer -->
  @include('components._footer')
</body>

</html>