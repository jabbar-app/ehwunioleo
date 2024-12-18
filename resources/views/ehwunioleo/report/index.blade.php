@extends('ehwunioleo.layout.main')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('body')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Data Transactions Report</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Reports</li>
            <li class="breadcrumb-item active">All Data</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> {{ session('success') }}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        <div class="card">
          <div class="card-header pb-0">
            <h4>Reports</h4>
          </div>
          <div class="card-body">
            <div class="dt-ext table-responsive">
              <table class="display" id="export-button" style="white-space: nowrap;">
                <thead>
                  <tr>
                    <th>Tgl. Masuk</th>
                    <th>Tgl. Keluar</th>
                    <th>Petugas</th>
                    <th>Nama Limbah</th>
                    <th>Source</th>
                    <th>Jumlah</th>
                    <th>Berat (Kg)</th>
                    <th>Packaging</th>
                    <th>Tujuan</th>
                    <th>Catatan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($reports as $report)
                  <tr>
                    <td>{{ $report->date_in }}</td>
                    <td>{{ $report->date }}</td>
                    <!-- <td>{{ $report->date_out }}</td> -->
                    <td>{{ $report->user_name }}</td>
                    <td>{{ $report->waste_name }}</td>
                    <td>{{ $report->source }}</td>
                    <td>{{ $report->amount }}</td>
                    <td>{{ $report->weight }}</td>
                    <td>{{ $report->packaging }}</td>
                    <td>{{ $report->dispose_to }}</td>
                    <td>{{ $report->note }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Tanggal</th>
                    <th>Petugas</th>
                    <th>Nama Limbah</th>
                    <th>Source</th>
                    <th>Jumlah</th>
                    <th>Berat (Kg)</th>
                    <th>Packaging</th>
                    <th>Tujuan</th>
                    <th>Catatan</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
@include('ehwunioleo.layout.tablejs')
@endsection