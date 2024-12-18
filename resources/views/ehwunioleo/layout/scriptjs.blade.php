<script src="/assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap js-->
<script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- feather icon js-->
<script src="/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- scrollbar js-->
<script src="/assets/js/scrollbar/simplebar.js"></script>
<script src="/assets/js/scrollbar/custom.js"></script>

<!-- Sidebar jquery-->
<script src="/assets/js/config.js"></script>
<script src="/assets/js/sidebar-menu.js"></script>

<!-- Template js-->
<script src="/assets/js/script.js"></script>

<script src="/assets/js/ehwunioleo-js/sweetalert.min.js"></script>
<script type="text/javascript">
  $('.show_confirm').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Yakin ingin menghapus data ini?`,
        text: "Data yang telah dihapus tidak dapat dikembalikan.",
        icon: "warning",
        confirmButtonColor: '#000000',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });

  function logout() {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Yakin ingin logout?`,
        icon: "warning",
        confirmButtonColor: '#000000',
        buttons: true,
        dangerMode: true,
      })
      .then((logout) => {
        if (logout) {
          document.getElementById('logout-form').submit();
        }
      });
  };

  function confirmRequest() {
    
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Kirim request?`,
        text: "Jenis Limbah tidak dapat diubah lagi!",
        icon: "warning",
        confirmButtonColor: '#000000',
        buttons: true,
        dangerMode: true,
      })
      .then((confirm) => {
        if (confirm) {
          document.getElementById('request-form').submit();
        }
      });
  };

  function confirmDelete() {
    
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Hapus request?`,
        text: "Data akan dihapus secara permanen!",
        icon: "warning",
        confirmButtonColor: '#000000',
        buttons: true,
        dangerMode: true,
      })
      .then((confirm) => {
        if (confirm) {
          document.getElementById('delete-request').submit();
        }
      });
  };
</script>