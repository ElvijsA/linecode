
require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy';

Vue.use(Buefy);

//Vue.component('example', require('./components/Example.vue'));


$("iframe").parent().addClass("video-responsive");

$(document).ready(function(){
    $('button.dropdown').hover(function(e) {
        $(this).toggleClass('is-open')
    });
});

require('./manage');
