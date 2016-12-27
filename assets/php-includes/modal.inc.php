
<div id="region-dialog" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-footer">
				<button type="button"
					class="btn btn-default waves-effect gp-closebtn"
					data-dismiss="modal">Close</button>
			</div>
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">
					<?php
					$source_str = '';
					if( ($x_pos = strpos(getProductSearchCriteria(), ' | ')) !== FALSE ){
						$source_str = substr(getProductSearchCriteria(), $x_pos + 3);
					}
					echo $source_str;
					?>
				</h4>
			</div>
			<div class="modal-body">
				<div id="gp-modal-products"></div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div id="product-dialog" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-footer">
			<button type="button"
					class="btn btn-default waves-effect product-closebtn" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">
				<div id="gp-modal-product"></div>
			</div>
			<div class="modal-header">
				<h4 class="modal-title" id="gp-modal-product-label">
				</h4>
				<ul style="list-style-type:none">
					  <li>Name:</li>
					  <li>Code Name:</li>
					  <li>Region:</li>
					  <li>Format:</li>
					  <li>Brand:</li>
					  <li>Size:</li>
					  <li>Finish:</li>
					  <li>Overal H x W x D:</li>
					  <li>Status:</li>
					  <li>ID#:</li>
					</ul>
			</div>
				
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

