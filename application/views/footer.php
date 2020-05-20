</div>

<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="<?= base_url();?>assets/js/app.js"></script>
<script>
	$('.btn-delete').click(function(){
		return confirm('Apakah anda yakin menghapus data ini?');		   
	});
</script>
</body>
</html>