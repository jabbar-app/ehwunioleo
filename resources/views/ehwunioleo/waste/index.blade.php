@extends('ehwunioleo.layout.main')

@section('body')
<div class="page-body">
  <div class="container-fluid mobile-hide">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Data Limbah B3</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Limbah B3</li>
            <li class="breadcrumb-item active">Semua Data</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid dashboard-2">
    <div class="row mb-100">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <h4 class="font-primary f-w-400">Data Limbah Terdaftar</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="white-space: nowrap;">
                <thead>
                  <tr class="f-w-400">
                    <th>Nama Limbah</th>
                    <th class="mobile-hide">Kode Limbah</th>
                    <th class="mobile-hide">Packaging</th>
                    <th class="mobile-hide">Kapasitas</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($wastes as $w)
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img class="img-fluid circle" src="{{ asset('assets/images/uploads/waste.png') }}" width="32px" alt="">
                        <div class="flex-grow-1">&nbsp;{{ $w->waste_name }}</div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td class="mobile-hide">{{ $w->waste_code }}</td>
                    <td class="mobile-hide">{{ $w->packaging }}</td>
                    <td class="mobile-hide">{{ $w->capacity }}</td>
                    <td><span><a href="/capacity/edit?id={{ $w->id }}" class="btn btn-sm btn-primary">Edit</a></span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
@endsection