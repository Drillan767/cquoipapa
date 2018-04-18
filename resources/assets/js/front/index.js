import React from 'react';
import ReactDOM from 'react-dom';
import Stats from './stats';
import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.bundle.min';

$('#carousel').carousel();

ReactDOM.render(
    <Stats/>,
    document.getElementById('stats')
);
