// Updates existing movie-goers

$(document).ready(function(){
	
	$(document).on('focus', '.data', function() {
		$this = $(this);
		$id = $this.closest('tr').attr('id').split("_");
		$id = $id[1];
		$thisVal = $this.val();
		$thisField = $this.attr('name');
		
	
		$this.on('focusout', function(){
			$newVal = $this.val();
			if ($newVal != $thisVal) {
				
				$.ajax({
					url: "assets/ajax/update-product.ajax.php",
					type: "POST",
					data: {
						'this_field' : $thisField,
						'id' : $id,
						'new_val' : $newVal
					}, // End data
					'beforeSend' : function() {
						$('.success').removeClass('success').addClass('delete hidden');
						$('#prod_' + $id + ' .deletecell div').removeClass('delete hidden').addClass('loader_small');
					}, // End beforeSend
					
					'success' : function() {
						$('.loader_small').removeClass('loader_small').addClass('success');
						
						$(document).on('mouseover', '.deletecell', function() {
							$('.success', this).addClass('delete').removeClass('hidden success');
						}); // End mouseover deletecell

					} // End success
					
				}); // End AJAX
			} // End if names-not-same condition
		}); // End focusout
	}); // End focus

}); // End document ready