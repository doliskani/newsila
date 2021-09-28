<template>
    <div class="card-header card-header-tabs card-header-primary" style=" z-index: 5 !important;">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper d-flex justify-content-between" style="height: 50px">
                <span class="nav-tabs-title text-uppercase font-weight-bold">All posts</span>
                <form class="navbar-form " id="search">
                      <span class="bmd-form-group ">
                            <div class="input-group no-border">
                                <input type="text" v-model="value" class="form-control" placeholder="Search..."
                                       @keyup="search">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                          </div>

                      </span>
                    <div class="posts-res" id="posts-res" v-if="visible">
                        <div class="exists" v-if="exists">
                            <div v-if="rows.length > 0" class="card" v-for="row in rows">
                                <div class="card-body d-flex justify-content-between">
                                    <a :href="'/news/' + row.slug + '/' + row.lang " target="_blank" class="card-link">{{ row.title.substr(0 , 20) }}</a>
                                </div>
                            </div>
                        </div>
                        <div v-else class="not-exists">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    Not found!
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                value: '',
                exists: false,
                visible: false,
                rows: {},

            }
        },
        methods: {
            search() {
                if (this.value.length > 0){
                    let elem = $('.posts-res').removeClass('d-none');
                    // elem.classList.remove('d-none');
                    axios.post('/admin/posts/search?value=' + this.value)
                        .then(response => {
                            this.rows = response.data;
                            if (this.rows.length > 0) {
                                this.visible = true;
                                this.exists = true;
                            }else{
                                this.visible = true;
                                this.exists = false;
                            }
                        });
                }else{
                    this.visible = false;
                    this.exists = false;
                }

            }
        },
        mounted() {

        }
    }
</script>