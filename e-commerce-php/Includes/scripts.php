<!-- ✅ Load jQuery (First) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ✅ Load Popper.js for Bootstrap tooltips -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<!-- ✅ Bootstrap 4 (Required for Now UI Kit) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- ✅ DataTables from CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<!-- ✅ Now UI Kit -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

<!-- ✅ CKEditor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>

<!-- ✅ Magnify -->
<script src="magnify/magnify.min.js"></script>

<!-- ✅ Other Plugins -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.min.js"></script>
<script src="../plugins/app.min.js"></script>
<script src="../plugins/demo.js"></script>

<!-- ✅ Initialization Scripts -->
<script>
  $(document).ready(function () {
    // DataTables Initialization
    $('#example1').DataTable();

    // CKEditor Initialization
    if (typeof CKEDITOR !== 'undefined') {
      CKEDITOR.replace('editor1');
    }

    // Magnify Initialization
    $('.zoom').magnify();

    // Search Input Focus Logic
    $('#navbar-search-input').focus(function () {
      $('#searchBtn').show();
    }).focusout(function () {
      $('#searchBtn').hide();
    });

    // Dropdowns
    $('.dropdown-toggle').dropdown();

    // Now UI Kit Sliders
    if (typeof nowuiKit !== 'undefined') {
      nowuiKit.initSliders();
    }
  });

  function scrollToDownload() {
    if ($('.section-download').length !== 0) {
      $("html, body").animate({
        scrollTop: $('.section-download').offset().top
      }, 1000);
    }
  }
</script>
