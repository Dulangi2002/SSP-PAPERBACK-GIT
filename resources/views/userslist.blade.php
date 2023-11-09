@extends('layouts.adminheader')

<header>

  @livewire('admin-desktop-menu')

</header>

<body>
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

  <h1 class="text-xl font-semibold mt-4 mb-4 text-center">Address Book</h1>



  <div class="h-5" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
    @if(Session()->has('success'))
    <div class="bg-green-300 px-2 py-3 rounded-md text-center z-20 ">
      <h1 class="text-md mb-4 text-black">
        {{Session()->get('success')}}
      </h1>
    </div>

    @endif
  </div>



  <div class="flex flex-row ml-4">
    <button class="mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out"><a href="{{URL('AddUser')}}"> Add </a></button>
    <button class="mt-4 font-[dm-sans] ml-4 bg-indigo-300 px-10 py-2 rounded-3xl hover:bg-indigo-600 hover:text-white transition delay-150 ease-in-out"><a href="{{URL('back')}}"> Back </a></button>
  </div>




  <div class="flex flex-col">
    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="bg-gray-200 border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ID</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">email</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Contact Number</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">House Number</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Street Adress</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">City</th>

                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Edit</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">delete</th>




              </tr>
            </thead>
            <tbody>
              @php
              $i =1;
              @endphp
              @foreach ($data as $user)
              <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">


                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$i++}}</td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user ->name}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user ->email}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  @if ($user->customer_details)
                  {{$user->customer_details->ContactNumber}}
                  @else
                  N/A
                  @endif
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  @if ($user->customer_details)
                  {{$user->customer_details->streetAddress}}
                  @else
                  N/A
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  @if ($user->customer_details)
                  {{$user->customer_details->houseNumber}}
                  @else
                  N/A
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  @if ($user->customer_details)
                  {{$user->customer_details->city}}
                  @else
                  N/A
                  @endif
                </td>
                <td class="p-3 border-2"><a href="{{ route('edituser', ['id'=> $user->id])}}"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg></a>
                </td>

                <td class="p-3 border-2"><a href="{{ route('deleteuser', ['id'=> $user->id])}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg></a> </td>

              </tr>


              @endforeach






            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>