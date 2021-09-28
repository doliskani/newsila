<template>
    <div>

        <home-article :language="language" :articles="arraySlice(0 , 10)"></home-article>


        <div v-if="ownadvert != 'empty'" class="center-ads mt-4 mb-4  d-none">
            <a :href="ownadvert.url" target="_blank">
                <img :src="ownadvert.image" alt="">
            </a>
        </div>

        <home-article :language="language" :articles="arraySlice(10 , 20)"></home-article>


        <pagination class="mt-5" :data="categoryPosts" :limit="4" @pagination-change-page="getResults"></pagination>


        <h6 class="pl-5 not-found d-none">No results found.</h6>


    </div>
</template>

<script>

    import homeArticle from './shares/article.vue'


    export default {
        props: [
            'obj',
            'type',
            'language',
            'ownadvert',
        ],
        data() {
            return {
                Laravel: window.Laravel,
                categoryPosts: {},
                address: "",
            }
        },
        mounted: function () {
            let type = this.type;
            this.address = this.getAddress(type);
            this.getResults(1);

            // win.scrollTop($(document).height() - win.height() + 200);


        },
        methods: {
            getAddress(type) {
                let address;
                if (type == "cat")
                    address = `/categories/${this.obj.slug}`;
                if (type == "sources")
                    address = `/sources/${this.obj.name}`;
                else if (type == "tag")
                    address = `/tags/${this.obj.title}`;
                else if (type == "search") {
                    if ((this.obj).length > 0)
                        address = `/search-paginate/${this.obj}`;
                    else
                        address = `/search-paginate/emptySearch`;
                } else if (type == "custom-search")
                    address = `/custom-search-paginate`;
                else if (type == "fav")
                    address = `/favorites`;
                else if (type == "headlines")
                    address = `/headlines`;

                address =`/${this.language}` +  address;

                console.log(address);

                return address ;


            },

            getResults(page = 1) {
                axios.post(`${this.address}?page=` + page , {
                    obj : this.obj
                })
                .then(response => {
                    if (response.data.data.length > 0){
                        console.log(response.data.data);
                        this.categoryPosts = response.data;
                        $('.center-ads').removeClass('d-none');

                        let currentTop = $(document).scrollTop();
                        if (currentTop > 100){
                            $([document.documentElement, document.body]).animate({
                                scrollTop: $("#categories").offset().top
                            }, 700);
                        }
                    }
                    else if (page == 1){
                        $('.not-found').removeClass('d-none');
                    }
                })
                .catch(error => console.info(error));

            },

            arraySlice(start, end) {
                if (this.categoryPosts.data)
                    return (this.categoryPosts.data).slice(start, end);
            }
        },
        components: {
            homeArticle
        }
    }
</script>