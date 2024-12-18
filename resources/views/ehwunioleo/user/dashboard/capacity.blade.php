<div class="col-12">
  <div class="card">
    <div class="card-header pb-0">
      <h4 class="font-primary f-w-400">Kapasitas TPS LB3</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th><b>Jenis Limbah</b></th>
              <th><b>Kode Limbah</b></th>
              <th><b>Packaging</b></th>
              <th class="text-center"><b>Kapasitas</b></th>
              <th class="text-center"><b>Terpakai</b></th>
              <th class="text-center"><b>Tersedia</b></th>
              <!-- <th style="text-align: center;">Tindakan</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach($wastes as $w)
            <tr>
              <td>{{ $w->waste_name }}</td>
              <td>{{ $w->waste_code }}</td>
              <td>{{ $w->packaging }}</td>
              <td class="text-center">{{ $w->capacity }}</td>
              <td class="text-center">{{ $w->used }}</td>
              <td class="text-center">{{ $w->capacity - $w->used }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>