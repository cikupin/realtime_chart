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
                    shadowSize: 0,
                    color: "#3c8dbc"
                },
                lines: {
                    fill: true,
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

            /************************* insert new data ******************************/
            function fetchNewData(newVal) {
                data = data.slice(1);
                data.push(newVal);

                // Zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;
            }

            function newData(newVal) {
                interactive_plot.setData([fetchNewData(newVal)]);
                interactive_plot.setupGrid();    // Update grid
                interactive_plot.draw();
            }

            socket.on('new_data', function(msg) {
                newData(msg);
            });
            /***********************************************************************/
         });
    </script>
</body>
</html>