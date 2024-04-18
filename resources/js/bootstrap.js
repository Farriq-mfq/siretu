import "flowbite"
import "./sidebar"
import { createIcons, icons } from 'lucide'
import Chart from 'chart.js/auto'
import jQuery from 'jquery';
import * as select2 from "select2";
// import 'select2/dist/css/select2.css'
import 'laravel-datatables-vite';
window.$ = jQuery;
window.Chart = Chart

select2($)

createIcons({
    icons
})

