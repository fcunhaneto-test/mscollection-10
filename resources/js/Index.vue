<template>
    <div>
        <router-view :subheader="subheader"></router-view>
        <footer class="footer mt-6 pt-6 pb-6 has-background-link-dark">
            <div class="container">
                <span class="title is-6 has-text-white">Classificação:</span>
                <ul>
                    <li>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star mr-2"></i></span>
                        <span class="has-text-white">Ruim (Não dá para assistir)</span>
                    </li>
                    <li>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star mr-2"></i></span>
                        <span class="has-text-white">Regular (Depende dá sua boa vontade)</span>
                    </li>
                    <li>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star mr-2"></i></span>
                        <span class="has-text-white">Bom (Pode assistir tranquilamente)</span>
                    </li>
                    <li>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-white"><i class="fas fa-star mr-2"></i></span>
                        <span class="has-text-white">Ótimo (Não deixe de assistir)</span>
                    </li>
                    <li>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star"></i></span>
                        <span class="icon has-text-warning"><i class="fas fa-star mr-2"></i></span>
                        <span class="has-text-white">Excelente (Imperdível)</span>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</template>

<script>

export default {
    name: "Index",
    props: {
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
