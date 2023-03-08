<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  
<script src="/backend-assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/backend-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/backend-assets/libs/@shopify/draggable/lib/es5/draggable.bundle.legacy.js"></script>
<script src="/backend-assets/libs/autosize/dist/autosize.min.js"></script>
<script src="/backend-assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="/backend-assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="/backend-assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="/backend-assets/libs/highlightjs/highlight.pack.min.js"></script>
<script src="/backend-assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="/backend-assets/libs/list.js/dist/list.min.js"></script>
<script src="/backend-assets/libs/quill/dist/quill.min.js"></script>
<script src="/backend-assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="/backend-assets/libs/chart.js/Chart.extension.js"></script>

<!-- Map -->
<script src="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js"></script>

<!-- Theme JS -->
<script src="/backend-assets/js/theme.min.js"></script>
<script src="/backend-assets/js/dashkit.min.js"></script>

<script>
    $(document).ready(function() {
  $('#example').DataTable({
    "paging": true, // Mengaktifkan paging
    "lengthChange": false, // Tidak menampilkan opsi perubahan jumlah baris per halaman
    "searching": false, // Tidak menampilkan kolom pencarian
    "ordering": true, // Mengaktifkan pengurutan kolom
    "info": true, // Menampilkan informasi jumlah halaman dan baris
    "autoWidth": false, // Menonaktifkan penyesuaian lebar kolom secara otomatis
  });
});
</script>