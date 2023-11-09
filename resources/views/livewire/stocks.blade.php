<div>
    <h2 class="font-bold font-[dm sans] text-xl ">Stock Levels</h2>
    <table id="table" hidden>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Stock Level</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['stock'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<canvas id="stocks-chart" class=""></canvas>
<script>
   const barchartlabs = [];
const stockschrt = document.getElementById('stocks-chart');
const barchartlabels = document.querySelectorAll('#table td:nth-child(1)');
for (let i = 0; i < barchartlabels.length; i++) {
    barchartlabs.push(barchartlabels[i].firstChild.textContent);
}
const barchartdata = [];
const barchartdata1 = document.querySelectorAll('#table td:nth-child(2)');
for (let i = 0; i < barchartdata1.length; i++) {
    // Parse the text content to an integer or float
    barchartdata.push(parseFloat(barchartdata1[i].textContent));
}


    new Chart(stockschrt, {
            type: 'bar',
            data: {
                labels: barchartlabs,
                datasets: [{
                    label: "Stock Levels",
                    data: barchartdata,
                    backgroundColor: colorIndex,


                    hoverOffset: 5
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }

        }

    )
</script>