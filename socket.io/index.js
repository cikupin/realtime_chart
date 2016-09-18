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

server.listen(PORT, function() {
	console.log('Server is running on port ' + PORT + '...');
});