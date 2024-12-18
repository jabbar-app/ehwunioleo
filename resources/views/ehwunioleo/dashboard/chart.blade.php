<div class="row">
  <div class="col-sm-12 col-xl-12 box-col-6">
    <div class="card">
      <div class="card-body">
        <div class="col-sm-12 col-xl-6">
          <div class="row mb-5">
            <h3>Amout of Waste</h3>
            <p class="mt-2">Filter by Date:</p>
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
        <div class="row">
        <div class="col-xl-6 col-sm-12 my-2">
        <p style="margin-bottom: 10px; font-size: 22px;">Based on Waste Type</p>
        <canvas id="chartWaste"></canvas>
        </div>
        <div class="col-xl-6 col-sm-12 my-2">
        <p style="margin-bottom: 10px; font-size: 22px;">Based on Waste Source</p>
        <canvas id="chartSource"></canvas>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const reports = JSON.parse('{!! json_encode($reports) !!}');
  let chart, chart2;

  function filterByDate() {
    const startDate = document.getElementById('startDate').value ? new Date(document.getElementById('startDate').value) : new Date(reports[0].date);
    const endDate = document.getElementById('endDate').value ? new Date(document.getElementById('endDate').value) : new Date(reports[reports.length - 1].date);

    const filteredReports = reports.filter(report => {
      const reportDate = new Date(report.date);
      return reportDate >= startDate && reportDate <= endDate;
    });

    const groupedByWasteName = {};
    const groupedBySource = {};

    filteredReports.forEach(report => {
      groupedByWasteName[report.waste_name] = (groupedByWasteName[report.waste_name] || 0) + parseFloat(report.cost);
      groupedBySource[report.source] = (groupedBySource[report.source] || 0) + parseFloat(report.cost);
    });

    drawChart(Object.keys(groupedByWasteName), Object.values(groupedByWasteName), Object.keys(groupedBySource), Object.values(groupedBySource));
  }

  function drawChart(wasteNames, wasteCosts, sources, sourceCosts) {
    if (chart) chart.destroy();
    chart = new Chart(document.getElementById('chartWaste').getContext('2d'), {
      type: 'bar',
      data: {
        labels: wasteNames,
        datasets: [{
          label: 'Amount',
          data: wasteCosts,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
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

    if (chart2) chart2.destroy();
    chart2 = new Chart(document.getElementById('chartSource').getContext('2d'), {
      type: 'bar',
      data: {
        labels: sources,
        datasets: [{
          label: 'Amount',
          data: sourceCosts,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
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
  }

  filterByDate();
</script>