<div
    wire:ignore
    class="mt-4"
    x-data="{
    selectedYear: @entangle('selectedYear'),
    lastYearOrders: @entangle('lastYearOrders'),
    thisYearOrders: @entangle('thisYearOrders'),
    init(){
        const ctx = this.$refs.canvas.getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: `${this.selectedYear - 1} Orders`,
                    data:this.lastYearOrders,
                    backgroundColor: [
                        'lightgray'
                    ],
                    borderColor: [
                        'gray'
                    ],
                    borderWidth: 1
                },
                    {
                        label: `${this.selectedYear} Orders`,
                        data:this.thisYearOrders,
                        backgroundColor: [
                            'lightgreen',
                        ],
                        borderColor: [
                            'green',
                        ],
                        borderWidth: 1
                    }]

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }

        });
          Livewire.on('updateTheChart', () => {
          console.log('update the chart');
          myChart.data.datasets[0].data = this.lastYearOrders;
          myChart.data.datasets[1].data = this.thisYearOrders;
          myChart.data.datasets[1].label = `${this.selectedYear} Orders`;
          myChart.data.datasets[0].label = `${this.selectedYear - 1 } Orders`;

          myChart.update();
          })
    }
    }"
>
    <span>Select year:</span>
    <select name="selectedYear" id="selectedYear" class="border rounded-md" wire:model="selectedYear" wire:change="updateOrdersCount">
        @foreach($availableYears as $year)
        <option value="{{$year}}">{{$year}}</option>
        @endforeach
    </select>
    <div>
        Selected: <span x-text="selectedYear"></span>
    </div>
    <div class="mt-4">
        <div class=""><span x-text="selectedYear -1 "></span> Orders:
            <span x-text="lastYearOrders.reduce((a,b)=> a + b)"></span></div>

        <div class=""><span x-text="selectedYear"></span> Orders:
            <span x-text="thisYearOrders.reduce((a,b)=> a + b)"></span> </div>
    </div>
    <canvas id="myChart" x-ref="canvas" width="400" height="150"></canvas>
</div>
