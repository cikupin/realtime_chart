<!DOCTYPE html>
<html>
<head>
	<title>Realtime Chart</title>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="http://www.flotcharts.org/flot/jquery.flot.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script>
        var socket = io('http://localhost:3400');
    </script>

</head>

<body>
    <div id="interactive" style="height: 300px;"></div>

    <script>
        $(function () {
            var data = [];

            function getRandomData() {
                <?php while($val = $result->fetch_assoc()) { ?>
                    data.push(<?php echo $val['value']; ?>);
                <?php } ?>

                // Zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;
            }

            var interactive_plot = $.plot("#interactive", [getRandomData()], {
                grid: {
                    borderColor: "#f3f3f3",
                    borderWidth: 1,
                    tickColor: "#f3f3f3"
                },
                series: {
                    shadowSize: 0, // Drawing is faster without shadows
                    color: "#3c8dbc"
                },
                lines: {
                    fill: true, //Converts the line chart to area chart
                    color: "#3c8dbc"
                },
                yaxis: {
                    min: 0,
                    max: Math.max.apply(Math, data),
                    show: true
                },
                xaxis: {
                    show: true
                }
            });

            /************************* new data ******************************/
            function fetchNewData() {
                data = data.slice(10);

                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(50000000);

                // Zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;

            }

            var update_plot = $.plot("#interactive", [], {
                grid: {
                    borderColor: "#f3f3f3",
                    borderWidth: 1,
                    tickColor: "#f3f3f3"
                },
                series: {
                    shadowSize: 0, // Drawing is faster without shadows
                    color: "#3c8dbc"
                },
                lines: {
                    fill: true, //Converts the line chart to area chart
                    color: "#3c8dbc"
                },
                yaxis: {
                    min: 0,
                    max: Math.max.apply(Math, data),
                    show: true
                },
                xaxis: {
                    show: true
                }
            });

            function newData() {
                update_plot.setData([fetchNewData()]);
                update_plot.setupGrid();    // Update grid
                update_plot.draw();
            }
            newData();
            /*******************************************************/

            /***************** new data 2 **************************/
            function fetchNewData2() {
                data = data.slice(10);

                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(100000000);

                // Zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;

            }

            var update_plot = $.plot("#interactive", [], {
                grid: {
                    borderColor: "#f3f3f3",
                    borderWidth: 1,
                    tickColor: "#f3f3f3"
                },
                series: {
                    shadowSize: 0, // Drawing is faster without shadows
                    color: "#3c8dbc"
                },
                lines: {
                    fill: true, //Converts the line chart to area chart
                    color: "#3c8dbc"
                },
                yaxis: {
                    min: 0,
                    max: Math.max.apply(Math, data),
                    show: true
                },
                xaxis: {
                    show: true
                }
            });

            function newData2() {
                update_plot.setData([fetchNewData2()]);
                update_plot.setupGrid();    // Update grid
                update_plot.draw();
            }
            newData2();
            /*******************************************************/

            /*********************** new data 3 ********************************/
            function fetchNewData3() {
                data = data.slice(10);

                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(9999999);
                data.push(40000000);

                // Zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;

            }

            var update_plot = $.plot("#interactive", [], {
                grid: {
                    borderColor: "#f3f3f3",
                    borderWidth: 1,
                    tickColor: "#f3f3f3"
                },
                series: {
                    shadowSize: 0, // Drawing is faster without shadows
                    color: "#3c8dbc"
                },
                lines: {
                    fill: true, //Converts the line chart to area chart
                    color: "#3c8dbc"
                },
                yaxis: {
                    min: 0,
                    max: Math.max.apply(Math, data),
                    show: true
                },
                xaxis: {
                    show: true
                }
            });

            function newData3() {
                update_plot.setData([fetchNewData3()]);
                update_plot.setupGrid();    // Update grid
                update_plot.draw();
            }
            newData3();
            /*******************************************************/
         });
    </script>
</body>
</html>