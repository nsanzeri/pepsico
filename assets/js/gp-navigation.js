// Shows and hides admin menus on mouseover

$(document).ready(function(){
	buildSingleProductLinks();
	$( "#map_form" ).submit(function( event ) {
	    $("input:hidden[name='region']").val(JSON.stringify($("input[name='region_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='format']").val(JSON.stringify($("input[name='format_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='brand']").val(JSON.stringify($("input[name='brand_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='size']").val(JSON.stringify($("input[name='size_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='finish']").val(JSON.stringify($("input[name='finish_array[]']:checkbox:checked").serializeArray()));
	});
	$( "#grid_form" ).submit(function( event ) {
		$("input:hidden[name='region']").val(JSON.stringify($("input[name='region_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='format']").val(JSON.stringify($("input[name='format_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='brand']").val(JSON.stringify($("input[name='brand_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='size']").val(JSON.stringify($("input[name='size_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='finish']").val(JSON.stringify($("input[name='finish_array[]']:checkbox:checked").serializeArray()));
	});
	$( "#gallery_form" ).submit(function( event ) {
		$("input:hidden[name='region']").val(JSON.stringify($("input[name='region_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='format']").val(JSON.stringify($("input[name='format_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='brand']").val(JSON.stringify($("input[name='brand_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='size']").val(JSON.stringify($("input[name='size_array[]']:checkbox:checked").serializeArray()));
	    $("input:hidden[name='finish']").val(JSON.stringify($("input[name='finish_array[]']:checkbox:checked").serializeArray()));
	});
	
	$( "#map_link" ).click(function() {
		  $( "#map_form" ).submit();
	});
	$( "#grid_link" ).click(function() {
		  $( "#grid_form" ).submit();
	});
	$( "#gallery_link" ).click(function() {
		  $( "#gallery_form" ).submit();
	});
 
    $('.gp-closebtn').on('click',function() {
    	$( "#region-dialog" ).fadeOut('fast', 0);
      	resetAccordions();
    });
    
    $('.product-closebtn').on('click',function() {
    	$( "#region-dialog" ).css('display', 'none');
    	$( "#product-dialog" ).fadeOut('fast', 0);
      	resetAccordions();
    });

   // AJAX map clicks - retrieve region specific list for display
   $('#region-africa').on('click', function() {
	   callRegionalAjax("Africa");
   }); 
   $('#region-asia').on('click', function() {
	   callRegionalAjax("Asia");
   }); 
   $('#region-australia').on('click', function() {
	   callRegionalAjax("Australia");
   }); 
   $('#region-north-america').on('click', function() {
	   callRegionalAjax("North America");
   }); 
   $('#region-south-america').on('click', function() {
	   callRegionalAjax("South America");
   }); 
   $('#region-europe').on('click', function() {
	   callRegionalAjax("Europe");
   }); 
   // AJAX map clicks - END
   
    function ajaxReset($region, $format, $brand, $size, $finish){
	   $("input:hidden[name='region']").val($region);
	   $("input:hidden[name='format']").val($format);
	   $("input:hidden[name='brand']").val($brand);
	   $("input:hidden[name='size']").val($size);
	   $("input:hidden[name='finish']").val($finish);
	   $("input[name='region_array[]']:checkbox").val();
	   
	   resetAccordions();
   }
   
   function callRegionalAjax($regionName){
       $this = $(this);
       
       $region = JSON.stringify($("input[name='region_array[]']:checkbox:checked").serializeArray());
       $format = JSON.stringify($("input[name='format_array[]']:checkbox:checked").serializeArray());
       $brand = JSON.stringify($("input[name='brand_array[]']:checkbox:checked").serializeArray());
       $size = JSON.stringify($("input[name='size_array[]']:checkbox:checked").serializeArray());
       $finish = JSON.stringify($("input[name='finish_array[]']:checkbox:checked").serializeArray());

       $.ajax({
           url: "assets/ajax/product.ajax.php",
           type: "POST",
           data: {
               'regionName' : $regionName,
               'format' : $format,
               'brand' : $brand,
               'size' : $size,
               'finish' : $finish
           }, 
           'dataType' : "html",// End data
           'beforeSend' : function() {
	           $( "#gp-modal-products" ).empty();
	           $( "#gp-modal-region" ).empty();
           }, // End beforeSend callback
           'success' : function(response) {
	           $modalContents = response;
	           //open modal with proper header and contents from DB
	       	   $( "#gp-modal-region" ).prepend( $regionName );
	       	   $( "#gp-modal-products" ).append($modalContents);
	       	   
	       	   buildSingleProductLinks();
//		       $(".modal-dialog").css("width", "900px");   
		       $( "#region-dialog" ).fadeTo('slow', 1);
		       
	       	   ajaxReset($region, $format, $brand, $size, $finish);    
           },// End success callback
           'done' : function(response) {
           } // End done callback
       }); // End AJAX
   }
   
   
   function retrieveSingleProduct($prodId){
       $this = $(this);

       $.ajax({
           url: "assets/ajax/single-product.ajax.php",
           type: "GET",
           data: {
               'prodId' : $prodId
           }, 
           'dataType' : "html",// End data
           'beforeSend' : function() {
        	   $( "#region-dialog" ).fadeTo('slow', 0);
	           $( "#gp-modal-product" ).empty();
           }, // End beforeSend callback
           'success' : function(response) {
        	   $modalContents = jQuery.parseJSON(response);

	           //open modal with proper header and contents from DB
	       	   $( "#gp-modal-product" ).html($modalContents.image360);
	       	   $( "#gp-modal-product-label" ).html($modalContents.header);
		       $( "#product-dialog" ).fadeTo('slow', 1);
           },// End success callback
           'error' : function(response) {
           }, // End done callback
           'done' : function(response) {
           } // End done callback
       }); // End AJAX
   }
   
   function resetAccordions(){
 	   $(".accordion").each(function () {
	       $(this).on('click', function() {
	       	$(this).toggleClass('active').next().toggleClass('show');
	       });
	   });
   }

   function buildSingleProductLinks(){
	   $(".gp-modal-product-id").each(function () {
   	       $(this).on('click', function() {
   	       	$prodId = $(this).prev().text();
   	       	retrieveSingleProduct($prodId);
   	       });
   	   });
   }
   
   function testAppend360(){
		$spinner = '<img src="images/mini/001.jpg" width="400" height="400" class="reel" id="image"'+
			'data-images="images/mini/###.jpg" data-frames="20" data-frame="14"'+
			'data-rows="6" data-row="3" data-speed="0.3">'+

		'<div class="reel-annotation" id="first_row" data-start="1"'+
			'data-end="20"'+
			'data-x="10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100,105"'+
			'data-y="10" data-for="image">First Row</div>'+
		'<div class="reel-annotation" id="last_row" data-start="101"'+
			'data-end="120"'+
			'data-x="105,100,95,90,85,80,75,70,65,60,55,50,45,40,35,30,25,20,15,10"'+
			'data-y="175" data-for="image">Last Row</div>';

		$spinnerVr = '<div id="container" style="width:439px;height:540px;">' +
		'This content requires HTML5 &amp; Javascript or Adobe Flash Player Version 9 or higher.'+
	'</div>'+
	'<script type="text/javascript">'+
		'getProductSpinnerConfig(1);'+
	'</script>';

		$( "#gp-modal-product" ).append($spinnerVr);
   }
   function hideUrlBar(){}
});
function hideUrlBar(){}
function getProductSpinnerConfig($prodId){
	// create the object player with the container
	obj=new object2vrPlayer("container");
	// add the skin object
	skin=new object2vrSkin(obj);
	// load the configuration
	str='<?xml version="1.0" encoding="UTF-8"?>';
	str+='<vrobject>';
	str+='  <input states="1" windowheight="899" width="600" imagepath="assets/images/products/' + $prodId + '" preview="4" windowwidth="600" height="899" preload="1" columns="12" rows="4" fileextension="jpg"/>';
	str+='  <control simulatemass="1" lockedmouse="0" swapxy="0" lockedkeyboard="0" dblclickfullscreen="0" revx="0" invertwheel="0" revy="1" wrapx="1" wrapy="0" trapwheel="1" automovemode="1" lockedwheel="0" speedwheel="1.000" controller="1" sensitivity="10"/>';
	str+='  <view>';
	str+='    <start row="0" column="0" state="0"/>';
	str+='    <zoom default="1.000" centerx="0.00000" centery="0.00000" min="1" max="4.000"/>';
	str+='    <viewer imagescaling="1" backgroundcolor="0xffffff" background="1"/>';
	str+='  </view>';
	str+='  <autorotate speed="0.200" onlyonce="1" delay="0.00" start="0"/>';
	str+='  <userdata title="" datetime="" description="" copyright="" author="" source="" comment="" info=""/>';
	str+='  <qthotspots enabled="0" reuse="8">';
	str+='    <label width="180" backgroundalpha="1.000" enabled="0" height="20" backgroundcolor="0xffffff" bordercolor="0x000000" border="1" textcolor="0x000000" background="1" borderalpha="1.000" borderradius="1" wordwrap="1" textalpha="1.000"/>';
	str+='  </qthotspots>';
	str+='  <hotspots>';
	str+='    <label width="180" backgroundalpha="1.000" enabled="0" height="20" backgroundcolor="0xffffff" bordercolor="0x000000" border="1" textcolor="0x000000" background="1" borderalpha="1.000" borderradius="1" wordwrap="1" textalpha="1.000"/>';
	str+='    <polystyle mode="0" backgroundalpha="0.251" backgroundcolor="0x0000ff" bordercolor="0x0000ff" borderalpha="1.000"/>';
	str+='  </hotspots>';
	str+='</vrobject>';
	str+='';
	obj.readConfigString(str);
//	obj.readConfigUrl("assets/xml/" + $prodId + ".xml");
	// hide the URL bar on the iPhone
	setTimeout(function() { hideUrlBar(); }, 10);
}

