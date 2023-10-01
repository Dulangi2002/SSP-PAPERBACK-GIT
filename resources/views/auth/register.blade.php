
<!DOCTYPE html>
 
        <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="{{ mix('../resources/css/app.css') }}" rel="stylesheet">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>

<body id="black">




   <!-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>-->

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif





        <div class="flex items-center min-h-screen bg-white dark:bg-gray-900">
    
    <div class="hidden bg-cover lg:block lg:w-2/3 " id="log">
                   <div class=" bg-white flex items-center h-screen bg-gray-900 bg-opacity-40 ">
                       <div>
                           <div class="flex flex-col">
                          <!-- <h1 class="text-3xl  max-w-xl mt-3  text-black ml-8" id="paragraph">Hello readers!</h1>
                           <h1 class=" text-2xl  max-w-xl mt-3  text-black ml-8 " id="paragraph">Browse our collection today..</h1>
   
                           <p class="max-w-xl mt-3 text-lg text-black ml-8 font-[font-sans] " id="paragraph">"A reader lives a thousand lives before he dies. The man who never reads lives only one." - George R.R. Martin</p>-->
                           <img src="img/form.jpg" class="w-full h-screen object-cover  ml-0 pl-0"></div>
   
                           
                   
                       </div>
                   </div>
    </div>
   
   
   
   
       <div class="container mx-auto  lg:w-3/6 ml-5 ">
   
           <div class="max-w-md mx-auto my-10  ">
           <div class="flex ml-auto mr-auto  justify-center ">
           <img src="img/paperback-logo1.png" class=" -mt-14 h-28 w-4/6 lg:mr-10 lg:ml-10 "></div>
   
   </div>
               <div class="text-center lg:mr-10 lg:ml-10 ">
    
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200 -mt-10">Sign up</h1>
                <p class="text-gray-500 dark:text-gray-400">Sign up to create an account</p>
            </div>
            <div class="m-7">

       
             <form method="POST" action="{{ route('registerUser') }} " class="rounded-md space-y-6  lg:mr-10 lg:ml-10">
             <x-validation-errors class="mb-4" />
            @csrf


            
            <div class="mb-6">
                <x-label for="name" value="{{ __('Name') }}" class="block mb-2 text-sm text-gray-600 dark:text-gray-400" />
                <div class="mt-2">
                <x-input id="name" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            </div>

        




            <div class="mb-6" >
                <x-label for="email" value="{{ __('Email') }}" class="text-sm text-gray-600 dark:text-gray-400"/>
                <div class="mt-2">
                <x-input id="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"   type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            </div>

            <div class="mb-6" >
                <x-label for="password" value="{{ __('Password') }}" class="text-sm text-gray-600 dark:text-gray-400"/>
                <div class="mt-2">
                <x-input id="password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="password" name="password" required autocomplete="new-password" />
            </div>  </div>

         <!-- <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm text-gray-600 dark:text-gray-400"/>     
                <div class="mt-2">
                <x-input id="password_confirmation" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-purple-100 focus:border-purple-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>  </div>-->

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

         
            <div class="flex items-center justify-center mt-4 ">

                <x-button class="w-full px-3 py-4 text-white bg-purple-500 rounded-md focus:bg-purple-600 focus:outline-none justify-center">
                    {{ __('Register') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-4 ">
                <a class="font-semibold leading-6 text-purple-600 hover:text-purple-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

            </div>






        </form>
      </x-authentication-card>

       