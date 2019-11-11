/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.$ = window.jQuery = require('jquery');
/*
Installing jQueryUI
 */
require('jquery-ui');
require('jquery-ui/ui/widgets/sortable');
require('jquery-ui/ui/disable-selection');


$( function() {
    $("div#sortable").sortable({
        update: function( event, ui ) {
            var tasks = $('[data-id]');
            var token = $('meta[name="csrf-token"]').attr('content');
            var result = [];
            $.each(tasks, function(idx,item){
                var term = $(item).data('id');
                post_url = $(item).data('post-url');
                var readable_id = idx +1;
                var resultset = {
                    'id': term,
                    'position': idx
                };
                $('div.grip#'+term).text(readable_id);
                result.push(resultset);
            });
            var json_result = JSON.stringify(result);
            console.log(json_result);
            if ( post_url.length < 1 ){
                post_url = '/ajax/post';
            }
            $.ajaxSetup({
                headers:
                    { 'X-CSRF-TOKEN': token }
            });
            $.ajax({
                url: post_url,
                method: 'post',
                data: json_result,
                dataType: "json",
                contentType: "application/json",
                success: function(result){
                    $('.alert').show(function () {
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(300, function(){
                                $('.alert').hide();
                            });
                        }, 1000);
                    });
                    $(".alert").html(result.success);
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }
    });

});

require('./bootstrap-datepicker.min');
require('./bootstrap-datepicker.de.min');


$(document).ready(function () {

    $('#deadline input').datepicker({
        format: "dd.mm.yyyy",
        startDate: "+1d",
        endDate: "+60d",
        maxViewMode: 2,
        language: "de",
        daysOfWeekHighlighted: "0,6",
        todayHighlight: true
    });

    $('form button#deleteButton').on('click', function () {
        $(this.form).find('input[name=_method]').val('DELETE');
        $(this.form).submit();
    });
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});



