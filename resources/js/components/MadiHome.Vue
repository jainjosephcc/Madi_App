<template>
    <div class="s130">

        <form>
            <div class="row">
                <img class="mb-5" src="images/madiIcon-02.png" style="width: 50%">
            </div>
            <div class="inner-form mt-5">

                <div class="input-field first-wrap">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg>
                    </div>
                    <input id="search" type="text" placeholder="English - മലയാളം" v-model="keywords"/>

                </div>
                <div class="input-field second-wrap">
                    <button v-on:click="searchWord" class="btn-search" type="button">SEARCH</button>
                </div>
            </div>
            <span class="info">ഇംഗ്ലീഷ് → മലയാളം നിഘണ്ടു</span>
            <template>
                <div>

                    <ul v-if="results.length > 0">
                        <li v-for="result in results" :key="result.id" v-text="result.malayalam_definition">{{result.malayalam_definition}}</li>
                    </ul>
                </div>
<!--                <p>{{results}}</p>-->
            </template>
        </form>


    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: null,
            results: [],
            awaitingSearch: false,
        };
    },
    watch: {
        keywords(after, before) {
            this.fetch()
        },


    },
    methods: {
        /*fetch() {
            axios.get('/searchWord', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});
        },*/
        searchWord: function (event) {
            // `this` inside methods points to the Vue instance
            axios.get('/searchWord', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});

        }
    }
}
</script>
