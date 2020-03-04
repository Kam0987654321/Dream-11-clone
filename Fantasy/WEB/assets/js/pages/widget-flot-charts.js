//[widget flot charts Javascript]

//Project:	Maximum Admin - Responsive Admin Template
//Version:	1.1.0
//Last change:	11/09/2017
//Primary use:   Used only for the  widget flot charts


$(function () {

    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 300

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid: {
            color: "#AFAFAF"
            , hoverable: true
            , borderWidth: 0
            , backgroundColor: '#FFF'
        },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#26C6DA'
      },
	  tooltip: true,
      lines : {
        fill : false, //Converts the line chart to area chart
        color: '#26C6DA'
      },
	  tooltipOpts: {
            content: "Visit: %y"
            , defaultTheme: false
        },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */

    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = []
    for (var i = -0.1; i < 8; i += 0.5) {
      sin.push([i, Math.sin(i)])
      cos.push([i, Math.cos(i)])
    }
    var line_data1 = {
      data : sin,
      color: '#26C6DA'
    }
    var line_data2 = {
      data : cos,
      color: '#FC4B6C'
    }
    $.plot('#line-chart', [line_data1, line_data2], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#26C6DA', '#FC4B6C']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({ top: item.pageY + 5, left: item.pageX + 5 })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */

    /*
     * FULL WIDTH STATIC AREA CHART
     * -----------------
     */
    var areaData = [[2.5, 48.0], [3.5, 83.4], [4.5, 112.4], [5.5, 118.4], [6.5, 125.7], [7.5, 129.7],
      [8.5, 124.6], [9.5, 110.3], [10.5, 145.3], [11.5, 155.4], [12.5, 156.5], [13.5, 151.7], [14.5, 169.9],
      [15.5, 185.4], [16.5, 147.8], [17.5, 148.2], [18.5, 189.5], [19.5, 190.0]]
    $.plot('#area-chart', [areaData], {
      grid  : {
        borderWidth: 0
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#1E88E5'
      },
      lines : {
        fill: true //Converts the line chart to area chart
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })

    /* END AREA CHART */

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [['Jan', 18], ['Feb', 8], ['Mar', 15], ['Apr', 20], ['May', 11], ['Jun', 3], ['Jul', 18], ['Aug', 8], ['Sep', 15], ['Oct', 20], ['Nov', 11], ['Dec', 3]],
      color: '#7460EE', borderWidth:'0.1'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.1,
		  lineWidth: 0,
		  fillColor:'#7460EE',
          align   : 'center',
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      { label: 'Jan-Apr', data: 45, color: '#FC4B6C' },
      { label: 'May-Aug', data: 32, color: '#26C6DA' },
      { label: 'Sep-Dec', data: 23, color: '#1E88E5' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.9,
          label      : {
          show       : true,
          radius     : 1,
          formatter  : labelFormatter,
          threshold  : 0.1,
		  background : {opacity: 0.5,color: '#000'}
          }
        }
      },
      legend: {
        show: true
      },
	  grid: {
        hoverable: true,
        clickable: true
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }


