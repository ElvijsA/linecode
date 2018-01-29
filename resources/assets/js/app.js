
require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = 'rfc3986';

import Buefy from 'buefy'
Vue.use(Buefy);

Vue.component('slugWidget', require('./components/slugWidget.vue'));
Vue.component('comment-widget', require('./components/commentWidget.vue'));

//Comment components
Vue.component('comment-message', require('./components/comment-system/commentMessage.vue'));
Vue.component('comment-log', require('./components/comment-system/commentLog.vue'));
Vue.component('comment-composer', require('./components/comment-system/commentComposer.vue'));

require('./manage');

$("iframe").parent().addClass("video-responsive")

$(document).ready(function(){
    $('button.dropdown').hover(function(e) {
        $(this).toggleClass('is-open')
    })
})
