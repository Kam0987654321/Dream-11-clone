//[Dashboard 3 Javascript]

//Project:	Maximum Admin - Responsive Admin Template
//Version:	1.3.0
//Last change:	20/09/2017
//Primary use:   Used only for the main dashboard 3 (index3.html)


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

  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });

  // bootstrap WYSIHTML5 - text editor
  $('.textarea').wysihtml5();

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

  /* jQueryKnob */
  $('.knob').knob();

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



// -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
    	  {
			value    : 750,
			color    : '#7460ee',
			highlight: '#7460ee',
			label    : 'Chrome'
		  },
		  {
			value    : 350,
			color    : '#26C6DA',
			highlight: '#26C6DA',
			label    : 'IE'
		  },
		  {
			value    : 450,
			color    : '#ffb22b',
			highlight: '#ffb22b',
			label    : 'FireFox'
		  },
		  {
			value    : 700,
			color    : '#1e88e5',
			highlight: '#1e88e5',
			label    : 'Safari'
		  },
		  {
			value    : 200,
			color    : '#fc4b6c',
			highlight: '#fc4b6c',
			label    : 'Opera'
		  },
		  {
			value    : 150,
			color    : '#d2d6de',
			highlight: '#d2d6de',
			label    : 'Navigator'
		  }
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 0,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 70, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> users'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------
	
  // SLIMSCROLL FOR CHAT WIDGET
  $('#direct-chat').slimScroll({
    height: '255px'
  });

   //----------------------------line
		
	// Get context with jQuery - using jQuery's .get() method.
	var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
	// This will get the first returned node in the jQuery collection.
	var lineChart                = new Chart(lineChartCanvas);

	var lineChartData = {
	  labels  : ['0', '4', '8', '12', '16', '20', '24', '30'],
	  datasets: [
		{
		  label               : 'Electronics',
		  fillColor           : 'rgba(38,198,218,0)',
		  strokeColor         : 'rgba(38,198,218,1)',
		  pointColor          : '#26C6DA',
		  pointStrokeColor    : 'rgba(38,198,218,0.5)',
		  pointHighlightFill  : '#fff',
		  pointHighlightStroke: 'rgba(38,198,218,1)',
		  data                : [0, 2, 3.5, 0, 13, 1, 4, 1]
		},
		{
		  label               : 'Digital Goods',
		  fillColor           : 'rgba(30,136,229,0)',
		  strokeColor         : 'rgba(30,136,229,1)',
		  pointColor          : 'rgba(30,136,229,0.5)',
		  pointStrokeColor    : '#1e88e5',
		  pointHighlightFill  : '#fff',
		  pointHighlightStroke: 'rgba(30,136,229,1)',
		  data                : [0, 4, 0, 4, 0, 4, 0, 4]
		}
	  ]
	};

	var lineChartOptions = {
	  //Boolean - If we should show the scale at all
	  showScale               : true,
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
	  //Boolean - Whether the line is curved between points
	  bezierCurve             : true,
	  //Number - Tension of the bezier curve between points
	  bezierCurveTension      : 0.3,
	  //Boolean - Whether to show a dot for each point
	  pointDot                : true,
	  //Number - Radius of each point dot in pixels
	  pointDotRadius          : 1,
	  //Number - Pixel width of point dot stroke
	  pointDotStrokeWidth     : 1,
	  //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
	  pointHitDetectionRadius : 20,
	  //Boolean - Whether to show a stroke for datasets
	  datasetStroke           : true,
	  //Number - Pixel width of dataset stroke
	  datasetStrokeWidth      : 1,
	  //Boolean - Whether to fill the dataset with a color
	  datasetFill             : true,
	  //String - A legend template
	  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
	  //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
	  maintainAspectRatio     : true,
	  //Boolean - whether to make the chart responsive to window resizing
	  responsive              : true
	};

	//Create the line chart
	lineChart.Line(lineChartData, lineChartOptions);
	


}); // End of use strict
