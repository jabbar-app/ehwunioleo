@extends('ehwunioleo.layout.main')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
<style>
  .setting-header {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    justify-content: space-between;
  }
</style>
@endsection

@section('body')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Pengaturan</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Pengaturan</li>
            <li class="breadcrumb-item active">Semua Pengaturan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> {{ session('success') }}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Dihapus!</strong> {{ session('danger') }}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
          <div class="card-header pb-0">
            <h4>Data Cost Limbah B3</h4>
          </div>
          <div class="card-body">
            @if($reports=="[]")
            <div class="alert alert-info dark" role="alert">
              <p>Belum ada pengangkutan yang selesai & tercatat di reports!</p>
            </div>
            @else
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Nama Limbah</th>
                    <th>Source</th>
                    <th>Cost</th>
                    <th class="text-center">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($reports as $cost)
                  <tr>
                    <td>{{ $cost->date }}</td>
                    <td>{{ $cost->waste_name }}</td>
                    <td>{{ $cost->source }}</td>
                    <td>{{ $cost->cost }}</td>
                    <td>
                      <ul class="action">
                        <li class="btn btn-info" style="margin-left: auto; margin-right: auto;"> <a href="/cost/edit?id={{ $cost->id }}" style="color: white;"> Edit Cost </a></li>
                      </ul>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @if(!empty($_GET['message']))
        <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data kapasitas telah berhasil diperbaharui.
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
          <div class="card-header pb-0">
            <div class="setting-header">
              <h4 class="mb-0">Data Limbah</h4>
              <a href="{{ route('waste.add') }}" class="btn btn-primary"><i class="fa fa-file me-2"></i> tambah</a>
            </div>
          </div>
          <div class="card-body">
            <div class="dt-ext table-responsive">
              <table class="display" id="export-button">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Limbah</th>
                    <th>Kode</th>
                    <th>Packaging</th>
                    <th>Kapasitas</th>
                    <th>Terisi</th>
                    <th>Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $n = 1; ?>
                  @foreach($wastes as $waste)
                  <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $waste->waste_name }}</td>
                    <td>{{ $waste->waste_code }}</td>
                    <td>{{ $waste->packaging }}</td>
                    <td>{{ $waste->capacity }}</td>
                    <td>{{ $waste->used }}</td>
                    <td>
                      <form method="POST" action="{{ route('waste.delete', $waste->id) }}">
                        @csrf
                        <a href="/capacity/edit?id={{ $waste->id }}" class="btn btn-outline-info" type="button">Edit</a>
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o" style="font-size: 20px;"></i></button>
                      </form>
                    </td>
                  </tr>
                  <?php $n++; ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-12 col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="setting-header">
              <h4 class="mb-0">Data 3<sup>rd</sup> Party</h4>
              <a href="{{ route('provider.add') }}" class="btn btn-primary"><i class="fa fa-file me-2"></i> tambah</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama 3P</th>
                    <th>Jenis Limbah</th>
                    <th>Alamat</th>
                    <th style="text-align: right;">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($providers as $provider)
                  <tr>
                    <td>{{ $provider->name }}</td>
                    <td>{{ $provider->waste }}</td>
                    <td>{{ $provider->address }}</td>
                    <td>
                      <ul class="action">
                        <li style="margin-left: auto; margin-right: 0;">
                          <form method="POST" action="{{ route('provider.delete', $provider->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                              <a href="{{ route('provider.update', $provider->id) }}" class="btn btn-outline-info" type="button">Edit</a>
                              <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o" style="font-size: 20px;"></i></button>
                            </div>
                          </form>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  <tr style="height: 72px">
                    <td colspan="3" style="margin-bottom: 10px !important;">Kontrak: <span class="">{{ $provider->contract }}</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6 col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="setting-header">
              <h4>Data Sumber</h4>
              <a href="{{ route('source.add') }}" class="btn btn-primary"><i class="fa fa-file me-2"></i> tambah</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Sumber</th>
                    <th style="text-align: right;">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sources as $source)
                  <tr>
                    <td>{{ $source->name }}</td>
                    <td>
                      <ul class="action">
                        <li style="margin-left: auto; margin-right: 0;">
                          <form method="POST" action="{{ route('source.delete', $source->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                              <a href="{{ route('source.update', $source->id) }}" class="btn btn-outline-info" type="button">Edit</a>
                              <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o" style="font-size: 20px;"></i></button>
                            </div>
                          </form>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="setting-header">
              <h4>Data Department</h4>
              <a href="{{ route('department.add') }}" class="btn btn-primary"><i class="fa fa-file me-2"></i> tambah</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Department</th>
                    <th style="text-align: right;">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($departments as $department)
                  <tr>
                    <td>{{ $department->name }}</td>
                    <td>
                      <ul class="action">
                        <li style="margin-left: auto; margin-right: 0;">
                          <form method="POST" action="{{ route('department.delete', $department->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                              <a href="{{ route('department.update', $department->id) }}" class="btn btn-outline-info" type="button">Edit</a>
                              <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o" style="font-size: 20px;"></i></button>
                            </div>
                          </form>
                        </li>
                      </ul>
                    </td>
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
  <!-- Container-fluid Ends-->
</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
@include('ehwunioleo.layout.tablejs')
@endsection