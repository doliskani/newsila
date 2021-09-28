<template>
    <div id="search-site">

        <form-show-result :language="language"></form-show-result>

        <custom-search :language="language"></custom-search>

    </div>
</template>

<script>
    import customSearch from './search/custom-search.vue'
    import formShowResult from './search/show-result'
    export default {
        props : [
          'language'
        ],
        components : {
            customSearch,
            formShowResult,
        }
    }
</script>