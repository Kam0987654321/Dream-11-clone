//[Dashboard 2 Javascript]

//Project:	Maximum Admin - Responsive Admin Template
//Version:	1.1.0
//Last change:	11/09/2017
//Primary use:   Used only for the main dashboard 2 (index2.html)


$(function () {

  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

	
 
	
  // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas);

  var salesChartData = {
    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label               : 'Electronics Equipment',
        fillColor           : 'rgba(30,172,190,0.1)',
        strokeColor         : 'rgba(30,172,190,1)',
        pointColor          : '#1eacbe',
        pointStrokeColor    : 'rgba(30,172,190,1)',
        pointHighlightFill  : '#ffb22b',
        pointHighlightStroke: 'rgba(30,172,190,1)',
        data                : [0, 69, 21, 75, 85, 32, 65]
      },
      {
        label               : 'Digital Product',
        fillColor           : 'rgba(56,154,240,0.1)',
        strokeColor         : 'rgba(56,154,240,1)',
        pointColor          : '#389af0',
        pointStrokeColor    : 'rgba(56,154,240,1)',
        pointHighlightFill  : '#ffb22b',
        pointHighlightStroke: 'rgba(56,154,240,1)',
        data                : [0, 34, 90, 45, 64, 42, 95]
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale               : true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    // String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.1)',
    // Number - Width of the grid lines
    scaleGridLineWidth      : 0.5,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    // Boolean - Whether the line is curved between points
    bezierCurve             : true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension      : 0,
    // Boolean - Whether to show a dot for each point
    pointDot                : true,
    // Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 1,
    // Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    // String - A legend template
    legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  };

  // Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  // ---------------------------
  // - END MONTHLY SALES CHART -
  // ---------------------------

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
	
	

  /* SPARKLINE CHARTS
   * ----------------
   * Create a inline charts with spark line
   */

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
  // - SPARKLINE PIE -
  // -----------------
  $('.sparkpie').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type       : 'pie',
      height     : $this.data('height') ? $this.data('height') : '90',
      sliceColors: $this.data('color')
    });
  });

  // ------------------
  // - SPARKLINE LINE -
  // ------------------
  $('.sparkline').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type     : 'line',
      height   : $this.data('height') ? $this.data('height') : '90',
      width    : '100%',
      lineColor: $this.data('linecolor'),
      fillColor: $this.data('fillcolor'),
      spotColor: $this.data('spotcolor')
    });
  });
	
}); // End of use strict
