
<div id="region-dialog" class="gp-modal">
	<div class="gp-modal-content gp-animate-zoom gp-card-8">

		<header class="gp-container gp-teal">
			<span class="gp-closebtn">&times;</span>
			<h2>
				<div id="gp-modal-criteria">
					<div class="panel-title" id="gp-modal-region"></div>
					<p class="panel-title">
					<?php
					$source_str = '';
					if( ($x_pos = strpos(getProductSearchCriteria(), ' | ')) !== FALSE )
						$source_str = substr(getProductSearchCriteria(), $x_pos + 3);
					echo $source_str;
					?>
					</p>
				</div>
			</h2>
		</header>
		<div id="gp-modal-products"></div>
	</div>
</div>


<div id="product-dialog" class="gp-modal">
	<div class="gp-modal-content gp-animate-zoom gp-card-8">

		<header class="gp-container gp-teal">
			<span class="product-closebtn">&times;</span>
			<h2>
				<div id="gp-modal-criteria">
					<div class="panel-title" id="gp-modal-region"></div>
					<?php
					$source_str = '';
					if( ($x_pos = strpos(getProductSearchCriteria(), ' | ')) !== FALSE ){
						$source_str = substr(getProductSearchCriteria(), $x_pos + 3);
					}
					echo $source_str;
					?>
				</div>
			</h2>
		</header>
		<div id="gp-modal-product"></div>
	</div>
</div>
