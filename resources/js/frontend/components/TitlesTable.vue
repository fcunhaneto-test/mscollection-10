<template>
    <table v-if="titles" class="table is-fullwidth">
        <thead>
            <tr>
                <th>Títulos</th>
                <th>Ano</th>
                <th>Tempo</th>
                <th>Rating</th>
                <th>Categoria 1</th>
                <th>Categoria 2</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="title in titles" :key="title.id">
                <td><a class="is-link" @click="toPage(title)">{{ title.title }}</a></td>
                <td>{{ title.year }}</td>
                <td>{{ title.time | strTime }}</td>
                <td>{{ title.rating }}</td>
                <td>{{ title.category_1 }}</td>
                <td>{{ title.category_2 }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "TitlesTable",
    computed: {
        titles() {
            return this.$store.getters.getTitles
        }
    },
    methods: {
        toPage(title) {
            this.$emit('showTitle', title)
        }
    }
}
</script>

<style scoped>

</style>
