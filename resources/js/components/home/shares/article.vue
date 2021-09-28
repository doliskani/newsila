<template>
    <div>
        <article v-if="articles && articles.length > 0" class="border border-lg pb-0 p-3 mb-3 ">
            <div v-for="post in articles" class="card border-0">
                <a :href="'/' + language + '/news/' + post.slug "  target="_blank">
                    <h1 class="h5 text-dark font-weight-bold" v-html="ScapeHtml(post.title)">


                    </h1>
                </a>
                <div class="sub-title d-flex text-secondary">
                    <a :href="'/' + language + '/sources/' + post.source" class="source text-secondary text-decoration-none small">{{
                        (post.source).toUpperCase() }}</a>
                    <div class="dot ml-2 mr-2">.</div>
                    <div class="date small">{{ post.date }}</div>
                    <div class="shares points ml-2">
                        <a href="" class="ml-2 text-secondary " @click.prevent="like(post._id , 1 , $event)">
                            <i class="fa fa-thumbs-up"></i>
                        </a>
                        <span>{{ post.count_likes ? post.count_likes : 0 }}</span>
                        <a href="" class="ml-2  text-secondary "  @click.prevent="like(post._id , 0 , $event)">
                            <i class="fa fa-thumbs-down"></i>
                        </a>
                        <span>{{ post.count_dislikes ? post.count_dislikes : 0 }}</span>
                    </div>

                    <a href="" class="shares ml-2 " data-text="" target="_blank"
                       :data-title="getTitle(post.title , 60)"
                       data-cls="" :data-url="'/' + language + '/news/' + post.slug " data-toggle="modal" data-target="#shareLink">
                        <i class="fa fa-share-alt"></i>
                    </a>
                </div>



            </div>

        </article>
    </div>
</template>

<script>
    export default {
        props: [
            'articles',
            'language',
        ],
        data() {
            return {
                Laravel: window.Laravel,
            }
        },
        mounted : function () {
            // console.log(this.articles);
        },
        methods: {
            getTitle(title , length) {
               return title.length > length ? (title).substr(0, length) + '...' : title
            },

            like(id , like , event){
                // console.log();

                let act = event;
                let address = '/home/like/' + id + '/' + like + '/' + this.language;
                axios.get(address)
                .then(response => {
                    let postData = response.data;
                    // console.log();
                    $(event.target).parents('.points').find('span').first().text(postData.count_likes);
                    $(event.target).parents('.points').find('span').last().text(postData.count_dislikes);
                })
                .catch(error => console.info(error));
            },
            ScapeHtml(String) {
              return String
            }
        },
        filters: {

        }


    }
</script>