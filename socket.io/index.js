var http = require('http'),
	PORT = 3400;

var server = http.createServer(function(req, res) {});
var io = require('socket.io').listen(server);

// Define MySQL listener
var MysqlEvents = require('mysql-events');
var dsn = {
    host: 'localhost',
    user: 'root',
    password: ''
}
var MysqlEventWatcher = MysqlEvents(dsn);

// Set watcher to database
var watcher = MysqlEventWatcher.add('realtime_chart.chart_data', function(oldRow, newRow) {
    if(oldRow === null) {
        io.emit('new_data', newRow.fields.value);
    }
});

server.listen(PORT, function() {
	console.log('Server is running on port ' + PORT + '...');
});