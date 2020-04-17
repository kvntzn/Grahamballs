<script src="js/jquery.js"></script>  
<script type="text/javascript">


function change_province(val){

	$.ajax({
		url:'ajax.php',
		type:'POST',
		data:'province='+val,
		success:function(data){

			$.('#city').html(data);
		}
	})

 	}
</script>