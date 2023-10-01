<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight font-merriweather ml-10">
            {{ __('Category List') }}
        </h2>

    </x-slot>

    @livewire('categories')

    <div x-data="{ open: false }">

      @livewire('create-category' )
   

    {{--<a href="{{ route ( 'createcategory') }} "> Create category</a>--}}




</x-guest-layout>
<script>
    window.addEventListener('refreshPage', event => {
        
      location.reload();
    })


</script>