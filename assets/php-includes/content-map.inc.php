
<!-- map -->
<div id="map-content"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">World Map</h3>
				<p class="panel-title"><?php echo getProductCount(); ?><?php echo getProductSearchCriteria(); ?></p>
				<p class="panel-title"></p>
			</div>
			<div class="panel-body">



				<div class="map">
					<img src="assets/images/map-blue.png" alt="Map">
					<?php echo getRegionCounts(); ?>
				</div>


			</div>
		</div>
	</div>
</div>
