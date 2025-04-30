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
    <div class="mx-auto w-full max-w-screen-xl h-full flex items-center justify-center">
        <div class="text-center bg-white p-12 rounded-lg w-1/3">
            <h1 class="text-4xl font-semibold text-gray-900 mb-12">Sign in</h1>
            <form class="max-w-sm mx-auto my-4" method="POST" action="signin">
                @csrf
                <div class="mb-5">
                    <input type="text" name="username"
                        class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Username" required />
                </div>
                <div class="mb-5">
                    <input type="password" name="password"
                        class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Password" required />
                </div>
                <!-- if error message show error -->
                <?php
                    $error = Session::get('error');
                ?>
                <div class="text-red-500">
                    <?= $error ?>
                </div>
                <button type="Login"
                    class="mx-auto mt-12 block text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Sign in</button>
                <a href="/register" class="mx-auto block text-center font-semibold text-gray-400 underline">Create New
                    Account</a>
            </form>
        </div>
    </div>




    <!-- Footer -->
    @include('components\_footer')
</body>

</html>