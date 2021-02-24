<template>
    <table v-if="titles" class="table is-fullwidth">
        <thead>
        <tr>
            <th>Títulos</th>
            <th>Ano</th>
            <th v-if="table ==='movies'">Tempo</th>
            <th>Rating</th>
            <th>Categoria 1</th>
            <th>Categoria 2</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="title in titles" :key="title.id">
            <td><a class="is-link" @click="toPage(title)">{{ title.title }}</a></td>
            <td>{{ title.year }}</td>
            <td v-if="table ==='movies'">{{ title.time | strTime }}</td>
            <td>
                <b-icon v-for="(star, key) in title.rating"
                        class="has-text-orange"
                        :key="key+'y'"
                        pack="fas"
                        icon="star"
                ></b-icon>
                <b-icon v-for="(star, key) in (5 - title.rating)"
                        class="has-text-dark"
                        :key="key+'w'"
                        pack="far"
                        icon="star"
                ></b-icon>
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
        table() {
            return this.$store.getters.getTable
        },
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
