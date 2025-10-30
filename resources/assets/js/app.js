/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Jquery
global.$ = global.jQuery = global.jquery = require('jquery');
// Bootstrap
require('bootstrap');
// browser-js
require('browser-js');
// Jquery Scrollex
require('jquery.scrollex');
// DataTable
window.datatables = require('datatables.net-bs4');
window.dt = require('datatables.net');
require('datatables.net-responsive');
require( 'datatables.net-buttons-bs4');
require( 'datatables.net-buttons/js/buttons.html5.js' );
require( 'datatables.net-buttons/js/buttons.print.js' );
require( 'datatables.net-buttons/js/buttons.colVis.js' );
// Select2
require('select2/dist/js/select2');
// Scripts
require('./scripts');
