@extends('ehwunioleo.layout')

@push('styles')
  <style>
    .scrollable-list {
      max-height: 400px;
      overflow-y: auto;
    }
  </style>
@endpush

@section('content')
  <div class="row my-4">
    <!-- Website Analytics -->
    <div class="col-lg-6 mb-4">
      <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
        id="swiper-with-pagination-cards">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="row">
              <div class="col-12">
                <h5 class="text-white mb-0 mt-2">Status Kelola</h5>
                <small>Rute: TPS LB3 menuju 3P.</small>
              </div>
              <div class="row">
                <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                  <h6 class="text-white mt-0 mt-md-3 mb-3">Ringkasan</h6>
                  <div class="row">
                    <div class="col-6">
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-4 align-items-center">
                          <p class="mb-0 fw-medium me-2 website-analytics-text-bg">
                            {{ $processes->where('status', 'Approved')->count() }}</p>
                          <p class="mb-0">On TPS LB3</p>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                          <p class="mb-0 fw-medium me-2 website-analytics-text-bg">
                            {{ $processes->where('status', 'On Scheduled')->count() }}</p>
                          <p class="mb-0">On Scheduled</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                  <img src="../../assets/img/illustrations/card-website-analytics-1.png" alt="Website Analytics"
                    width="170" class="card-website-analytics-img" />
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="row">
              <div class="col-12">
                <h5 class="text-white mb-0 mt-2">Status Request</h5>
                <small>Rute: Plant menuju TPS LB3.</small>
              </div>
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                <h6 class="text-white mt-0 mt-md-3 mb-3">Ringkasan</h6>
                <div class="row">
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">
                          {{ $requests->where('status', 'On Request')->count() }}</p>
                        <p class="mb-0">On Request</p>
                      </li>
                      <li class="d-flex align-items-center mb-2">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">
                          {{ $requests->where('status', 'Resubmit')->count() }}</p>
                        <p class="mb-0">Resubmit</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                <img src="../../assets/img/illustrations/card-website-analytics-2.png" alt="Website Analytics"
                  width="170" class="card-website-analytics-img" />
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <!--/ Website Analytics -->

    <!-- Sales Overview -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-header">
          @php
            $todayRequestsCount = $requests->where('date', \Carbon\Carbon::today())->count();
            $totalRequestsCount = $requests->count();
            $percentageIncrease = $totalRequestsCount > 0 ? ($todayRequestsCount / $totalRequestsCount) * 100 : 0;
          @endphp

          <div class="d-flex justify-content-between">
            <small class="d-block mb-1 text-muted">Request hari ini</small>
            <p class="card-text text-success">{{ number_format($percentageIncrease, 1) }}%</p>
          </div>
          <h4 class="card-title mb-1">{{ $todayRequestsCount }}</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <div class="d-flex gap-2 align-items-center mb-2">
                <span class="badge bg-label-info p-1 rounded"><i class="ti ti-recycle ti-xs"></i></span>
                <p class="mb-0">Request</p>
              </div>
              <h5 class="mb-0 pt-1 text-nowrap">{{ number_format(($requests->count() / $schedules->count()) * 100, 1) }}%
              </h5>
              <small class="text-muted">{{ number_format($requests->count()) }}</small>
            </div>
            <div class="col-4">
              <div class="divider divider-vertical">
                <div class="divider-text">
                  <span class="badge-divider-bg bg-label-secondary">VS</span>
                </div>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                <p class="mb-0">Process</p>
                <span class="badge bg-label-success p-1 rounded"><i class="ti ti-progress-check ti-xs"></i></span>
              </div>
              <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">
                {{ number_format(($processes->count() / $schedules->count()) * 100, 1) }}%</h5>
              <small class="text-muted">{{ number_format($processes->count()) }}</small>
            </div>
          </div>
          <div class="d-flex align-items-center mt-4">
            <div class="progress w-100" style="height: 8px">
              <div class="progress-bar bg-info"
                style="width: {{ number_format(($requests->count() / $schedules->count()) * 100, 1) }}%"
                role="progressbar"
                aria-valuenow="{{ number_format(($requests->count() / $schedules->count()) * 100, 1) }}"
                aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar bg-success" role="progressbar"
                style="width: {{ number_format(($processes->count() / $schedules->count()) * 100, 1) }}%"
                aria-valuenow="{{ number_format(($processes->count() / $schedules->count()) * 100, 1) }}"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Sales Overview -->

    <!-- Revenue Generated -->
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card h-100">
        <div class="card-body pb-0">
          <div class="card-icon mt-1 float-end">
            <span class="badge bg-label-info rounded-pill p-2">
              <i class="ti ti-recycle ti-sm"></i>
            </span>
          </div>
          <h1 class="card-title mb-0">{{ $schedules->count() }}</h1>
          <small>Request Aktif</small>
        </div>
        <div id="revenueGenerated"></div>
      </div>
    </div>
    <!--/ Revenue Generated -->
  </div>

  {{-- <div class="row my-4">
    <!-- Earning Reports -->
    <div class="col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
          <div class="card-title mb-0">
            <h5 class="mb-0">Earning Reports</h5>
            <small class="text-muted">Weekly Earnings Overview</small>
          </div>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="ti ti-dots-vertical ti-sm text-muted"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
              <a class="dropdown-item" href="javascript:void(0);">View More</a>
              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
          </div>
          <!-- </div> -->
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-4 d-flex flex-column align-self-end">
              <div class="d-flex gap-2 align-items-center mb-2 pb-1 flex-wrap">
                <h1 class="mb-0">$468</h1>
                <div class="badge rounded bg-label-success">+4.2%</div>
              </div>
              <small>You informed of this week compared to last week</small>
            </div>
            <div class="col-12 col-md-8">
              <div id="weeklyEarningReports"></div>
            </div>
          </div>
          <div class="border rounded p-3 mt-4">
            <div class="row gap-4 gap-sm-0">
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-primary p-1">
                    <i class="ti ti-currency-dollar ti-sm"></i>
                  </div>
                  <h6 class="mb-0">Earnings</h6>
                </div>
                <h4 class="my-2 pt-1">$545.69</h4>
                <div class="progress w-75" style="height: 4px">
                  <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-info p-1"><i class="ti ti-chart-pie-2 ti-sm"></i>
                  </div>
                  <h6 class="mb-0">Profit</h6>
                </div>
                <h4 class="my-2 pt-1">$256.34</h4>
                <div class="progress w-75" style="height: 4px">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="d-flex gap-2 align-items-center">
                  <div class="badge rounded bg-label-danger p-1">
                    <i class="ti ti-brand-paypal ti-sm"></i>
                  </div>
                  <h6 class="mb-0">Expense</h6>
                </div>
                <h4 class="my-2 pt-1">$74.19</h4>
                <div class="progress w-75" style="height: 4px">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Earning Reports -->

    <!-- Support Tracker -->
    <div class="col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between pb-0">
          <div class="card-title mb-0">
            <h5 class="mb-0">Support Tracker</h5>
            <small class="text-muted">Last 7 Days</small>
          </div>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="supportTrackerMenu" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="ti ti-dots-vertical ti-sm text-muted"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
              <a class="dropdown-item" href="javascript:void(0);">View More</a>
              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
              <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                <h1 class="mb-0">164</h1>
                <p class="mb-0">Total Tickets</p>
              </div>
              <ul class="p-0 m-0">
                <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                  <div class="badge rounded bg-label-primary p-1"><i class="ti ti-ticket ti-sm"></i></div>
                  <div>
                    <h6 class="mb-0 text-nowrap">New Tickets</h6>
                    <small class="text-muted">142</small>
                  </div>
                </li>
                <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                  <div class="badge rounded bg-label-info p-1">
                    <i class="ti ti-circle-check ti-sm"></i>
                  </div>
                  <div>
                    <h6 class="mb-0 text-nowrap">Open Tickets</h6>
                    <small class="text-muted">28</small>
                  </div>
                </li>
                <li class="d-flex gap-3 align-items-center pb-1">
                  <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i></div>
                  <div>
                    <h6 class="mb-0 text-nowrap">Response Time</h6>
                    <small class="text-muted">1 Day</small>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
              <div id="supportTracker"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Support Tracker -->
  </div> --}}

  @include('ehwunioleo.dashboard.chart')
  @include('ehwunioleo.schedules.process')
  @include('ehwunioleo.schedules.request')

  <div class="row my-4">
    <div class="col-12 col-xl-8 mb-4">
      @php
        $totalCapacity = 0;
        $totalUsed = 0;
        foreach ($wastes as $waste) {
            $totalCapacity += $waste->capacity;
            $totalUsed += $waste->used;
        }
        $totalAvailable = $totalCapacity - $totalUsed;
      @endphp
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-0">Kapasitas TPS LB3</h5>
            <small class="text-muted">Total: <strong>{{ number_format($totalCapacity) }}</strong> | Terpakai:
              <strong>{{ number_format($totalUsed) }}</strong></small>
          </div>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="MonthlyCampaign" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="ti ti-dots-vertical ti-sm text-muted"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="MonthlyCampaign">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Detail</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 pt-4">
              <canvas id="capacityChart"></canvas>
            </div>
            <div class="col-6">
              <ul class="p-0 m-0 scrollable-list">
                @foreach ($wastes as $waste)
                  <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between w-100 flex-wrap">
                      <div>
                        <h6 class="mb-0">{{ $waste->waste_name }}</h6>
                        <small><span class="text-muted">Kode: </span>{{ $waste->waste_code }}</small>
                        <br>
                        <small><span class="text-muted">Kapasitas: </span>{{ number_format($waste->capacity) }}</small>
                      </div>
                      <div class="me-3">
                        <p class="mb-0 fw-medium">{{ number_format($waste->capacity - $waste->used) }}<small
                            class="text-muted"> tersisa</small></p>
                        <small
                          class="text-success">{{ number_format((($waste->capacity - $waste->used) / $waste->capacity) * 100, 1) }}%</small>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-0">Daftar Limbah</h5>
            <small class="text-muted">{{ $wastes->count() }} terdaftar</small>
          </div>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="MonthlyCampaign" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="ti ti-dots-vertical ti-sm text-muted"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="MonthlyCampaign">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Download</a>
              <a class="dropdown-item" href="javascript:void(0);">View All</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0 scrollable-list">
            @foreach ($wastes as $waste)
              <li class="mb-4 me-3 pb-1 d-flex justify-content-between align-items-center">
                <a href="#" class="badge bg-label-success rounded p-2 mb-auto"><i class="ti ti-recycle ti-sm"></i></a>
                <div class="d-flex justify-content-between w-100 flex-wrap">
                  <div class="ms-3">
                    <h6 class="mb-0">{{ $waste->waste_name }}</h6>
                    <small class="text-muted">Kode: {{ $waste->waste_code }}</small>
                    <br>
                    <small class="text-muted">Pack: {{ $waste->packaging }}</small>
                  </div>
                  <div class="badge bg-label-info mb-auto">Edit</div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    const ctx = document.getElementById('capacityChart').getContext('2d');
    const capacityChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Terpakai', 'Tersedia'],
        datasets: [{
          label: 'Kapasitas',
          data: [{{ $totalUsed }}, {{ $totalAvailable }}],
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)', // Warna untuk terpakai
            'rgba(75, 192, 192, 0.6)' // Warna untuk tersedia
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ': ' + tooltipItem.raw;
              }
            }
          }
        }
      }
    });
  </script>
@endpush
