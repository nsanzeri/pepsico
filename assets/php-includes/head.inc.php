<!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>PepsiCo Global Database</title>        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />        <meta content="Admin Dashboard" name="description" />        <meta content="ThemeDesign" name="author" />        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        <link rel="shortcut icon" href="assets/images/favicon.ico">        <!--360 magic -->        <script type="text/javascript" src="assets/js/object2vr_player.js"></script>		<script type="text/javascript" src="assets/js/skin.js"></script>        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">        <link href="assets/css/style.css" rel="stylesheet" type="text/css">        <link href="assets/css/gp-style.css" rel="stylesheet" type="text/css">        <?php if ($page=="grid") { ?>        <!-- DataTables -->        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />				<?php } ?>        <?php if ($page=="admin") { ?>        <!-- DataTables -->		<link href="assets/css/style-admin.css" rel="stylesheet" type="text/css">				<?php } ?>		                <!--Jquery -->        <script src="assets/js/jquery.min.js"></script> <!-- Site will work offline with this -->        <script src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>        <?php if ($page=="admin") { ?>         <script src = "assets/js/delete-product.js"></script>         <script src = "assets/js/add-product.js"></script>         <script src = "assets/js/update-product.js"></script>         <script src = "assets/js/jquery.tinysort.min.js"></script>		<?php } ?>        <!--our stuff -->        <script src="assets/js/gp-navigation.js"></script>        <script src="assets/js/gp-filter.js"></script>    </head>