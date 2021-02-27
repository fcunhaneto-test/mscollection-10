<template>
    <div class="container mb-6">
        <div v-if="!show_page">
            <div class="columns mb-0">
                <div class="column is-8-widescreen">
                    <h1 class="title is-3 has-text-centered mt-4 mb-0">{{ header }} {{ subheader }}</h1>
                </div>
                <div class="column is-4-widescreen">
                    <div class="field is-horizontal mt-4 mb-0">
                        <label class="label mt-2 mr-3">Títulos Por pagina</label>
                        <div class="field">
                            <div class="select">
                                <select v-model="pp">
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
            </div>
            <titles-paginate :pages="pages"></titles-paginate>
            <titles-table @showTitle="showPage($event)"></titles-table>
        </div>
        <div v-else>
            <movie-form v-if="table === 'movies'" :title="title" @closeEditForm="show_page = !show_page"></movie-form>
        </div>
    </div>
</template>

<script>
import TitlesAdminPaginate from "./components/TitlesAdminPaginate"
import TitlesAdminTable from "./components/TitlesAdminTable";
import MovieFormEdit from "./components/MovieFormEdit";

export default {
    name: "TitlesAdmin",
    components: {
        titlesPaginate: TitlesAdminPaginate,
        titlesTable: TitlesAdminTable,
        movieForm: MovieFormEdit,
    },
    props: {
        header: String,
        subheader: String
    },
    data() {
        return {
            pages: null,
            show_page: false,
            title: null,
            pp: null,
        }
    },
    computed: {
        table() {
            return this.$store.getters.getTable
        },
        channel() {
            return this.$store.getters.getChannel
        },
        per_page() {
            return this.$store.getters.getPerPage
        }
    },
    watch: {
        pp() {
            this.$store.commit('SET_PER_PAGE', this.pp)
            this.$store.commit('SET_PAGE', 1)
            this.startTitles()
        }
    },
    methods: {
        showPage(event) {
            this.show_page = true
            this.title = event
        },
        startTitles() {
            this.pp = this.per_page
            console.log('URL', `/api/${this.table}/titles-start/${this.channel}/${this.per_page}`)
            axios.get(`/api/${this.table}/titles-start/${this.channel}/${this.per_page}`).then(response => {
                this.pages = response.data[0]
                this.$store.commit('SET_TITLES', response.data[1])
            })
        }
    },
    beforeMount() {
        this.startTitles()
    },
}
</script>

<style scoped>

</style>
