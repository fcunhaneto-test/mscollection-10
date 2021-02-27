<template>
    <router-view :header="header" :subheader="subheader"></router-view>
</template>

<script>

export default {
    name: "Admin",
    props: {
        header: String,
        subheader: String,
        table: String,
    },
    beforeMount() {
        this.$store.commit('SET_CHANNEL', this.$route.params.channel)
        this.$store.commit('SET_TABLE', this.table)
    }
}
</script>

<style scoped>

</style>
