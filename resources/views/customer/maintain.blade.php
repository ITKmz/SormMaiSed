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
  <?php
    $user = session('user')
  ?>
  <h1 class="mx-auto text-4xl font-semibold text-gray-900 dark:text-white w-fit my-8 mt-32">Maintennance / Service</h1>
  <form class="max-w-sm mx-auto my-14" method="POST" action="submitmaintain">
    @csrf
    <div id="form">
      <input type="hidden" name="customer_id" value="{{ $user->customer_id }}">
      <div class="mb-5">
        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your
          type</label>
        <select id="type" name="type[]"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

          <option>PC</option>
          <option>Labtop</option>
          <option>Mobile (iOS)</option>
          <option>Mobile (Android)</option>
          <option>Other</option>
        </select>

      </div>
      <div class="mb-5">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail</label>
        <textarea id="message" rows="4" name="detail[]"
          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
          placeholder="Detail..." required></textarea>
      </div>
    </div>
    <div class="mb-5">
      <label for="payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment method</label>
      <select id="payment" name="payment_method"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

        <option>Bank transfer</option>
        <option>Credit card</option>
        <option>Paypal</option>
        <option>Other</option>
      </select>
    </div>
    <button type="button" name="add"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Add
      more</button>
    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>

  </form>
  <!-- Script if click button name add add more input -->
  <script>
    document.getElementsByName('add')[0].addEventListener('click', function () {
      // add more input tye and detail
      var form = document.getElementById('form');
      var div = document.createElement('div');
      div.setAttribute('class', 'mb-5');
      var label = document.createElement('label');
      label.setAttribute('for', 'type');
      label.setAttribute('class', 'block mb-2 text-sm font-medium text-gray-900 dark:text-white');
      label.innerHTML = 'Select your type';
      div.appendChild(label);
      var select = document.createElement('select');
      select.setAttribute('name', 'type[]');
      select.setAttribute('class', 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5');
      var option1 = document.createElement('option');
      option1.text = 'PC';
      var option2 = document.createElement('option');
      option2.text = 'Labtop';
      var option3 = document.createElement('option');
      option3.text = 'Mobile (iOS)';
      var option4 = document.createElement('option');
      option4.text = 'Mobile (Android)';
      var option5 = document.createElement('option');
      option5.text = 'Other';
      select.appendChild(option1);
      select.appendChild(option2);
      select.appendChild(option3);
      select.appendChild(option4);
      select.appendChild(option5);
      div.appendChild(select);
      form.appendChild(div);

      var label2 = document.createElement('label');
      label2.setAttribute('for', 'message');
      label2.setAttribute('class', 'block mb-2 text-sm font-medium text-gray-900 dark:text-white');
      label2.innerHTML = 'Detail';
      div.appendChild(label2);
      var textarea = document.createElement('textarea');
      textarea.setAttribute('name', 'detail[]');
      textarea.setAttribute('rows', '4');
      textarea.setAttribute('class', 'block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500');
      textarea.setAttribute('placeholder', 'Detail...');
      textarea.setAttribute('required', '');
      div.appendChild(textarea);
      form.appendChild(div);
    });

  </script>
  <!-- Footer -->
  @include('components\_footer')
</body>

</html>