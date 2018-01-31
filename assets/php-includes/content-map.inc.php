
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
					<img src="assets/images/map-color3.png" alt="Map">
					<?php echo getRegionCounts(); ?>
				</div>
				<ul class="key">
					<li><font color="#8d7fa3"><b>&#9634</b></font>&nbsp Asia Pacific</li>
					<li> <font color="#1d698f"><b>&#9634</b></font>&nbsp China</li>
					<li> <font color="#bf5546"><b>&#9634</b></font>&nbsp Eastern Europe</li>
					<li> <font color="#a9a9a9"><b>&#9634</b></font>&nbsp India</li>
					<li> <font color="#e9884f"><b>&#9634</b></font>&nbsp Latin America</li>
					<li> <font color="#99ba6b"><b>&#9634</b></font>&nbsp Middle East/North Africa</li>
					<li> <font color="#3ba4d7"><b>&#9634</b></font>&nbsp North America</li>
					<li> <font color="#f3ca68"><b>&#9634</b></font>&nbsp Western Europe/South Africa</li>
				</ul>
			</div>
		</div>
	</div>
</div>
