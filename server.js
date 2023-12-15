var express = require('express');
const app = express();

// Create server
const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: { origin: "*"},
});
var users = [];
// build connection
io.on('connection', (socket) => {
    console.log('connection');

    socket.on("user_connected", function (user_id) {
        // Store the user's socket ID in the users array
        users[user_id] = socket.id;
        // Emit 'updateUserStatus' event to all connected clients
        io.emit('updateUserStatus', users);
        console.log("user connected: " + user_id);
    });

    // send message to server
    socket.on("sendChatToServer", (message) => {
        console.log(message);
        io.sockets.emit('sendChatToClient', message);
    });
    // Emit an event to the connected client(s)

    socket.on('disconnect', (socket) => {
        var i = users.indexOf(socket.id);
        users.splice(i, 1, 0);
        io.emit('updateUserStatus', users);
        console.log(users);
    });
});

server.listen(3000, () => {
    console.log('Server is listening on port 3000');
});

