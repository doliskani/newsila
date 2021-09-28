<template>
    <div class="form-show-res">
        <form :action="'/' + language + '/search-page'" class="input-group d-flex" autocomplete="off" method="post">
            <input type="hidden" name="_token" :value="Laravel.csrfToken">
            <div class="input-group-prepend">
                <button type="submit" class="mr-2 input-group-text border border-0">
                    <i class="fa fa-search text-dark"></i>
                </button>
            </div>
            <input type="text" name="search" id="search" class="form-control border border-0"
                   placeholder="Search for topics, locations & sources" @keyup="getSearchResult">
            <div class="input-group-append " title="Advanced search">
                   <span class="input-group-text border border-0 custom-search-caret" @click="customSearch">
                        <i class="fa fa-caret-down text-dark"></i>
                    </span>
            </div>
        </form>
        <div class="res-search d-none ">
            <div class="card mt-2">
                <div v-for="" class="card-body">
                    <a v-for="post in results" :href="`/${language}/news/${post.slug}`" class="card-link d-flex">
                        <div class="card-title" v-text=" post.title.length > 50 ? (post.title).substr(0, 50) + '...' : (post.title)"></div>
                    </a>
                    <div class="not-found">

                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
    export default {
        props : [
            'language'
        ],
        data() {
            return {
                results : {},
                Laravel : window.Laravel,
            }
        },
        methods : {
            customSearch(){
                $('.custom-search').toggleClass('d-none');
                $('.custom-search-caret').toggleClass('caret-up');
            },
            getSearchResult(){
                let val = $('#search').val();
                val = val.trim();
                if (val.length > 0){
                    let posts = {};
                    axios.post(`/${this.language}/search/${val}`, {
                        search: val
                    })
                    .then(response => {
                        console.log(response.data);
                        posts = response.data;
                        if (posts){
                            if (posts.length > 0){
                                this.results = posts;
                                $('.res-search').removeClass('d-none').find('.not-found').addClass('d-none').text('');
                            }else{
                                this.results = {};
                                $('.res-search').removeClass('d-none').find('.not-found').removeClass('d-none').text('Not found!');
                            }
                        }


                    })
                    .catch(error => console.info(error));
                }



            }
        },
        components : {

        }
    }
</script>