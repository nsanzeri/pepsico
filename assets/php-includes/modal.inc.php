	<div id="region-dialog" class="modal fade">
			<div class="modal-dialog">
					<div class="modal-content">
							<div class="modal-header">

									<button type="button" class="close gp-closebtn" aria-hidden="true">x</button>
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
							<div class="modal-footer">
									<button type="button" class="btn btn-default waves-effect gp-closebtn" data-dismiss="modal">Close</button>
							</div>
						</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<div id="product-dialog" class="modal fade">
			<div class="modal-dialog">
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close product-closebtn" data-dismiss="modal" aria-hidden="true">x</button>
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
								<div id="gp-modal-product"></div>
							</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-default waves-effect product-closebtn" data-dismiss="modal">Close</button>
							</div>
						</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

