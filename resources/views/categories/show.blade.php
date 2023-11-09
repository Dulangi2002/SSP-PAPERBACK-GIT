@extends('layouts.adminheader')


<header>

  @livewire('admin-desktop-menu')

</header>


<body>
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">


     



      @livewire('categories')





      <script>
        window.addEventListener('refreshPage', event => {

          location.reload();
        })
      </script>
    </div>
  </div>

</body>

</html>