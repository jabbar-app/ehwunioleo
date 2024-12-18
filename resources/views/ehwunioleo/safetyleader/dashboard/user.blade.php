<div class="card">
  <div class="card-header">
    <h4 class="font-primary f-w-400">Data User Terbaru</h4>
  </div>
  <div class="card-body pt-0">
    <div class="table-responsive">
      <table class="table table-bordernone" style="padding: 0 !important;">
        <thead>
          <tr>
            <th class="f-26">Nama</th>
            <th class="mobile-hide">Nomor Pegawai</th>
            <th class="mobile-hide">Role</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($users->take(10) as $u)
          <tr class="f-w-400">
            <td>{{ $u->name }}</td>
            <td class="mobile-hide">{{ $u->nik }}</td>
            <td class="mobile-hide">{{ $u->role }}</td>
            <td><span><a href="/users/edit/{{ $u->id }}" class="btn btn-sm btn-primary">Edit</a></span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>