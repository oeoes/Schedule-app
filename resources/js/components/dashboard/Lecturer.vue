<template>
    <div class="card border-0 p-3 mb-1 card-lecturer">
        <div class="row">
            <div class="col-2">
                <div class="rounded-circle bg-teal" style="height: 65px; width: 65px">
                
                </div>
            </div>
            <div class="col-6">
                <div class="h2 mt-1">{{ name }}</div>
            </div>
            <div class="col-4">
                <div class="row no-gutters">
                    <div class="col-4">
                        <div class="mypreload">
                            <span v-if="okload" class="myload text-center animated zoomIn" style="animation-duration: .2s">
                                <div class="spinner-border text-primary" style="width: 1.5rem; height: 1.5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </span>
                            <div v-if="checkload" class="h4 text-muted pt-2 text-center animated zoomIn" style="animation-duration: .2s"><i class="fa fa-check text-success"></i></div>
                        </div>                        
                    </div>
                    <div class="col-8">
                        <label class="switch">
                            <input @click="update" v-if="state == 'available'" type="checkbox" checked>
                            <input @click="update" v-else type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id', 'name', 'state'],
    data() {
        return {
            certaian_state: this.state,
            okload: false,
            checkload: false
        }
    },
    methods: {
        update: function() {
            this.okload = true
            setTimeout(() => {
                this.okload = false
            }, 1000);
            
            setTimeout(() => {
                this.checkload = true
            }, 1080);

            setTimeout(() => {
                this.checkload = false
            }, 2800);

            this.$emit('update', this.id)
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
