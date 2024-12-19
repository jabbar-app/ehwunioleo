<div class="row">
  <div class="col-sm-12">
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
              @php
                $totalCapacity = 0;
                $totalUsed = 0;
              @endphp

              @foreach ($wastes as $waste)
                <tr>
                  <td>{{ $waste->waste_name }}</td>
                  <td>{{ $waste->waste_code }}</td>
                  <td>{{ $waste->packaging }}</td>
                  <td class="text-center">{{ $waste->capacity }}</td>
                  <td class="text-center">{{ $waste->used }}</td>
                  <td class="text-center">{{ $waste->capacity - $waste->used }}</td>
                </tr>
                @php
                  $totalCapacity += $waste->capacity;
                  $totalUsed += $waste->used;
                @endphp
              @endforeach

              @php
                $totalAvailable = $totalCapacity - $totalUsed;
              @endphp

              <div>
                <strong>Total Kapasitas:</strong> {{ $totalCapacity }} <br>
                <strong>Total Kapasitas Terpakai:</strong> {{ $totalUsed }} <br>
                <strong>Total Kapasitas Tersedia:</strong> {{ $totalAvailable }}
              </div>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
