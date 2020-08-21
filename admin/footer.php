  <footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b>Versión</b> 1.0
	</div>
	<strong><a target="_blank" href="https://cancinohidalgo.com/">Cancino Hidalgo y Asociados</a></strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<!-- <script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script> -->




<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {

	  
	 var table = $('#example1').DataTable( {
		"language": {
			  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		  },
		  responsive: true
	 });

	 var table2 = $('#example2').DataTable( {
		"language": {
			  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		  },
		  	responsive: true,
		  	"paging": true,
		  	"lengthChange": false,
		  	"searching": false,
		  	"ordering": true,
		  	"info": true,
		  	"autoWidth": false
	 });

	/*$("#example1").DataTable();
	$('#example2').DataTable({
	  "paging": true,
	  "lengthChange": false,
	  "searching": false,
	  "ordering": true,
	  "info": true,
	  "autoWidth": false
	});*/
  });
</script>
</body>
</html>
