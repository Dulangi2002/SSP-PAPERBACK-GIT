<div>
    <table class="min-w-full mb-2">
        <thead class="bg-gray-200 border-b ">
            <tr>
                <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Category</th>
                <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Monthly Sales </th>
            </tr>
        </thead>
        <tbody>

            @foreach($salesPerCategory as $category_name => $sales)
            <tr id="salesPerCategory"  class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $sales }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <canvas id="CategorySalesChart"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"> </script>
    <script>
        const catchrt = document.getElementById('CategorySalesChart');
        const pieLabels = document.querySelectorAll('#salesPerCategory td:nth-child(1)');
        const pieLabs = [];
        for (let i = 0; i < pieLabels.length; i++) {
            pieLabs.push(pieLabels[i].textContent);
        }


        const dataSet = document.querySelectorAll('#salesPerCategory td:nth-child(2)');
        const PieChrtdata = [];
        for (let i = 0; i < dataSet.length; i++) {
            PieChrtdata.push(dataSet[i].textContent);
        }

        const colorIndex = pieLabs.map(() => '#' + (Math.random() * 0xFFFFFF << 0).toString(16));


        new Chart(catchrt, {
                type: 'pie',
                data: {
                    labels: pieLabs,
                    datasets: [{
                        label: "sales per item category",
                        data: PieChrtdata,
                        backgroundColor: colorIndex,

                        hoverOffset: 5
                    }],
                },
                options: {
                    responsive: true,
                },
               

            }
            

            

        )
    </script>
</div>