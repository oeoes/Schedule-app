<template>
    <div class="card border-0 p-3 mb-1 card-lecturer">
        <div class="row">
            <div class="col-2">
                <div class="rounded-circle" style="height: 65px; width: 65px; overflow: hidden">
                    <img class="img-fluid" :src="path" alt="">
                </div>
            </div>
            <div class="col-6">
                <div class="h2 mt-1">{{ name }}</div>
            </div>
            <div class="col-4 text-center">
                <div v-if="state == 'available'" class="btn btn-success state state-width">{{ state | uppercase }}</div>
                <div v-else class="btn btn-danger state state-width">{{ state | uppercase }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id', 'name', 'state', 'photo'],
    data (){
        return {
            path: 'http://localhost:8000/images/'+this.photo
        }
    },
    filters: {
        uppercase: function(value){
            return value.charAt(0).toUpperCase() + value.slice(1);
        }
    }
}
</script>

<style>

</style>
