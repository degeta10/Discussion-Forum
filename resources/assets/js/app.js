
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueSweetalert2 from 'vue-sweetalert2';

require('./bootstrap');
window.Vue = require('vue');
Vue.use(VueSweetalert2)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('notification', require('./components/Notification.vue'));
Vue.component('discussion-comments', require('./components/DiscussionComments.vue'));

const app = new Vue({
    el: '#app',
    data: {
        notifications: [],
        comments: [],
    },
    created(){

        // axios.get('/user-notifications').then(response =>{
        //     this.notifications = response.data
        // });

        // var userID = $('meta[name="userID"]').attr('content');
        // Echo.private('App.User.'+userID).notification((notification) =>{
        //     this.notifications.push(notification);
        // });

        axios.post('/comments',{discussion_id: $('#discussion_id').val() }).then(response =>{
            this.comments = response.data
        });

        var userID = $('meta[name="userID"]').attr('content');
        Echo.private('App.User.'+userID).notification((comment) =>{
            if(comment.data.message.discussion_id ==  $('#discussion_id').val())
            {
                this.comments.push(comment.data.message);
            }
        });
    }
});

