
require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = 'rfc3986';

import Buefy from 'buefy'
Vue.use(Buefy);

Vue.component('slugWidget', require('./components/slugWidget.vue'));
Vue.component('comment-widget', require('./components/commentWidget.vue'));

require('./manage');

$("iframe").parent().addClass("video-responsive")

$(document).ready(function(){
    $('button.dropdown').hover(function(e) {
        $(this).toggleClass('is-open')
    })
})
