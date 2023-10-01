<!DOCTYPE html>
    <html>
        <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Edit customer information</title>

        </head>
        <body>

        @if(Session::has('success'))
        <div>
        {{Session::get('success')}} 
        </div>
        @endif    


        <h1 class="text-xl font-semibold mt-4 mb-4 text-center">Edit user information</h1>

        <form method="POST" action="{{url('update-customer')}}">
        @csrf
        <input type="hidden" name="id" value="{{$customerdata->id}}">   
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        First Name
        </label>
        <input class=" w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3   "  type="text" name="firstname" value="{{$customerdata->firstname}}">
        @error('firstname')
        <div>
        {{$message}}
        @enderror
        </div>
        </div>


        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        Last Name
        </label>
        <input class=" w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3   "  type="text" name="lastname" value="{{$customerdata->lastname}}">
        @error('lastname')
        <div>
        {{$message}}
        </div>
        @enderror
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Email address
        </label>
        <input class=" w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3"  type="email" name="email"value="{{$customerdata->email}}" >
        @error('email')
        <div>
        {{$message}}
        </div>
        @enderror
        </div>

        <button type="submit">Submit</button><br>
        <a href="{{url('customer-list')}}">back</a>
 


