/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

const $ = require('jquery');

// start the Stimulus application
import './bootstrap';

require('bootstrap');
require("bootstrap-datepicker");

import { OhlcElement, OhlcController, CandlestickElement, CandlestickController } from 'chartjs-chart-financial'

import Chart from 'chart.js/auto';

import 'chartjs-adapter-luxon';

require('chartjs-plugin-crosshair');
require('chartjs-plugin-streaming');
require('chartjs-plugin-zoom');

Chart.register(OhlcElement, OhlcController, CandlestickElement, CandlestickController);

$(document).ready(() => {
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
})
