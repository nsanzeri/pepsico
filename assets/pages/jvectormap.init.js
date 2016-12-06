/**
* Theme: Xadmino
* VectorMap
*/

!function($) {
    "use strict";

    var VectorMap = function() {};
    
    
    

    VectorMap.prototype.init = function() {
        //various examples
        $('#world-map-markers').vectorMap({
			map : 'world_mill_en',
			scaleColors : ['#4bd396', '#4bd396'],
			normalizeFunction : 'polynomial',
			hoverOpacity : 0.7,
			hoverColor : false,
			regionStyle : {
				initial : {
					fill : '#03a9f4'
				}
			},
			 markerStyle: {
                initial: {
                    r: 9,
                    'fill': '#4bd396',
                    'fill-opacity': 0.9,
                    'stroke': '#fff',
                    'stroke-width' : 7,
                    'stroke-opacity': 0.4
                },

                hover: {
                    'stroke': '#fff',
                    'fill-opacity': 1,
                    'stroke-width': 1.5
                }
            },
			backgroundColor : 'transparent',
			markers : [
//           {
//				latLng : [41.90, 12.45],
//				name : 'Vatican City'
//			}, {
//				latLng : [43.73, 7.41],
//				name : 'Monaco'
//			}, {
//				latLng : [43.93, 12.46],
//				name : 'San Marino'
//			}, {
//				latLng : [47.14, 9.52],
//				name : 'Liechtenstein'
//			}, {
//				latLng : [35.88, 100.5],
//				name : 'Malta'
//			}, {
//				latLng : [-5.05, -61.75],
//				name : 'Grenada'
//			},{
//				latLng : [42.5, 1.51],
//				name : 'Andorra'
//			}, {
//				latLng : [4.01, -60.98],
//				name : 'Saint Lucia'
//			}, {
//				latLng : [1.3, 103.8],
//				name : 'Singapore'
//			}, 
//				
//			{
//				latLng : [35.3, -85.38],
//				name : 'Dominica'
//			}, {
//				latLng : [26.02, 50.55],
//				name : 'Bahrain'
//			}, {
//				latLng : [0.33, 26.73],
//				name : 'SÃ£o TomÃ© and PrÃ­ncipe'
//			}
]
		});


        $('#europe').vectorMap({map: 'europe_mill_en',backgroundColor: 'transparent',
          regionStyle: {
            initial: {
              fill: '#dcdcdc'
            }
          }});
        $('#usa').vectorMap({map: 'us_aea_en',backgroundColor: 'transparent',
                  regionStyle: {
                    initial: {
                      fill: '#dcdcdc'
                    }
                  }});
        $('#uk').vectorMap({map: 'uk_mill_en',backgroundColor: 'transparent',
                  regionStyle: {
                    initial: {
                      fill: '#dcdcdc'
                    }
                  }});
        $('#chicago').vectorMap({map: 'us-il-chicago_mill_en',backgroundColor: 'transparent',
                  regionStyle: {
                    initial: {
                      fill: '#dcdcdc'
                    }
                  }});

  },
    //init
    $.VectorMap = new VectorMap, $.VectorMap.Constructor = VectorMap
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.VectorMap.init()
}(window.jQuery);
