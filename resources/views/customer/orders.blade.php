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
      <a href="{{ route('waitpayment') }}" class="text-gray-400 font-normal text-2xl text-center">Waiting for
        payment</a>
      <a href="{{ route('orders') }}" class="text-black font-normal text-2xl text-center">Orders</a>
      <hr class="border-t-2 border-blue-200 my-4">
      <hr class="border-t-2 border-gray-900 my-4">
    </div>
    @foreach($data as $item)

    <div class="bg-gray-200 w-4/6 h-max my-5 mx-auto rounded-xl p-10 grid grid-cols-5 gap-5">
      <div class="ml-10 col-span-4 text-black-400 font-bold text-xl text-center flex"> Order ID : {{ $item[0]->order_id
        }}</div>
      <div class="bg-gray-400 rounded-xl text-black-300 font-normal text-lg text-center w-fit px-10"> Paid </div>
      @foreach($item as $subitem)
      <div class="col-start-1 font-normal text-lg text-center">{{ $subitem->product_type }}</div>
      <div class="text-black-300 font-normal text-lg text-center">{{ $subitem->product_description }}</div>
      <div class="text-black-300 font-normal text-lg text-center"> Employee (ต้องมี???)</div>
      <div class="text-black-300 font-normal text-lg text-center">{{ $subitem->product_price }} Baht</div>
      <div class="text-white-300 font-normal text-lg text-center w-fit px-5 flex">
        @if($subitem->product_status == 'Completed')
        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2 mt-2.5"></div>
        @elseif($subitem->product_status == 'In progress')
        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2 mt-2.5"></div>
        @else
        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2 mt-2.5"></div>
        @endif
        {{ $subitem->product_status}}
      </div>
      @endforeach
      <hr class="col-span-5 border-t-2 border-gray-400 my-2">
      <div class="col-start-4 col-span-2 flex text-black-400 font-normal text-lg text-center"> Total {{ $item[0]->total_price }} บาท</div>
    </div>
    @endforeach

  </div>
  <!-- Footer -->
  @include('components._footer')
</body>

</html>