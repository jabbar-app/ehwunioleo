@extends('ehwunioleo.layout.main')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
@endsection

@section('body')
<div class="page-body">
  <div class="container-fluid mobile-hide">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Dashboard</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">EHWM</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid dashboard-2">
    <div class="row mb-100">
      <div class="col-sm-12">
        @include('ehwunioleo.dashboard.greeting')
        <div id="tasks"></div>
        @include('ehwunioleo.schedule.process')
        @include('ehwunioleo.dashboard.chart')
        @include('ehwunioleo.schedule.request')
        @include('ehwunioleo.dashboard.capacity')
        @include('ehwunioleo.dashboard.user')
        @include('ehwunioleo.dashboard.waste')
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
@endsection