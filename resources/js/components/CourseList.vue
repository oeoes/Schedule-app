<template>
    <div class="col-md-4 mb-4 list-reveal animated fadeIn">
        <div class="card border-0 shadow-sm card-course card-height">
            <div :class="randomColors()" class="text-center pt-3" style="width: 100%; height: 115px">
                <div class="display-3 white">{{ initial }}</div>
            </div>
            <div class="card-body">
                <div class="h2 card-title">{{ course_name }}</div>
                

                <table class="table table-sm table-borderless">
                    <tr>
                        <th><i class="h3 fa fa-user-tie"></i></th>
                        <td><div class="h5 text-muted">{{ lecturer }}</div></td>
                    </tr>
                    <tr>
                        <th><i class="h3 fa fa-chalkboard-teacher"></i></th>
                        <td><div class="h5 text-muted">{{ sks }} SKS</div></td>
                    </tr>
                    <tr>
                        <th><i class="h3 fa fa-map-marker-alt"></i></th>
                        <td><div class="h5 text-muted">{{ room }}</div></td>
                    </tr>
                    <tr>
                        <th><i class=" h3 far fa-calendar"></i></th>
                        <td><div class="h5 text-muted">{{ day | upper }}</div></td>
                    </tr>
                    <tr>
                        <th><i class="h3 far fa-clock"></i></th>
                        <td>
                            <div class="h5 text-muted">{{ time_begin }} - {{ time_finish }} </div>

                            <div v-if="status == 'queue'" class="btn btn-secondary status-class"><span class="">Belum Dimulai</span></div>
                            <div v-else-if="status == 'start'" class="btn btn-success status-class started"><span class="">Sudah Dimulai</span></div>
                            <div v-else class="btn btn-danger status-class animated shake"><span class="">Berakhir</span></div>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            colors: ['bg-navy', 'bg-blue', 'bg-aqua', 'bg-teal', 'bg-olive', 'bg-green', 'bg-lime', 'bg-yellow', 'bg-orange', 'bg-red',
            'bg-maroon', 'bg-fuchsia', 'bg-purple', 'bg-gray'],
            min: 0,
            max: 10
        }
    },
    props: ['initial', 'course_name', 'lecturer', 'sks', 'room', 'day', 'time_begin', 'time_finish', 'status'],
    filters: {
        upper: function(value){
            return value.charAt(0).toUpperCase() + value.slice(1);
        }
    },
    methods: {
        generateRandom: function(min, max){
            return Math.floor(Math.random() * (max - min +1)) + min;
        },
        randomColors: function(){
            return this.colors[this.generateRandom(this.min, this.max)]
        }
    }
}
</script>

<style>

</style>
