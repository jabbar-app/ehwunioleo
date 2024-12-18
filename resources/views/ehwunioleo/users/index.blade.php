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
          <h3>Data Users</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">All Users</li>
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
        @elseif(session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data dihapus!</strong> {{ session('danger') }}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
          <div class="card-header pb-0">
            <h4>All Data Users</h4>
          </div>
          <div class="card-body">
            <div class="dt-ext table-responsive">
              <table class="display" id="export-button">
                <thead>
                  <tr>
                    <th style="width: 100px;">Nomor Pegawai</th>
                    <th>Nama Lengkap</th>
                    <th>Role</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $u)
                  <tr>
                    <td>{{ $u->nik }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->role }}</td>
                    <td>{{ $u->title }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                      <ul class="action">
                        <li class="btn btn-info" style="margin-right: 5px"> <a class="text-white" href="/users/edit/{{ $u->id }}">Edit</a></li>
                        <li class="btn btn-danger"><a class="text-white" href="/users/delete/{{ $u->id }}">Hapus</a></li>
                      </ul>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nomor Pegawai</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
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
@include('ehwunioleo.layout.tablejs')
@endsection