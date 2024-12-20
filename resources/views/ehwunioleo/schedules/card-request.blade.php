<div class="card">
  <div class="card-header pb-0">
    <h4 class="mb-3">Detail Request</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="mb-3">
          <label class="form-label">Petugas</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->user_name }}</p>
        </div>
      </div>
      <div class="col-12">
        <div class="mb-3">
          <label class="form-label">Tanggal</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->date }}</p>
        </div>
      </div>
      <div class="col-4">
        <div class="mb-3">
          <label class="form-label">Kode Limbah</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->waste_code }}</p>
        </div>
      </div>
      <div class="col-8">
        <div class="mb-3">
          <label class="form-label">Jenis Limbah</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->waste_name }}</p>
        </div>
      </div>
      <div class="col-4">
        <div class="mb-3">
          <label class="form-label">Jumlah</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->amount }}</p>
        </div>
      </div>
      <div class="col-4">
        <div class="mb-3">
          <label class="form-label">Packaging</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->packaging }}</p>
        </div>
      </div>
      <div class="col-4">
        <div class="mb-3">
          <label class="form-label">Berat (Kg)</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->weight }}</p>
        </div>
      </div>
      <div class="col-12">
        <div class="mb-3">
          <label class="form-label">Sumber</label>
          <p class="bg-label-light border text-black rounded p-2">{{ $schedule->source }}</p>
        </div>
      </div>

      <div class="col-12">
        <div class="mb-3">
          <label class="form-label" for="note">Catatan/Keterangan</label>
          <p class="bg-label-light border text-black rounded p-2">{!! $schedule->note !!}</p>
        </div>
      </div>

      <div class="col-12">
        <div class="mb-3">
          <label class="form-label">Verifikasi Data</label>
          <div class="form-check checkbox checkbox-primary mb-1">
            <input type="checkbox" checked disabled>
            <label class="text-black">Simbol</label>
          </div>
          <div class="form-check checkbox checkbox-primary mb-1">
            <input type="checkbox" checked disabled>
            <label class="text-black">Packaging</label>
          </div>
          <div class="form-check checkbox checkbox-primary mb-1">
            <input type="checkbox" checked disabled>
            <label class="text-black">Label</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
