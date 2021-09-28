<template>
    <div class="custom-search d-none">
        <form :action="'/' + language + '/custom-search'" class="card mt-2 w-100" autocomplete="off" method="post">
            <input type="hidden" name="_token" :value="Laravel.csrfToken">
            <div class="card-body">
                <h5>Narrow your search results</h5>
                <div class="d-flex">
                    <span>Exact phrase</span>
                    <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="text" name="phrase"/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <!--<span class="input__label-content input__label-content&#45;&#45;hoshi">Name</span>-->
                            </label>
                        </span>
                </div>
                <div class="d-flex">
                    <span>Has words</span>
                    <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="text" name="has_words"/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <!--<span class="input__label-content input__label-content&#45;&#45;hoshi">Name</span>-->
                            </label>
                        </span>
                </div>
                <div class="d-flex">
                    <span>Exclude words</span>
                    <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="text" name="exclude_words"/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <!--<span class="input__label-content input__label-content&#45;&#45;hoshi">Name</span>-->
                            </label>
                        </span>
                </div>
                <div class="d-flex">
                    <span>Website</span>
                    <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="text" name="website"/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <!--<span class="input__label-content input__label-content&#45;&#45;hoshi">Name</span>-->
                            </label>
                        </span>
                </div>

                <div class="form-group d-flex mt-2">
                    <span for="staticEmail" class=" col-form-label">Date</span>
                    <select id="staticEmail" class="form-control ml-3" name="date">
                        <option value="AnyTime">Anytime</option>
                        <option value="PastHour">Past hour</option>
                        <option value="Past24Hour">Past 24 hour</option>
                        <option value="PastWeek">Past week</option>
                        <option value="PastYear">Past year</option>
                    </select>
                </div>


                <div class="d-flex mt-4">
                    <span></span>
                    <span class="input input--hoshi text-right">
                        <button type="submit" class="btn  btn-outline-primary">Search</button>
                    </span>
                </div>

            </div>

        </form>
    </div>
</template>

<script>
    export default {
        props : [
            'language'
        ],
        data() {
            return {
                Laravel: window.Laravel,
            }
        },
    }
</script>