<template>
    <div class="container">
        <div v-if="!show_page">
            <nav class="level mb-0">
                <div class="level-left">
                    <h1 class="title is-3 has-text-centered mt-4 mb-0">Filmes {{ subheader }}</h1>
                </div>
                <div class="level-right">
                    <div class="field is-horizontal mt-4 mb-0">
                        <label class="label mt-2 mr-3">Títulos Por pagina</label>
                        <div class="field">
                            <div class="select">
                                <select v-model="per_page">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <titles-paginate :pages="pages"></titles-paginate>
            <titles-table @showTitle="showPage($event)"></titles-table>
        </div>
        <title-show v-else :title="title" @showTable="show_page = !show_page"></title-show>
    </div>
</template>

<script>
import TitlesPaginate from "./components/TitlesPaginate";
import TitlesTable from "./components/TitlesTable";
import TitleShow from "./components/TitleShow";

export default {
    name: "Titles",
    components: {
        TitlesPaginate,
        TitlesTable,
        TitleShow
    },
    props: {
        subheader: String
    },
    data() {
        return {
            pages: null,
            show_page: false,
            title: null,
            pp: 10,
        }
    },
    computed: {
        channel() {
            return this.$store.getters.getChannel
        },
        per_page() {
            return this.$store.getters.getPerPage
        }
    },
    watch: {
        pp() {
            axios.get(`/api/per-page/${pp}`).then(response => {
                this.$store.commit('SET_PER_PAGE', this.pp())
            }).catch(errors => console.log(errors));
        }
    },
    methods: {
        showPage(event) {
            console.log(event)
            this.show_page = true
            this.title = event
        }
    },
    beforeMount() {
        axios.get(`/api/movies/frontend-start/${this.channel}`).then(response => {
            this.pages = response.data[0]
            this.pp = this.$store.getters.getPerPage
            // this.$store.commit('SET_PAGES', response.data[0])
            this.$store.commit('SET_TITLES', response.data[1])
        })
    }
}
</script>

<style scoped>

</style>
