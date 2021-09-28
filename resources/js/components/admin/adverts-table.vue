<template>
    <div>
        <table class="table">
            <thead class=" text-primary">
            <tr>
                <th>
                    Image
                </th>
                <th>
                    Position - Number
                </th>
                <th>
                    Operation
                </th>

            </tr>
            </thead>
            <tbody>
            <adverts-table-row v-for="advertisement in advertisements.data" :advertisement="advertisement"></adverts-table-row>


            </tbody>
        </table>

        <pagination :data="advertisements" @pagination-change-page="getAdverts"></pagination>
    </div>
</template>

<script>

    import advertsTableRow from './layouts/adverts-table-row'

    export default {
        data() {
            return {
                advertisements: {},
                Laravel: window.Laravel
            }
        },
        mounted() {
            this.getAdverts();
        },
        methods: {
            getAdverts(page = 1) {
                axios.post('/admin/get-advertisements', {
                    page : page
                })
                .then(response => {
                    console.log(response.data);
                    this.advertisements = response.data;
                });
            }
        },
        components: {
            advertsTableRow
        }
    }
</script>
