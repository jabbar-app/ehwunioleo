<div class="row mb-4">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="text-nowrap text-primary fw-light mt-4 mb-2">
        <span class="text-muted">Data / </span>
        Grafik Limbah
      </h3>
      <div class="me-3">
        <p class="text-nowrap mb-0 mt-2">Filter Tanggal:</p>
        <div class="d-flex align-items-center gap-2">
          <div class="col-xl-4 col-sm-6 my-1">
            <input type="date" id="startDate" class="form-control">
          </div>
          <div class="col-xl-4 col-sm-6 my-1">
            <input type="date" id="endDate" class="form-control">
          </div>
          <div class="col-xl-4 col-sm-12 my-1">
            <button onclick="filterByDate()" class="form-control btn-info text-center">Filter</button>
          </div>
        </div>
      </div>
    </div>

    <hr class="my-2">
  </div>

  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Berdasarkan Jenis Limbah</h4>
      </div>
      <div class="card-body">
        <canvas id="chartWaste" class="w-100" style="height: 400px;"></canvas>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Berdasarkan Sumber Limbah</h4>
      </div>
      <div class="card-body">
        <canvas id="chartSource" class="w-100" style="height: 400px;"></canvas>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script>
    const reports = JSON.parse('{!! json_encode($reports) !!}');
    let chart, chart2;

    function filterByDate() {
      const startDate = document.getElementById('startDate').value ? new Date(document.getElementById('startDate')
        .value) : new Date(reports[0].date);
      const endDate = document.getElementById('endDate').value ? new Date(document.getElementById('endDate').value) :
        new Date(reports[reports.length - 1].date);

      const filteredReports = reports.filter(report => {
        const reportDate = new Date(report.date);
        return reportDate >= startDate && reportDate <= endDate;
      });

      const groupedByWasteName = {};
      const groupedBySource = {};

      filteredReports.forEach(report => {
        groupedByWasteName[report.waste_name] = (groupedByWasteName[report.waste_name] || 0) + parseFloat(report
          .cost);
        groupedBySource[report.source] = (groupedBySource[report.source] || 0) + parseFloat(report.cost);
      });

      drawChart(Object.keys(groupedByWasteName), Object.values(groupedByWasteName), Object.keys(groupedBySource), Object
        .values(groupedBySource));
    }

    function drawChart(wasteNames, wasteCosts, sources, sourceCosts) {
      if (chart) chart.destroy();
      chart = new Chart(document.getElementById('chartWaste').getContext('2d'), {
        type: 'bar', // Ubah menjadi bar
        data: {
          labels: wasteNames,
          datasets: [{
            label: 'Jumlah',
            data: wasteCosts,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw;
                }
              }
            },
            legend: {
              display: true,
              position: 'top',
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Jumlah'
              }
            },
            x: {
              title: {
                display: true,
                text: 'Jenis Limbah'
              }
            }
          }
        }
      });

      if (chart2) chart2.destroy();
      chart2 = new Chart(document.getElementById('chartSource').getContext('2d'), {
        type: 'bar', // Ubah menjadi bar
        data: {
          labels: sources,
          datasets: [{
            label: 'Jumlah',
            data: sourceCosts,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw;
                }
              }
            },
            legend: {
              display: true,
              position: 'top',
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Jumlah'
              }
            },
            x: {
              title: {
                display: true,
                text: 'Sumber Limbah'
              }
            }
          }
        }
      });
    }

    filterByDate();
  </script>
@endpush
