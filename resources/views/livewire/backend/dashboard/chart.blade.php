<div class="col-xl-6 col-md-12 box-col-12">
    <div class="card">
        <div class="card-header">
            <h4>Diagram Pengunjung</h4>
        </div>
        <div class="card-body chart-block">
            <canvas id="count-visitors" height="500"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let visitorData = @json($visitors);

    let chromeCount = 0;
    let firefoxCount = 0;
    let safariCount = 0;
    let operaCount = 0;

    for (let i = 0; i < visitorData.length; i++) {
        let userAgent = visitorData[i].user_agent.toLowerCase();
        if (userAgent.includes('chrome')) {
            chromeCount++;
        } else if (userAgent.includes('firefox')) {
            firefoxCount++;
        } else if (userAgent.includes('safari')) {
            safariCount++;
        } else if (userAgent.includes('opera')) {
            operaCount++;
        }
    }

    let barData = {
        labels: ['Chrome', 'Firefox', 'Safari', 'Opera'],
        datasets: [{
            label: 'Jumlah Pengunjung Berdasarkan Browser',
            backgroundColor: [
                'rgba(255, 206, 86, 0.5)', // warna untuk Chrome
                'rgba(54, 162, 235, 0.5)', // warna untuk Firefox
                'rgba(255, 99, 132, 0.5)', // warna untuk Safari
                'rgba(75, 192, 192, 0.5)'  // warna untuk Opera
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)', // warna untuk Chrome
                'rgba(54, 162, 235, 1)', // warna untuk Firefox
                'rgba(255, 99, 132, 1)', // warna untuk Safari
                'rgba(75, 192, 192, 1)'  // warna untuk Opera
            ],
            borderWidth: 1,
            data: [chromeCount, firefoxCount, safariCount, operaCount]
        }]
    };

        let barConfig = {
        type: 'bar',
        data: barData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    let countVisitors = new Chart(document.getElementById('count-visitors'), barConfig);
</script>
@endpush
