<div class="p-4" >
<h1 class="font-merriweather text-xl font-bold  underline  mt-4 text-center"> Best sellers of last month</h1>
<ul>
    @foreach($bestSellers as $productName => $count)
        <li class="max-w-sm rounded overflow-hidden shadow-lg pt-4 px-6 py-4 bg-indigo-300 mt-4">
          
            <h2>{{ $productName }}</h2>
        </li>
    @endforeach
</ul>
</div>