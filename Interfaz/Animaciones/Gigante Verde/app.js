const express = require('express');
const app = express();

app.set('view engine', 'pug');

app.get('/', function (req, res) {
    res.render('gigante', { title: 'Hey', message: 'Hello there!' });
});