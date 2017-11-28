<!-- grid -->
	<div id="grid-content"></div>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Grid View</h3>
                <p class="panel-title"><?php echo getProductCount(); ?><?php echo getProductSearchCriteria(); ?></p>
            </div>
            <div class="panel-body-light">

                <table id="datatable-buttons" class="table table-striped table-bordered">
					<?php echo getProductsMatchingCriteria(); ?>
                </table>

            </div>
        </div>
    </div>
