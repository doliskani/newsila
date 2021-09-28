<template>
    <div :class="['tab-pane' , loop == 0 ? 'show active': '']"
         :id="source">
        <table class="table">
            <thead class=" text-primary">
            <tr>
                <th>
                    Title
                </th>
                <th>
                    Category
                </th>
                <th>
                    Date
                </th>
                <th class="text-right pr-4">
                    Operation
                </th>

            </tr>
            </thead>
            <tbody>

            <tr v-for="post in tbPosts.data">
                <td class="">
                    {{ post.title }}
                </td>
                <td class="">
                    {{ post.categories[0].title }}
                </td>
                <td class="">
                    {{ post.date }}
                </td>
                <td class="td-actions text-right d-flex flex-row-reverse pr-4">
                    <form :action="'/admin/posts/' + post._id"
                          method="post">
                        <input type="hidden" name="_token" :value="Laravel.csrfToken">
                        <input type="hidden" name="_method" value="delete">
                        <a :href=" '/' + post.lang + '/news/' + post.slug" type="button"
                           rel="tooltip" title=""
                           class="btn btn-primary btn-link btn-sm"
                           data-original-title="Show news"
                           aria-describedby="tooltip474024"
                           target="_blank">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <button type="submit" rel="tooltip" title=""
                                class="btn btn-danger btn-link btn-sm"
                                data-original-title="Remove">
                            <i class="material-icons">close</i>
                        </button>
                    </form>

                </td>
            </tr>


            </tbody>
        </table>


        <pagination :data="tbPosts" :limit="10" @pagination-change-page="getResults"></pagination>


    </div>
</template>

<script>
    export default {
        props: ['posts', 'source', 'loop'],
        data() {
            return {
                Laravel: window.Laravel,
                tbPosts: this.posts,
            }
        },
        methods: {
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.post('/admin/posts/pagination?page=' + page + '&source=' + this.source)
                    .then(response => {
                        this.tbPosts = response.data;
                    });
            }
        }
    }
</script>