<x-guest-layout>


    <div>

        <div class="bg-white h-screen flex flex-row right-0 left-0 margin-auto  ">
            <div>
                <img src="{{asset('/img/success2.jpg')}}" alt="" id="success-image" class=" right-0 lg:h-auto h-62 w-72 lg:w-96 left-0 lg:ml-56 ml-24  ">
            </div>
            <div class=" p-8 lg:ml-24 mt-56 lg:-mt-8 -ml-96 lg:bg-none" id="success-message">
                <svg viewBox="0 0 24 24" class="text-purple-600 w-16 h-16 mx-auto my-6">
                    <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <div class="text-center" >
                    <h3 class="md:text-3xl text-base text-black font-semibold text-center">Order placed successfully!</h3>
                    <p class="text-black my-2 text-2xl">Thank you for shopping with us</p>
                    <p class="text-xl font-bold font-[dm sans]">Happy reading !</p>

                    <div class="py-10 text-center">

                        <button>
                            <a href="{{ route('homepage') }}" class="px-12 bg-purple-600 hover:bg-pruple-500 text-white font-semibold py-3">Back</a>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-guest-layout>