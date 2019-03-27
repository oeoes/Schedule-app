<template>
    <div class="col-md-4 mb-5">
        <div class="card border-0">
            <div class="card-img-top room-label">
                <div class="display-4 text-center">
                    LAB 402
                </div>
            </div>
            <div class="card-body shadow-sm min-height">
                <div class="row mt-5 pt-4">
                    <div class="col-8 offset-2">
                        <img :src="path" alt="" width="100%" style="opacity: .3">
                    </div>
                </div>
            </div>

            <div class="card-img-bottom up-next">
                <div class="h2 text-center">Tidak ada perkuliahan...</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
   data () {
       return {
           path: 'http://localhost:8000/images/sad.gif'
       }
   }
}
</script>

<style>
    
</style>
