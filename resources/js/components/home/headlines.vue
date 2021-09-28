<template>
    <div>


        <home-article :articles="latestposts" :language="language" ></home-article>


        <div class="cat-news" v-for="(catposts , name , index) in catsposts ">

            <div v-if="adverts[index] !== undefined" class="center-ads mt-4">
                <a :href="adverts[index].url" target="_blank">
                    <img :src="adverts[index].image" alt="">
                </a>
            </div>

            <h1 class="h5 mt-4 text-capitalize" v-text="catposts[0].title"></h1>

            <home-article :articles="catposts[1]"  :language="language"></home-article>





        </div>

        <!--<category-news :language="language" :adverts="adverts" :latestids="latestids"></category-news>-->


    </div>
</template>


<script>


    // import categoryNews from './headlines/category-news';
    import homeArticle from './shares/article.vue';

    export default {
        props : [
            'adverts',
            'latestposts',
            'latestids',
            'catsposts',
            'language',
        ],
        data(){
            return {
                Laravel : window.Laravel,
            }
        },
        mounted:function(){

        },
        components: {
            // categoryNews,
            homeArticle,
        }
    }
</script>