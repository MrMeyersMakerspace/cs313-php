const http = require('http');
const url = require('url');
const fs = require('fs');

const server = http.createServer(function onRequest(request, response) {
    if (request.url == '/home') {
        response.writeHead(200, {"Content-Type": "application/json"});
        response.write("Welcome to the Home Page");
        response.end();
    } else if (request.url == '/getData') {
        var jsonData = {"name":"John Meyers","class":"CS313"}
        var jsonObj = JSON.stringify(jsonData);
        response.writeHead(200, {"Content-Type": "application/json"});
        response.write(jsonObj);
        response.end();
    } else {
        response.writeHead(404, {"Content-Type": "text/html"});
        response.write("Error 404:  Page Not Found");
        response.end();
    }
});
server.listen(8888);