@extends('ehwunioleo.layout')

@push('styles')
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

  @include('ehwunioleo.schedules.process')
  @include('ehwunioleo.schedules.request')
@endsection

@push('scripts')
@endpush
