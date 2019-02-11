
require('./bootstrap');

window.Vue = require('vue');

import CourseList from './components/CourseList.vue'
import CourseListFull from './components/CourseListFull.vue'
import LecturerList from './components/dashboard/Lecturer.vue'
import LecturerIndex from './components/Lecturer.vue'

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

// Construct Lecturer data
function Lecturer({ id, name, state }){
    this.id = id;
    this.name = name;
    this.state = state;
}

// Construct Lecturer data for index page
function LecturerForIndex({ id, name, state }){
    this.id = id;
    this.name = name;
    this.state = state;
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
            lecturer_name: ''
        }
    },
    components: {
        'course': CourseList,
        'course-full': CourseListFull,
        'lecturer': LecturerList,
        'lecturer-index': LecturerIndex
    },
    methods: {
        // Getting available courses from db
        read: function(){
            window.axios.get('http://localhost:8000/schedule/list').then(({ data }) => {
                data.forEach(course => {
                    this.courses.push(new Course(course))
                });
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
            window.axios.get('http://localhost:8000/schhpedule/dashboard/api/lecturers/add/'+this.lecturer_name).then(({ data }) => {
                data.forEach(lecturer => {
                    this.lecturers.push(new Lecturer(lecturer))
                });
            })
            this.lecturer_name = ''
        },
        // Do nothing, but it is useful
        nothing: function(){
            // Nothing
        }
    },
    // The functions inside created function will automatically executed
    created() {
        this.read()
        this.lecturer_for_index()
        this.lecturer()

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
