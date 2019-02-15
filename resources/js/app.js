
require('./bootstrap');

window.Vue = require('vue');

import CourseList from './components/CourseList.vue'
import CourseListFull from './components/CourseListFull.vue'
import LecturerList from './components/dashboard/Lecturer.vue'
import LecturerIndex from './components/Lecturer.vue'
import Lab301 from './components/schedule-new/Lab301.vue'
import Lab302 from './components/schedule-new/Lab302.vue'
import Lab303 from './components/schedule-new/Lab303.vue'

// Construct Course data
function Course({ initial, course_name, lecturer, sks, room, day, time_begin, time_finish, status }){
    this.initial = initial;
    this.course_name = course_name;
    this.lecturer = lecturer.name;
    this.sks = sks;
    this.room = room.room;
    this.day = day;
    this.time_begin = time_begin;
    this.time_finish = time_finish;
    this.status = status
}

function Lab301_Const({ initial, course_name, lecturer, sks, room, day, time_begin, time_finish, status, next_course, next_time_begin, next_time_finish, photo }){
    this.initial = initial;
    this.course_name = course_name;
    this.lecturer = lecturer.name;
    this.sks = sks;
    this.room = room.room;
    this.day = day;
    this.time_begin = time_begin;
    this.time_finish = time_finish;
    this.status = status,
    this.next_course = next_course,
    this.next_time_begin = next_time_begin,
    this.next_time_finish = next_time_finish
    this.photo = lecturer.photo
}

function Lab302_Const({ initial, course_name, lecturer, sks, room, day, time_begin, time_finish, status, next_course, next_time_begin, next_time_finish, photo }){
    this.initial = initial;
    this.course_name = course_name;
    this.lecturer = lecturer.name;
    this.sks = sks;
    this.room = room.room;
    this.day = day;
    this.time_begin = time_begin;
    this.time_finish = time_finish;
    this.status = status,
    this.next_course = next_course,
    this.next_time_begin = next_time_begin,
    this.next_time_finish = next_time_finish
    this.photo = lecturer.photo
}

function Lab303_Const({ initial, course_name, lecturer, sks, room, day, time_begin, time_finish, status, next_course, next_time_begin, next_time_finish, photo }){
    this.initial = initial;
    this.course_name = course_name;
    this.lecturer = lecturer.name;
    this.sks = sks;
    this.room = room.room;
    this.day = day;
    this.time_begin = time_begin;
    this.time_finish = time_finish;
    this.status = status,
    this.next_course = next_course,
    this.next_time_begin = next_time_begin,
    this.next_time_finish = next_time_finish
    this.photo = lecturer.photo
}

// Construct Lecturer data
function Lecturer({ id, name, state, photo }){
    this.id = id;
    this.name = name;
    this.photo = photo;
    this.state = state;
}

// Construct Lecturer data for index page
function LecturerForIndex({ id, name, state, photo }){
    this.id = id;
    this.name = name;
    this.state = state;
    this.photo = photo
}

const app = new Vue({
    el: '#app',
    data () {
        return {
            courses: [],
            lecturers_index: [],
            lecturers: [],
            myload: false,
            today: false,
            lecturer_name: '',
            lab301_arr: [],
            lab302_arr: [],
            lab303_arr: []
        }
    },
    components: {
        'course': CourseList,
        'course-full': CourseListFull,
        'lecturer': LecturerList,
        'lecturer-index': LecturerIndex,
        'lab-301': Lab301,
        'lab-302': Lab302,
        'lab-303': Lab303,
    },
    methods: {
        // Getting available courses from db
        read: function(){
            window.axios.get('http://localhost:8000/schedule/list').then(({ data }) => {
                data.forEach(course => {
                    this.courses.push(new Course(course))
                });
                console.log(data)
            })
        },
        // Getting new data if there's a change
        active_class: function(){
            window.axios.get('http://localhost:8000/schedule/list/state').then(({ data }) => {
                // Check if data exists
                if(data.length > 0){
                    this.courses = []
                    data.forEach(course => {
                        this.courses.push(new Course(course))
                    });
                }
            })
        },
        // Sort course based on room
        // there are two parameters: roomId and today, roomId is required and today is optional
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
        },
        // Getting lecturers from db
        lecturer: function(){
            window.axios.get('http://localhost:8000/schedule/dashboard/api/lecturers').then(({ data }) => {
                data.forEach(lecturer => {
                    this.lecturers.push(new Lecturer(lecturer))
                });
            })
        },
        // Getting lecturers data for index page (user) aka dosen page 
        lecturer_for_index: function(){
            window.axios.get('http://localhost:8000/schedule/api/lecturers').then(({ data }) => {
                data.forEach(lecturerindex => {
                    this.lecturers_index.push(new LecturerForIndex(lecturerindex))
                });
            })
        },
        // Update dosen availablity
        update: function(id){
            // Find lecturer by id inside vue array
            let item = this.lecturers.find(lect => lect.id == id)
            // Then, get the index of found lecturer inside vue array
            let getIndex = this.lecturers.indexOf(item)

            // Hit the uri with @param id to db (actual lecturer)
            var uri = 'http://localhost:8000/schedule/dashboard/api/lecturers/'+id;
            
            // Axios with method GET
            window.axios.get(uri).then(({ data }) => {
                // The response will be pushed to specified index from array
                // and it'll replace the old one
                this.lecturers[getIndex] = data
            })
        },
        // Adding new lecturer 
        addLecturer: function(){
            this.lecturers = []
            // Axios with method GET, it should use POST method, i'll figure it out later :)
            window.axios.get('http://localhost:8000/schedule/dashboard/api/lecturers/add/'+this.lecturer_name).then(({ data }) => {
                data.forEach(lecturer => {
                    this.lecturers.push(new Lecturer(lecturer))
                });
            })
            this.lecturer_name = ''
        },
        // Do nothing, but it is useful
        nothing: function(){
            // Nothing
        },
        // Getting data for Lab
        lab301_func: function(){
            window.axios.get('http://localhost:8000/preview/api/301').then(({ data }) => {
                data.forEach(lab => {
                    this.lab301_arr.push(new Lab301_Const(lab))
                });
            })
        },
        
        lab302_func: function(){
            window.axios.get('http://localhost:8000/preview/api/302').then(({ data }) => {
                data.forEach(lab => {
                    this.lab302_arr.push(new Lab302_Const(lab))
                });
            })
        },
        lab303_func: function(){
            window.axios.get('http://localhost:8000/preview/api/303').then(({ data }) => {
                data.forEach(lab => {
                    this.lab303_arr.push(new Lab303_Const(lab))
                });
            })
        },

        check301: function(){
            window.axios.get('http://localhost:8000/preview/api/301/check').then(({ data }) => {
                this.lab301_arr[0].status = data[0].status
            })
        },

        check302: function(){
            window.axios.get('http://localhost:8000/preview/api/301/check').then(({ data }) => {
                this.lab302_arr[0].status = data[0].status
            })
        },
        check303: function(){
            window.axios.get('http://localhost:8000/preview/api/303/check').then(({ data }) => {
                this.lab303_arr[0].status = data[0].status
            })
        },
    },
    // The functions inside created function will automatically executed
    created() {
        this.read()

        this.lecturer_for_index()
        this.lecturer()

        this.lab301_func()
        this.lab302_func()
        this.lab303_func()

        // setInterval(() => {
        //     this.lab301_arr = []
        //     this.lab302_arr = []
        //     this.lab303_arr = []
        //     this.lab301_func()
        //     this.lab302_func()
        //     this.lab303_func()
        // }, 10000);
        setInterval(() => {
            this.check301()
            this.check302()
            this.check303()
        }, 1000);

        // Execute lecturer_for_index function every 10 seconds
        setInterval(() => {
            this.lecturers_index = []
            this.lecturer_for_index()
        }, 30000);

        // Check for course status for every 1 second, the statuses are: start, end, queue
        setInterval(() => {
            this.active_class()
        }, 1000);
    },
});
