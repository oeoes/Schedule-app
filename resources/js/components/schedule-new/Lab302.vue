<template>
    <div class="col-md-4 mb-5">
        <div class="card border-0">
            <div class="card-img-top room-label">
                <div class="display-4 text-center">
                    LAB 302
                </div>
            </div>
            <div class="card-body shadow-sm">
                <div class="row">
                    <div class="col-1">
                        <div class="side-border">
                            <div class="point1"></div>
                            <div class="point2"></div>
                            <div class="point3"></div>
                        </div>
                    </div>
                    <div class="col-11">
                        <div class="h1">{{ course_name }}</div>
                        <hr>
                        <div class="row">
                            <div class="col-5">
                                <div class="rounded-circle" style="height: 150px; width: 150px; overflow: hidden">
                                    <img class="img-fluid" :src="path" alt="">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="h3">{{ lecturer }}</div>
                                    </div>
                                    <div class="col-12">
                                        <div v-if="status == 'queue'" class="h5 text-danger">Offline</div>
                                        <div v-else class="h5 text-success">Online</div>
                                    </div>
                                    <div class="col-12">
                                        <div v-if="status == 'queue'" class="btn btn-secondary status-class"><span class="">Belum Dimulai</span></div>
                                        <div v-else class="btn btn-success status-class"><span class="">Sudah Dimulai</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Table -->
                        <table class="table table-sm table-borderless mt-3">
                            <tr>
                                <th><i class="h1 fa fa-chalkboard-teacher"></i></th> 
                                <td><div class="h3 text-muted">{{ sks }} SKS</div></td>
                            </tr> 
                            <tr>
                                <th><i class="h1 far fa-clock"></i></th> 
                                <td><div class="h3 text-muted">{{ time_begin }} s/d {{ time_finish }}</div></td>
                            </tr>
                        </table>
                        <!-- Table -->
                    </div>
                </div>
            </div>

            <div class="card-img-bottom up-next">
                <div v-if="next_course != undefined" class="row">
                    <div class="col-5">
                        <div class="h2">Berikutnya</div>
                    </div>
                    <div class="col-7">
                        <div class="row h5">
                            <div class="col-12">{{ next_course }}</div>
                            <div class="col-12">Pada {{ next_time_begin }} - {{ next_time_finish }}</div>
                        </div>
                    </div>
                </div>
                <div v-else class="h1">
                    Final Class
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            path: 'http://localhost:8000/images/'+this.photo
        }
    },
    props: ['initial', 'course_name', 'lecturer', 'photo', 'sks', 'room', 'day', 'time_begin', 'time_finish', 'status', 'next_course', 'next_time_begin', 'next_time_finish'],
    filters: {
        upper: function(value){
            return value.charAt(0).toUpperCase() + value.slice(1);
        }
    }
}
</script>

<style>

</style>
