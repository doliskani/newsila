<template>
    <div>
        <div v-if="categoriesPosts.length > 0" class="cat-news" v-for="(categoryPosts , index) in categoriesPosts ">
            <div v-if="adverts[index + 2]" class="center-ads mt-4">
                <a :href="adverts[index + 2].url" target="_blank">
                    <img :src="adverts[index + 2].image" alt="">
                </a>
            </div>

            <h1 class="h5 mt-4 text-capitalize" v-text="categoryPosts[0].title"></h1>

            <home-article :articles="categoryPosts[1]" :language="language"></home-article>




        </div>

        <div class="loader-icon text-center text-info p-3 d-none">
            <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>

    </div>
</template>

<script>

    import homeArticle from '../shares/article.vue'

    export default {
        props: [
            'adverts',
            'latestids',
            'language',
        ],
        data() {
            return {
                Laravel: window.Laravel,
                categoriesPosts: {},
            }
        },
        mounted: function () {
            // console.log(this.latestids);
            let posts = [];
            let address = `/home/scroll/${this.language}`;
            let arr = [];
            let latestids= this.latestids;
            $(window).scroll(function () {
                let articlesCount = $('#headlines article').length;

                console.log([
                   ($(window).scrollTop()),
                    ($(document).height() - $(window).height())
                ]);
                if (Math.ceil($(window).scrollTop()) == ($(document).height() - $(window).height())

                ) {
                    console.log($('#single').length);

                    // ajax call get data from server and append to the div
                    axios.post(address, {
                        articlesCount: articlesCount,
                        latestids: latestids,
                    })
                    .then(response => {
                        console.log(response.data);


                        if (response.data[0]){
                            $('.loader-icon').removeClass('d-none');

                            setTimeout(function () {
                                $('.loader-icon').addClass('d-none');

                                setTimeout(function () {
                                    if (arr.indexOf((response.data[0])[0].title) == -1){
                                        arr.push((response.data[0])[0].title);
                                        arr.push((response.data[1])[0].title);
                                        posts.push(response.data[0]);
                                        posts.push(response.data[1]);
                                        $('#r-ads').find('a.d-none').first().removeClass('d-none');
                                    }

                                }, 300);
                            }, 500);

                        }

                    })
                    .catch(error => console.info(error));
                }
            });

            this.categoriesPosts = posts;

        },
        methods: {
            getInitialLast() {
                axios.post('/news/latest?page=' + page)
                    .then(response => {
                        this.tbPosts = response.data;
                    });
            }
        },
        components: {
            homeArticle
        }
    }
</script>