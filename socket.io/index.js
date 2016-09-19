var http = require('http'),
	PORT = 3400;

var server = http.createServer(function(req, res) {});
var io = require('socket.io').listen(server);

io.on('connection', function(socket){
    console.log('a user is connected');

    socket.on('disconnect', function() {
        console.log('a user is disconnected')
    });
});

var MysqlEvents = require('mysql-events');
var dsn = {
    host: 'localhost',
    user: 'root',
    password: ''
}
var MysqlEventWatcher = MysqlEvents(dsn);

var watcher = MysqlEventWatcher.add('realtime_chart.chart_data', function(oldRow, newRow) {
    if(oldRow === null) {
        console.log(newRow);
    }

    if(oldRow !== null && newRow !== null) {
        console.log(oldRow);
        console.log(newRow);
    }
});

server.listen(PORT, function() {
	console.log('Server is running on port ' + PORT + '...');
});