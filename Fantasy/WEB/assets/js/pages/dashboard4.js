//[Dashboard 4 Javascript]

//Project:	Maximum Admin - Responsive Admin Template
//Version:	1.3.0
//Last change:	20/09/2017
//Primary use:   Used only for the main dashboard 4 (index4.html)


$(function () {

  'use strict';

  // Make the dashboard widgets sortable Using jquery UI
  $('.connectedSortable').sortable({
    placeholder         : 'sort-highlight',
    connectWith         : '.connectedSortable',
    handle              : '.box-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });
  $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

  $('.daterange').daterangepicker({
    ranges   : {
      'Today'       : [moment(), moment()],
      'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month'  : [moment().startOf('month'), moment().endOf('month')],
      'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  }, function (start, end) {
    window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  });


  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
	
	jQuery('#visitfromworld').vectorMap({
        map: 'world_mill_en',
        backgroundColor: '#fff',
        borderColor: '#000',
        borderOpacity: 1,
        borderWidth: 1,
        zoomOnScroll : false,
        color: '#ddd',
        regionStyle: {
            initial: {
                fill: '#ccc',
            }
        },
        markerStyle: {
            initial: {
                r: 8,
                 'fill': '#26c6da',
                 'fill-opacity': 1,
                 'stroke': '#000',
                 'stroke-width': 0,
                 'stroke-opacity': 1,
            }
         },
         enableZoom: true,
         hoverColor: '#79e580',
         markers: [{
            latLng: [21.00, 78.00],
            name: 'India : 9347',
            style: {fill: '#26c6da'}
        },
      {
        latLng : [-33.00, 151.00],
        name : 'Australia : 250',
        style: {fill: '#02b0c3'}
      },
      {
        latLng : [36.77, -119.41],
        name : 'USA : 250',
        style: {fill: '#11a0f8'}
      },
      {
        latLng : [55.37, -3.41],
        name : 'UK   : 250',
         style: {fill: '#745af2'}
      },
      {
        latLng : [25.20, 55.27],
        name : 'UAE : 250',
        style: {fill: '#ffbc34'}
      }],
         hoverOpacity: null,
         normalizeFunction: 'linear',
         scaleColors: ['#fff', '#ccc'],
         selectedColor: '#c9dfaf',
         selectedRegions: [],
         showTooltip: true,
         onRegionClick: function (element, code, region) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
            alert(message);
        }
    });


  // -----------------
  // - SPARKLINE BAR -
  // -----------------
  $('.sparkbar').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type    : 'bar',
      height  : $this.data('height') ? $this.data('height') : '30',
      barColor: $this.data('color')
    });
  });
	
 // -----------------
  // - SPARKLINE BAR -
  // -----------------
	$("#sparkline9").sparkline([0,2,8,6,8,5,6,4,8,6,6,2 ], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#fc4b6c',
            fillColor: '#fc4b6c',
            minSpotColor:'#fc4b6c',
            maxSpotColor: '#fc4b6c',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#fc4b6c'
   });


	
  // SLIMSCROLL FOR CHAT WIDGET
  $('#direct-chat').slimScroll({
    height: '255px'
  });

   //-------------
		//- BAR CHART -
		//-------------
		
		// Get context with jQuery - using jQuery's .get() method.
		var barChartCanvas = $('#barChart').get(0).getContext('2d');
		// This will get the first returned node in the jQuery collection.
		var barChart            = new Chart(barChartCanvas);

		var barChartData = {
		  labels  : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
		  datasets: [
			{
			  label               : 'Electronics',
			  fillColor           : 'rgba(38,198,218,1)',
			  strokeColor         : 'rgba(38,198,218,0)',
			  pointColor          : '#26c6da',
			  pointStrokeColor    : 'rgba(38,198,218,0)',
			  pointHighlightFill  : '#fff',
			  pointHighlightStroke: 'rgba(38,198,218,1)',
			  data                : [5, 4, 3, 7, 5, 10, 3]
			},
			{
			  label               : 'Digital Goods',
			  fillColor           : 'rgba(30,136,229,1)',
			  strokeColor         : 'rgba(30,136,229,0)',
			  pointColor          : 'rgba(30,136,229,0)',
			  pointStrokeColor    : '#1e88e5',
			  pointHighlightFill  : '#fff',
			  pointHighlightStroke: 'rgba(30,136,229,1)',
			  data                : [3, 2, 9, 5, 4, 6, 4]
			}
		  ]
		};
		
		
		var barChartOptions                  = {
		  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		  scaleBeginAtZero        : true,
		  //Boolean - Whether grid lines are shown across the chart
		  scaleShowGridLines      : true,
		  //String - Colour of the grid lines
		  scaleGridLineColor      : 'rgba(0,0,0,.05)',
		  //Number - Width of the grid lines
		  scaleGridLineWidth      : 1,
		  //Boolean - Whether to show horizontal lines (except X axis)
		  scaleShowHorizontalLines: true,
		  //Boolean - Whether to show vertical lines (except Y axis)
		  scaleShowVerticalLines  : true,
		  //Boolean - If there is a stroke on each bar
		  barShowStroke           : true,
		  //Number - Pixel width of the bar stroke
		  barStrokeWidth          : 2,
		  //Number - Spacing between each of the X value sets
		  barValueSpacing         : 30,
		  //Number - Spacing between data sets within X values
		  barDatasetSpacing       : 1,
		  //String - A legend template
		  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		  //Boolean - whether to make the chart responsive
		  responsive              : true,
		  maintainAspectRatio     : true
		};

		barChartOptions.datasetFill = false,
		barChart.Bar(barChartData, barChartOptions);
	


}); // End of use strict
