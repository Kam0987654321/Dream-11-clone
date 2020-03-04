//[Dashboard Javascript]

//Project:	Maximum Admin - Responsive Admin Template
//Version:	1.1.0
//Last change:	11/09/2017
//Primary use:   Used only for the main dashboard (index.html)


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

  // jvectormap data
  var visitorsData = {
    US: 398, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 2000 // Russia
  };
  // World map by jvectormap
  $('#world-map').vectorMap({
    map              : 'world_mill_en',
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial: {
        fill            : '#67757c',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      }
    },
    series           : {
      regions: [
        {
          values           : visitorsData,
          scale            : ['#d2d6de', '#b5bbc8'],
          normalizeFunction: 'polynomial'
        }
      ]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != 'undefined')
        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
    }
  });

  // Sparkline charts
  var myvalues = [1300, 500, 1920, 927, 831, 1127, 719, 1930, 1221];
  $('#sparkline-1').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#b5bbc8',
    height   : '50',
    width    : '70'
  });
  myvalues = [715, 319, 620, 342, 662, 990, 730, 467, 559, 340, 881];
  $('#sparkline-2').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#b5bbc8',
    height   : '50',
    width    : '70'
  });
  myvalues = [88, 49, 22,35, 45, 72, 11, 55, 25, 19, 27];
  $('#sparkline-3').sparkline(myvalues, {
    type     : 'line',
    lineColor: '#67757c',
    fillColor: '#b5bbc8',
    height   : '50',
    width    : '70'
  });

  // The Calender
  $('#calendar').datepicker();

  // SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').slimScroll({
    height: '325px'
  });

  /* Morris.js Charts */
  // Sales chart
  var area = new Morris.Area({
    element   : 'revenue-chart',
    resize    : true,
    data      : [
      { y: '2015 Q1', item1: 1500, item2: 1800 },
      { y: '2015 Q2', item1: 4000, item2: 5000 },
      { y: '2015 Q3', item1: 7800, item2: 8800 },
      { y: '2015 Q4', item1: 9000, item2: 9500 },
      { y: '2016 Q1', item1: 10000, item2: 10500 },
      { y: '2016 Q2', item1: 9500, item2: 10000 },
      { y: '2016 Q3', item1: 7000, item2: 8555 },
      { y: '2016 Q4', item1: 11000, item2: 12500 },
      { y: '2017 Q1', item1: 17000, item2: 18500 },
      { y: '2017 Q2', item1: 19000, item2: 20000 }
    ],
    xkey      : 'y',
    ykeys     : ['item1', 'item2'],
    labels    : ['Item 1', 'Item 2'],
    lineColors: ['#41a1f5', '#177cd5'],
    hideHover : 'auto'
  });
  var line = new Morris.Line({
    element          : 'line-chart',
    resize           : true,
    data             : [
      { y: '2015 Q1', item1: 2800 },
      { y: '2015 Q2', item1: 2500 },
      { y: '2015 Q3', item1: 4200 },
      { y: '2015 Q4', item1: 3900 },
      { y: '2016 Q1', item1: 4589 },
      { y: '2016 Q2', item1: 6489 },
      { y: '2016 Q3', item1: 3548 },
      { y: '2016 Q4', item1: 12589 },
      { y: '2017 Q1', item1: 11025 },
      { y: '2017 Q2', item1: 19540 }
    ],
    xkey             : 'y',
    ykeys            : ['item1'],
    labels           : ['Item 1'],
    lineColors       : ['#26C6DA'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#999',
    gridStrokeWidth  : 0.2,
    pointSize        : 4,
    pointStrokeColors: ['#26C6DA'],
    gridLineColor    : '#999',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });

  // Donut Chart
  var donut = new Morris.Donut({
    element  : 'sales-chart',
    resize   : true,
    colors   : ['#1e88e5', '#ffb22b', '#7460ee'],
    data     : [
      { label: 'Online Sales', value: 39 },
      { label: 'In-Store Sales', value: 54 },
      { label: 'Mail-Order Sales', value: 15 }
    ],
    hideHover: 'auto'
  });

  // Fix for charts under tabs
  $('.box ul.nav a').on('shown.bs.tab', function () {
    area.redraw();
    donut.redraw();
    line.redraw();
  });

  /* The todo list plugin */
  $('.todo-list').todoList({
    onCheck  : function () {
      window.console.log($(this), 'The element has been checked');
    },
    onUnCheck: function () {
      window.console.log($(this), 'The element has been unchecked');
    }
  });

}); // End of use strict
