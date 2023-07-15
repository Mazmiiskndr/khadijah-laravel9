<div class="col-xl-12 col-md-12 box-col-12 mb-3">
    <div class="card h-100">
        <div class="card-header">
            <h5>Diagram Penjualan</h5>
        </div>
        <div class="bar-chart-widget">
            <div class="bottom-content card-body">
                <div class="row">
                    <div class="col-12">
                        <canvas id="count-sales" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let salesData = @json($totalIncome);

    // Generate labels for each day of the month
    let date = new Date();
    let numberOfDays = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    let labels = Array.from({length: numberOfDays}, (_, i) => i + 1);

    let lineData = {
        labels: labels,
        datasets: [{
            label: 'Pendapatan Bulan Ini',
            backgroundColor: 'rgba(75, 192, 192, 0.5)', // Warna background
            borderColor: 'rgba(75, 192, 192, 1)', // Warna border
            borderWidth: 1,
            data: salesData
        }]
    };

    let lineConfig = {
        type: 'line',
        data: lineData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += 'Rp. ' + context.parsed.y.toLocaleString('id-ID');
                            return label;
                        }
                    }
                }
            }
        }
    };
</script>
@endpush
