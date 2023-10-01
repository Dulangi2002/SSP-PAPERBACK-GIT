
<div class="mx-auto flex min-h-screen w-full items-center justify-center bg-white text-black " id="contact-form-background">
<p  id="quote" class="lg:top-48 sm:top-24  sm:mb-8  text-2xl  lg:w:1/3  sm:w-full sm:ml-8 sm:mr-8 sm:text-xl  sm:text-center lg:text-left  md:w-1/4 absolute lg:left-0 lg:ml-8  ">“If you want to find out if someone is a true bookworm or not, give them a thousand page novel and see what happens"</p>

<div>
<img src="/img/ContactForm3.jpg" alt="back" id="checkout-image">

</div>

        <form  wire:submit.prevent="addcontactDetails" class="flex lg:w-1/3 flex-col space-y-4 bt-2 z-24 absolute top-40 md:w-2/3 sm:w-2/3 mt-8 " id="contact-form"> 
            <label for="ContactNumber" class="font-merriweather">Contact Number</label>
            
            <input type="text" wire:model="ContactNumber" class="form-control border-2 border-black text-black  " id="ContactNumber" placeholder="Enter Contact Number" value="$ContactNumber">

            @error('ContactNumber') <span class="text-danger">{{ $message }}</span>@enderror

            <label for="houseNumber" class="font-merriweather">House Number</label>
            <input type="text" wire:model="houseNumber" class="form-control form-control border-2 border-black text-black  " id="houseNumber" placeholder="Enter House Number">

            @error('houseNumber') <span class="text-danger">{{ $message }}</span>@enderror

            <label for="streetAddress" class="font-merriweather">Street Address </label>
            <input type="text" wire:model="streetAddress" class="form-control form-control border-2 border-black text-black  " id="streetAddress" placeholder="Enter Street Address">
        
            @error('streetAddress') <span class="text-danger">{{ $message }}</span>@enderror

            <label for="city" class="font-merriweather">City</label>
            <input class="form-control form-control border-2 border-black text-black  " wire:model="city" id="city" type="text" placeholder="City">

            @error('city') <span class="text-danger">{{ $message }}</span>@enderror

            <button type="submit" id="purchase">Purchase</button>
            
           
        


        </form>
      <!--  <div x-data="{ open: false }">


            <div x-show="open" @click.outside="open = false">
                <h1>Purchase successful</h1>
            </div>
        </div>-->

    </div>
