<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>

    <!-- app.js
    <script src="{{ mix('js/app.js') }}" defer></script> -->

    <!-- Scripts -->
    @livewireScripts

    @livewireStyles



</head>

<header class="">
    <!-- dsktop mneu-->
    @livewire('admin-desktop-menu')

</header>

<body>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 mb-4">
                <div class="">


                    <div class="max-w-sm rounded overflow-hidden shadow-lg pt-4 px-6 py-4 bg-indigo-300 mt-4">
                        <div class="font-bold text-xl mb-2 ">Total products</div>
                        <h2>{{$totalproducts}}</h2>
                    </div>


                    <div class="max-w-sm rounded overflow-hidden shadow-lg pt-4 px-6 py-4 bg-indigo-300 mt-4">
                        <div class="font-bold text-xl mb-2 ">Total Users</div>
                        <h2>{{$totalregisteredusers}}</h2>
                    </div>


                    <div class="max-w-sm rounded overflow-hidden shadow-lg pt-4 px-6 py-4 bg-indigo-300 mt-4">
                        <div class="font-bold text-xl mb-2 ">Total Admins</div>
                        <h2>{{$totaladmins}}</h2>
                    </div>
                    <div class="">
                    @livewire('cart-abandonment-rate')

                </div>
                </div>

             
                <div class=" p-4 ">
                    @livewire('sales-per-category')

                </div>

            </div>

            <div class=" w-full rounded-lg mt-8 ">
                @livewire('get-product-views')
            </div>



        </div>

        <div class="flex lg:flex-row flex-col gap-2 ">
            <div class="w-1/2 p-8 border-2 mt-2 rounded-lg bg-[#EBE3D5] text-xl underline  ">
                @livewire('stocks')
            </div>

            <div class="flex flex-row border-2 mt-2 rounded-lg bg-[#EBE3D5] ">

                @livewire('best-sellers')


            </div>

        </div>



    </div>


    </div>
    </div>





</body>


</html>