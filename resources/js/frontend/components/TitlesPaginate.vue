<template>
    <nav v-if="page" class="pagination is-centered pt-4" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            <li v-if="page" class="" v-for="(page_num, key) in pages" :key="key">
                <a
                    class="pagination-link"
                    :class= "{
                        'is-current': (page_num === page),
                    }"
                    href="#"
                    @click="getPage(page_num)"
                >
                    {{ page_num }}
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "TitlesPaginate",
    props: {
        pages: Number,
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
        },
        page() {
            return this.$store.getters.getPage
        }
    },
    methods: {
        getPage(num) {
            this.$store.commit('SET_PAGE', num)
            axios.get(`/api/${this.table}/frontend-page/${this.channel}/${num}`).then(response => {
                console.log('SET TITLES', response.data)
                this.$store.commit('SET_TITLES', response.data)
            }).catch(error => console.log(error))
        }
    },
}
</script>

<style scoped>

</style>
