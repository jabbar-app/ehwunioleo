<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Info 3P</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
            <!-- <li class="breadcrumb-item">Data Table</li> -->
            <li class="breadcrumb-item active">Info 3P</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card" style="height: 500px;">
          <div class="card-header pb-0">
            <h4 class="mb-3">Data 3P Terdaftar</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordernone">
                <thead>
                  <tr>
                    <th style="width: 300px;">Nama Pengelola</th>
                    <th>Jenis Limbah</th>
                    <th>Alamat</th>
                    <th style="width: 160px;">Jadwal Kontrak</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($providers as $p)
                  <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->waste }}</td>
                    <td>{{ $p->address }}</td>
                    <td>{{ $p->contract }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- <p>Deskripsi Informasi</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>