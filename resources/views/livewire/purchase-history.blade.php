
        <div class=" h-full " id="purchase-history-background-image">
            <div class="flex justify-between">
                <div class="w-1/4">
                    <h1 class="text-3xl font-bold font-merriweather m-8  w-2/3">Purchase History</h1>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 ">
            @php
            $orderData = [];
            $allProducts = [];
            @endphp

            @if ($orders !== null)
            @foreach ($orders as $order)
            @php
            $products = $order->products;
            @endphp
          

            <div class="w-full lg:ml-8 mb-8 bg-white " id="order-in-purchase-history">
                <div class="flex flex-col ">

                    <div class="flex flex-row  bg-red-300 p-2 mr-4 justify-between m-4 rounded  text-lg font-[dm sans]">
                        <p> order total : </p>
                        <p class="">{{ $order['total_price'] }}</p>
                    </div>
                    <div class="flex flex-row justify-between m-4 -mt-2  text-lg font-[dm sans]">

                        <p> Purchased date : </p>
                        <p class="pr-4 ">{{ date(  'd-m-Y' , strtotime($order['created_at'])) }}</p>

                    </div>

                </div>



                <!-- <p class="">{{ $order['id'] }}</p> -->

                <!--fetch products from the orders-->
                <div class="flex flex-row justify-between ">

                @foreach ($products as $product)
                @php
                $allProducts[] = $product;
                @endphp

                    <div>
                        <img src="/img/{{$product-> image }} " alt="" srcset="" class="h-32 border rounded m-4  ">

                    </div>
                    <div>
                        <div id="item-details-box" class="mt-8 mr-8">
                            <div class="flex flex-row justify-between gap-4 ">
                                <p> Product title:</p>
                            <h1 class=" font-bold font-merriweather ">{{ $product['name'] }}</h1>

                            </div>
                            <div class="flex flex-row justify-between gap-4 ">
                                <p> Quantity purchased:</p>
                                <p  class=" font-bold font-merriweather "> {{ $product->pivot['quantity'] }}</p>

                            </div>
                            <div class="flex flex-row justify-between gap-4 ">
                            <p> Price of item:</p>
                            <p  class=" font-bold font-merriweather "> {{ $product->pivot['product_price'] }}</p>

                            </div>
                            <div class="flex flex-row justify-between gap-4 ">
                                <p>Total price per product</p>
                                <p  class=" font-bold font-merriweather "> {{ $product->pivot['total_price_per_product'] }}</p>

                            </div>


                        </div>


                    </div>


                </div>


                @endforeach
                <!--fetch products from the orders-->
                </div>
       


                @endforeach
                @else
                <p>No orders available.</p>
                @endif
       
                </div>
            </div>
       