<template>
    <tr>
        <td class="">
            <a :href="advertisement.url">
                <img :src="advertisement.image" alt="">
            </a>
        </td>
        <td class="" v-text="position()">


        </td>
        <td class="td-actions text-right d-flex flex-row-reverse justify-content-end">
            <form :action="'/admin/advertisements/' + advertisement._id" method="post">
                <input type="hidden" name="_token" :value="Laravel.csrfToken">
                <input type="hidden" name="_method" value="delete">
                <a :href="'/admin/advertisements/publish/' + advertisement._id"
                   type="button" title=""
                   :class="'btn  btn-sm mr-3 publish ' + ((advertisement.publish == 'off') ? 'btn-success' : 'btn-danger')"
                   data-original-title="Publish or Not" @click.prevent="publishAdvert()">
                    {{ ((advertisement.publish == 'off') ? 'publish' : 'cancel') }}
                </a>
                <a :href="'/admin/advertisements/' + advertisement._id + '/edit'"
                   type="button" rel="tooltip" title=""
                   class="btn btn-primary btn-link btn-sm"
                   data-original-title="Edit Task"
                   aria-describedby="tooltip474024">
                    <i class="material-icons">edit</i>
                </a>

                <button type="submit" rel="tooltip" title=""
                        class="btn btn-danger btn-link btn-sm"
                        data-original-title="Remove">
                    <i class="material-icons">close</i>
                </button>
            </form>

        </td>
    </tr>

</template>

<script>


    export default {
        props: ['advertisement'],
        data() {
            return {
                Laravel: window.Laravel,
                publish: '',
                btnCls: '',
            }
        },
        methods: {
            publishAdvert() {

                axios.post(`/admin/advertisements/publish/${this.advertisement._id}`)
                    .then(response => {
                        console.log(response.data);
                        this.advertisement = response.data;
                    })
                    .catch(error => console.log(error));

            },

            position() {
                let ret;
                if (this.advertisement.position){
                    ret = (this.advertisement.position).toUpperCase() + " - " +
                          (this.advertisement.ad_number).toUpperCase();
                } else{
                    if (this.advertisement.category_id == "other")
                        ret = "other pages";
                    else
                        ret = this.advertisement.category.title;
                }
                return ret;
            }
        }
    }
</script>
