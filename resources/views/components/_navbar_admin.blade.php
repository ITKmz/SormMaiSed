<nav class="bg-white dark:bg-gray-900 fixed top-0 w-full">
    <div class="mx-auto w-full max-w-screen-xl p-4">
        <div class="flex justify-between">
            <a href="/" class="flex items-center">
                <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">SormMaiSed</span>
            </a>
            <div class="flex items-center">
                <a href="" class="text-gray-500 hover:text-gray-900">Home</a>
                <?php
                    $admin = session('admin')
                ?>
                @if($admin)
                <a href="{{ route('d_order') }}" class="text-gray-500 hover:text-gray-900 ml-6">Orders</a>
                <a href="{{ route('d_technician') }}" class="text-gray-500 hover:text-gray-900 ml-6">Personal information</a>
                <a href="{{ route('d_performance') }}" class="text-gray-500 hover:text-gray-900 ml-6">Performance</a>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="ml-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    {{ $admin->employee_username }}
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('signout','admin') }}"
                                class="block px-4 py-2 hover:bg-gray-100 text-red-600">Sign out</a>
                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('dashboard')}}" class="ml-6 text-gray-500 hover:text-gray-900 dark:hover:text-white">Sign in</a>
                @endif

            </div>
        </div>
    </div>
</nav>