import React from 'react';
import ReactDOM from 'react-dom';
import Stats from './stats';
import Contact from '../components/CreateContact';
import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.bundle.min';

$('#carousel').carousel();

ReactDOM.render(
    <Stats/>,
    document.getElementById('stats')
);

ReactDOM.render(
    <Contact/>,
    document.getElementById('contacts')
);