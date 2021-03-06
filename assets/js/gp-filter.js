// Maintain filter state

$(document).ready(function(){
//	resetSizeFilter();
    //whenever a checkbox is checked submit form
    $("input[name='region_array[]']").on('click', function() {
    	doSubmit();
   	});

    $("input[name='brand_array[]']").on('click', function() {
    	doSubmit();
   	});

    $("input[name='finish_array[]']").on('click', function() {
    	doSubmit();
   	});

    $("input[name='format_array[]']").on('click', function() {
    	doSubmit();
   	});

    //whenever the search icon is clicked
    $('#search-icon').on('click', function() {
    	doSubmit();
    });
    

    $("input[name='size_metric_array[]']").on('click', function() {
		var cbsm = document.getElementsByName("size_metric_array[]");
		var cbs = document.getElementsByName("size_array[]");
		for (var i = 0; i < cbsm.length; i++) {
			if (cbsm[i].type == "checkbox" && cbsm[i].checked == true) {
				cbs[i].checked = true;
			}else{
				console.log("trying to remove " + cbs[i].checked);
				cbs[i].checked = false;
			}
		}
		doSubmit();
	});

    $("input[name='size_array[]'").on('click', function() {
		var cbsm = document.getElementsByName("size_metric_array[]");
		var cbs = document.getElementsByName("size_array[]");
		for (var i = 0; i < cbs.length; i++) {
			if (cbs[i].type == "checkbox" && cbs[i].checked == true) {
				cbsm[i].checked = true;
			}else{
				cbsm[i].checked = false;
			}
		}
		doSubmit();
	});
    
    
    $("#gp-modal-products").each(function () {
    	$(this).empty();	
    });
    $("#gp-modal-region").each(function () {
    	$(this).empty();	
    });

    $('#all-clear').on('click', function() {
    	clearCriteriaAll('region');
    	clearCriteriaAll('format');
    	clearCriteriaAll('brand');
    	clearCriteriaAll('size');
    	clearCriteriaAll('size_metric');
    	clearCriteriaAll('finish');
    	$('#autocomplete').val('');
    	doSubmit();
   	});

    
    //Clear all check boxes fopr a certain criteria when clear all is clicked
    $('#region-clear').on('click', function() {
    	clearCriteria('region');
    });

    $('#format-clear').on('click', function() {
    	clearCriteria('format');
    });
    
    $('#brand-clear').on('click', function() {
    	clearCriteria('brand');
    });

    $('#size-clear').on('click', function() {
    	clearCriteria('size');
    	clearCriteria('size_metric');
    });
    
    $('#finish-clear').on('click', function() {
    	clearCriteria('finish');
    });
    
    function clearCriteria($criteriaName){
    	clearCriteriaAll($criteriaName);
//    	 $( "#showMetric" ).val(false);  
    	doSubmit();
    }
    
    function clearCriteriaAll($criteriaName){
   	    $("input[name='" + $criteriaName + "_array[]']:checkbox").each(function () {
   	        $(this).attr('checked', false);
   	    });
   	   
    }

    //Clear all -END

    // Left hand filter search field.
	$( "#autocomplete" ).autocomplete({
		source: function( request, response ) {
			$.ajax( {
				url: "assets/ajax/autocomplete.ajax.php",
				dataType: "json",
				data: {
					term: request.term
				},
				success: function( data ) {
					response( data );
				}
			} );
		},
		minLength: 2
	});
	$( "#autocomplete" ).val($("input:hidden[name='searchTermPersisted']").val());
	
	//Toggle between metric and english measurements
	function checkMetricMetric(evt) {
	    var valMet = $("input[name=english-metric-Metric]:checked").val();
	    var valEng = $("input[name=english-metric-English]:checked").val();
	    if (valEng == 'English' && valMet == 'English') {
	    }else if (valEng == 'Metric' && valMet == 'English'){
	    	$("input[name=english-metric-English][value=English]").prop('checked', true);
	    	$("input[name=english-metric-Metric][value=English]").prop('checked', true);
			$( "#showMetric" ).val(false);  
			$( "#size-metric" ).toggle( "slow", function() {});
			$( "#size-english" ).toggle( "slow", function() {});
	    } 
	    else {
			$( "#showMetric" ).val(true);  
	    }
//	    var isMetric = $( "#showMetric" ).val();
//    	alert("isMetric = " + isMetric);
	}
	
	//Toggle between metric and english measurements
	function checkMetricEnglish(evt) {
	    var valMet = $("input[name=english-metric-Metric]:checked").val();
	    var valEng = $("input[name=english-metric-English]:checked").val();
	    if (valEng == 'English' && valMet == 'English') {
	    }else if (valEng == 'English' && valMet == 'Metric'){
	    	$("input[name=english-metric-English][value=English]").prop('checked', true);
	    	$("input[name=english-metric-Metric][value=English]").prop('checked', true);
			$( "#showMetric" ).val(false);  
			$( "#size-metric" ).toggle( "slow", function() {});
			$( "#size-english" ).toggle( "slow", function() {});
	    	
	    } 
	    else {
	    	$("input[name=english-metric-English][value=Metric]").prop('checked', true);
	    	$("input[name=english-metric-Metric][value=Metric]").prop('checked', true);
			$( "#showMetric" ).val(true);  
			$( "#size-metric" ).toggle( "slow", function() {});
			$( "#size-english" ).toggle( "slow", function() {});
	    }
//	    var isMetric = $( "#showMetric" ).val();
//    	alert("isMetric = " + isMetric);
	}
	$('input[name=english-metric-Metric]:radio').change(checkMetricMetric);
	$('input[name=english-metric-English]:radio').change(checkMetricEnglish);

	var isMetric = $( "#showMetric" ).val();
	if (isMetric == "true"){
    	$("input[name=english-metric-English][value=Metric]").prop('checked', true);
    	$("input[name=english-metric-Metric][value=Metric]").prop('checked', true);
		checkMetricMetric();	
	}else{
    	$("input[name=english-metric-English][value=English]").prop('checked', true);
    	$("input[name=english-metric-Metric][value=English]").prop('checked', true);
		checkMetricEnglish();	
	}
	
	
	
	function doSubmit(){
    	if ($('#map-content').length){
	    	$( "#map_form" ).submit();
	    }else if ($('#grid-content').length){
	    	$( "#grid_form" ).submit();
	    }else if ($('#gallery-content').length){
	    	$( "#gallery_form" ).submit();
	    }
	}
	
}); // End document ready