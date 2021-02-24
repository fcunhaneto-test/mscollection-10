<template>
    <router-view :subheader="subheader"></router-view>
</template>

<script>

export default {
    name: "Index",
    props: {
        subheader: String,
        table: String,
        per_page: String,
        pages: String,
    },
    beforeMount() {
        console.log('CHANNEL', this.$route.params.channel)
        this.$store.commit('SET_CHANNEL', this.$route.params.channel)
        this.$store.commit('SET_TABLE', this.table)
        this.$store.commit('SET_PER_PAGE', parseInt(this.per_page))
    }
}
</script>

<style scoped>

</style>
