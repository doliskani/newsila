<template>
    <div>

        <div class="card-body">
            <div class="tab-content">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary"
                             style="background: #5f6863">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li v-for="(source , index) in sources" class="nav-item">
                                            <a :class="['nav-link' , index == 0 ? 'show active': '']"
                                              :href="'#' + source" data-toggle="tab">
                                                {{ source }}
                                            </a>


                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">

                                <source-posts v-for="(posts , source , loop) in sourcesposts" :posts="posts" :source="source" :loop="loop"></source-posts>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import sourcePosts from './source-posts.vue';

    export default {
        props : [
            'sourcesposts',
            'sources',
        ],
        data() {
            return {
                // sourcesposts : this.sourcesposts,
                // sources : this.sources,
            }
        },
        created() {
            console.log(this.sources);
            // axios.get('/admin/all-posts')
            //     .then(response => {
            //         console.log(response.data);
            //         this.sources = response.data[0];
            //         this.sources_posts = response.data[1];
            //     })
            //     .catch(error => console.log(error));
        },
        components : {  sourcePosts }
    }
</script>
