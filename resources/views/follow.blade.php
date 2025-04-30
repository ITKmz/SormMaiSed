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
  @include('components\_navbar')

  <!-- Content -->
  <div class="">
    <h1 class="mx-auto text-4xl font-semibold text-gray-900 dark:text-white w-fit my-8 mt-32">Follow up your device</h1>
    <?php 
      $order_info = Session::get('order_info');
      $product_info = Session::get('product_info');
    ?>
    @if($order_info)
    <div class="bg-white w-3/5 mx-auto rounded-lg p-5">
      <h1 class="text-2xl font-semibold text-gray-900 w-fit mb-4">Order ID : {{$order_info->order_id}}
      </h1>
      <table class="w-full text-sm text-left rtl:text-right text-gray-500  mx-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
          <tr>
            <th scope="col" class="px-6 py-3">
              Product
            </th>
            <th scope="col" class="px-6 py-3">
              Description
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($product_info as $product)
          <tr
            class="odd:bg-white even:bg-gray-100 border-b ">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              {{ $product->product_type }}
            </th>
            <td class="px-6 py-4">
              {{ $product->product_description }}
            </td>
            <td class="px-6 py-4 flex items-center">
              @if($product->product_status == 'Completed')
              <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
              @elseif($product->product_status == 'In progress')
              <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
              @else
              <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
              @endif
              {{ $product->product_status }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @else
    <form class="max-w-sm mx-auto my-60" method="POST" action="follow">
      @csrf
      <div class="mb-5">
        <label for="order_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order ID</label>
        <input type="text" name="order_id"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Order ID" required />
      </div>
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    @endif

  </div>

  <!-- Footer -->
  @include('components\_footer')
</body>

</html>