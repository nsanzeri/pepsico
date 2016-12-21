<?php
set_include_path ( './assets/php-includes' . PATH_SEPARATOR . './assets/php-functions' );

// Function
require_once 'filter.fn.php';
require_once 'product.fn.php';

// Includes
require_once 'connect-local.inc.php';
require_once 'get-variables.inc.php';
require_once 'head.inc.php';
?>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                             <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
   			<?php require_once 'left-sidebar.inc.php'; ?>
            <!-- Left Sidebar End -->

            
            
            
            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
                    <div class="container">
                        <!-- Page-Title -->
                     
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title"></h4>
									<!-- Start Menu -->
                                    <ol class="breadcrumb pull-right">
                                    	<?php require_once 'menu.inc.php'; ?>
<!--                                         <li class="active"><a href="index.html">Map</a></li>
                                        <li><a href="grid.html">Grid</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
 -->                                    </ol>
                                    <!-- end Menu -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                     
                        <!-- Include content based on page -->
                        <?php require_once 'modal.inc.php';?>
                        
						<?php
						
						if ($page=="map") {
						    include 'content-map.inc.php';
						}
						
						if ($page=="grid") {
						    include 'content-grid.inc.php';
						
						}
						
						if ($page=="gallery") {
							include 'content-gallery.inc.php';
						}
						
						?>
                            
                    </div> <!-- container -->
                </div> <!-- content -->

                
                
                <!-- Start footer -->
                <footer class="footer">
                    © PepsiCo 2016 All Rights Reserved. 
                </footer>
                <!-- end footer -->   
                
            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

		
        <?php if ($page=="map") {?>
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/gdp-data.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-europe-mill-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-us-il-chicago-mill-en.js"></script> -->
<!--         <script src="assets/pages/jvectormap.init.js"></script> -->
		<?php }
		if ($page=="grid") { ?>
        <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>
		
		<?php } 
		if ($page=="gallery") {?>
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/gdp-data.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-europe-mill-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js"></script> -->
<!--         <script src="assets/plugins/jvectormap/jquery-jvectormap-us-il-chicago-mill-en.js"></script> -->
<!--         <script src="assets/pages/jvectormap.init.js"></script> -->
		<?php } ?>


        <script src="assets/js/app.js"></script>

    </body>
</html>