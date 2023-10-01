<script type="text/javascript">
	$("body").on("click",".admin_lang",function(e){
		let lang = $(this).data("lang");
		pageload(true);
		$.ajax({
	        type: "get",
	        url: '<?=base_url("gopanel/lang/index")?>',
	        data: {lang:lang},
	        success: function(response) {
	            if (response.status == 'success') {
	            	location.reload();
	            }
	            else{
	            	pageload(false);
	            }
	        },
	        error: function(err) {
	            Swal.fire({
	                title: 'Sistem Xətası!',
	                html: 'Sistem Xətası baş verdi zəhmət olmasa sistem adminstratru ilə əlaqə saxlayın!',
	                type: 'error'
	            });
	        }
	    });
	});
</script>