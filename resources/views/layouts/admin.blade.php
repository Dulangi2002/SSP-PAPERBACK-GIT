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

<body x-data="{openMenu : false}">
    <header class=" flex justify-between bg-white drop-shadow-sm py-4 px-8 ">
        <button class="md:hidden" @click="openMenu = !openMenu">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </header>




    <!--pop out nav-->
    @livewire('admin-pop-up-nav')



    <div class="flex flex-row justify-left gap-6 ml-10 mt-10">


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
    </div>


    <br>
    <div>

        <div class="flex flex-col ">
            <div>
                @livewire('revenue' )
                @livewire('get-product-views')
            </div>
            <div class="flex flex-col  " id="best-sellers-abandonment-rate">
                <div class="">
                    @livewire('best-sellers')
                </div>
                <div>
                    @livewire('cart-abandonment-rate')
                </div>
            </div>
            <div id="sales-per-category">
                @livewire('sales-per-category')

            </div>
            <div id="stock-chart" class="">
              @livewire('stocks')

            </div>


        </div>

    </div>
    </div>





</body>


</html>