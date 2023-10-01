<div>
    <div>
        <div class=" bg-white w-full h-full -mt-4">
            <div class="flex justify-between">
                <div class="w-1/4">
                    <h1 class="text-3xl font-bold font-merriweather m-8  w-2/3">Purchase History</h1>
                </div>
            </div>


            @php
            $orderData = [];
            $allProducts = [];
            @endphp

            @if ($orders !== null)
            @foreach ($orders as $order)
            @php
            $products = $order->products;
            @endphp

            <div class="flex flex-col border-2 bg-white p-4 pt-0 mt-0  rounded-20 w-2/3 ml-8 mb-8  " id="history-container">
                <div class="flex flex-col mt-8 "  id="title-container" >
                    <div class="flex flex-row justify-between  bg-red-300 p-2 mr-4 ">
                        <p> order total : </p>
                        <p class="">{{ $order['total_price'] }}</p>
                    </div>

                    <div class="flex flex-row justify-between ">

                        <p> Purchased date : </p>
                        <p class="pr-4 ">{{ date(  'd-m-Y' , strtotime($order['created_at'])) }}</p>



                    </div>

                </div>

                <!-- <p class="">{{ $order['id'] }}</p> -->
                <div>
                    <!--fetch products from the orders-->
                    @foreach ($products as $product)
                    @php
                    $allProducts[] = $product;
                    @endphp

                    <div class="flex justify-between flex-col  ">
                        <div class=" flex flex-row ">

                            <div class="w-32 h-32 -mt-8">
                                <img src="/img/{{$product-> image }} " alt="" srcset=""  id="history-image">

                            </div>

                            <div class="flex flex-col ml-60 " id="content">
                                <h1 class=" font-bold font-merriweather ">{{ $product['name'] }}</h1>
                                <div class="flex flex-row justify-between">
                                    <p> Quantity </p>
                                    <p> {{ $product->pivot['quantity'] }}</p>

                                </div>

                                <div class="flex flex-row justify-between">
                                    <p class="pr-2 "> Price :</p>
                                    <p> {{ $product->pivot['product_price'] }}</p>

                                </div>

                                <div class="flex flex-row justify-between">
                                    <p class="pr-2 "> Total Price : </p>
                                    <p> {{ $product->pivot['total_price_per_product'] }}</p>
                                </div>



                            </div>



                        </div>
                        @endforeach
                        <!--fetch products from the orders-->


                    </div>

                </div>

            </div>
            @endforeach
            @else
            <p>No orders available.</p>
            @endif

        </div>