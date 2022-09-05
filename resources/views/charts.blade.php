<x-layout>
    <div class="bg-withe rounded-md border my-8 px-6 py-6">
        <div>
            <h2 class="text-2xl font-semibold">Charts</h2>
            <div class="mt-4">
                <div class="">Last Year: {{array_sum($lastYearOrders)}}</div>
                <div class="">This Year: {{array_sum($thisYearOrders)}}</div>
                <canvas id="myChart" width="400" height="150"></canvas>

            </div>

        </div>
    </div>
</x-layout>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Last Year Orders',
                    data:{{\Illuminate\Support\Js::from($thisYearOrders)}},
                    backgroundColor: [
                        'lightgray'
                    ],
                    borderColor: [
                        'gray'
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'This Year Orders',
                        data: {{\Illuminate\Support\Js::from($lastYearOrders)}},
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
    </script>
