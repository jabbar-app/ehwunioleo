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
            <td><span><a href="/capacity/edit?id={{ $w->id }}" class="btn btn-sm btn-primary">Edit</a></span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>