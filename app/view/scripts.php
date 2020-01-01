<script>
	getCart();

	$('#productForm').submit(function(e){
		e.preventDefault();
		var product = $(this).serialize();
		$.ajax({
			type : 'POST',
			url : 'cart_add.php',
			data : product,
			dataType : 'json'
		});
	});

	function getCart(){
		$.ajax({
			type : 'POST',
			url : 'cart_fetch.php',
			dataType : 'json',
			success : function(response){
				$('.cart_count').html(response.count);
			}
		});
	}
</script>