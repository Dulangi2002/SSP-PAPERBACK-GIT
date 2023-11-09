<div class=" lg:w-2/3 md:w-full sm:w-full border-2 p-6 rounded-lg bg-white ">

<div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table  class="min-w-full  border-2">
          <thead class="bg-[#EC8F5E] border-2 rounded-lg ">
            <tr>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left ">Product</th>
              <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Product views</th>
            </tr>
          </thead>
          <tbody>

            @foreach($products as $product)
            <tr id="hits" class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->hits }}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    </div>
    </div>

<canvas id="myChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"> </script>

<script>
  const ctx = document.getElementById('myChart');
  const tdLabels = document.querySelectorAll('#hits td');
  const labels = [];
  for (let i = 0; i < tdLabels.length; i++) {
    labels.push(tdLabels[i].textContent);
  }

  const dataValues = document.querySelectorAll('#hits td:nth-child(2)');
  const data = [];
  for (let i = 0; i < dataValues.length; i++) {
    data.push(dataValues[i].textContent);
  }

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: '# of views received by product',
        data: data,
        borderWidth: 1,
        backgroundColor: 'rgb(7, 25, 82)',
        borderColor: 'rgb(7, 25, 82)',
       
       
        
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1,
            color: 'purple',
            font: {
              family: 'Comic Sans MS'
            }
            
          },
        
          

        }


      }
    },



  });
</script>