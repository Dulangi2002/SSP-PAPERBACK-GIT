<!DOCTYPE html>
<html>

<head>
  @livewireStyles
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ mix('../resources/css/app.css') }}" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body x-data="{openMenu : false}" id="pastel1">




@livewire('navigation-bar')
  <div id="test" class="flex flex-row w-full ">
    <img src="img/5.jpg" class="" id="image">
  </div>

  @livewire('search-sort' )

  

  <!-- component -->
  <!--Foooter -->


  @livewireScripts
</body>

<script>
  function getProducts() {
    return {
      search: '',
      products: [],

      get filteredProducts() {
        if (this.search === '') {
          return this.products;
        }

        return this.products.filter(product => {
          return product.name.toLowerCase().includes(this.search.toLowerCase());
        });
      },
    }

  }
</script>

</html>