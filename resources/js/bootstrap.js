import "flowbite"
import "./sidebar"
import { createIcons, icons } from 'lucide'
import Chart from 'chart.js/auto'

import jQuery from 'jquery';
window.$ = jQuery;
window.Chart = Chart
createIcons({
    icons
})

