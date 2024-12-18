<div class="modal fade" id="wasteDelete" tabindex="-1" role="dialog" aria-labelledby="wasteDelete" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-0">Apakah anda yakin ingin mengapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Batal</button>
        <form action="/waste/delete" method="POST">
          @csrf
          <input type="hidden" id="waste_id" name="id">
          <input type="submit" class="btn btn-danger" value="Ya, Hapus!">
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var waste_id = $(this).attr("data-id");
  document.getElementById("waste_id").value = waste_id;
</script>