
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import CourseList from './components/CourseList.vue'
import CourseListFull from './components/CourseListFull.vue'

function Course({ initial, course_name, lecturer, sks, room, day, time }){
    this.initial = initial;
    this.course_name = course_name;
    this.lecturer = lecturer.name;
    this.sks = sks;
    this.room = room.room;
    this.day = day;
    this.time = time
}

const app = new Vue({
    el: '#app',
    data () {
        return {
            courses: [],
            myload: false,
            today: false
        }
    },
    components: {
        'course': CourseList,
        'course-full': CourseListFull
    },
    methods: {
        read: function(){
            window.axios.get('http://localhost:8000/schedule/list').then(({ data }) => {
                data.forEach(course => {
                    this.courses.push(new Course(course))
                });
            })
        },
        sortRoom: function(roomId){
            this.courses = [];
            this.myload = true
            setTimeout(() => {
                window.axios.get('http://localhost:8000/schedule/sort/room/'+roomId+'/'+this.today).then(({ data }) => {
                    data.forEach(course => {
                        this.courses.push(new Course(course))
                    });
                })
                this.myload = false
            }, 1500);
            console.log('http://localhost:8000/schedule/sort/room/'+roomId+'/'+this.today)        
        }
    },
    created() {
        this.read()
    },
});
