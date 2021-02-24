<template>
    <div class="columns mt-5 mb-6">
        <div class="column is-10 is-offset-1">
            <div class="card bd-card">
                <div class="card-header has-background-grey-dark">
                    <div class="media has-background-grey-dark bd-media">
                        <figure class="media-left pl-2 pt-2">
                            <img v-if="title.poster" :src="'../images/poster/' + title.poster" width="120" height="90">
                            <img v-else :src="url" width="120" height="90">
                        </figure>
                        <div class="media-content v-center">
                            <div class="mt-3">
                                <h3 class="title is-3 has-text-white">{{ title.title }}</h3>
                            </div>
                            <div class="is-inline-block mt-4">
                                <b-tag class="mr-2" type="is-info" size="is-medium">Ano: {{ title.year }}</b-tag>
                                <b-tag class="mr-4" v-if="title.time" type="is-info" size="is-medium">Duração:
                                    {{ title.time | strTime }}
                                </b-tag>
                                <span>
                            <b-icon v-for="(star, key) in title.rating" class="has-text-warning"
                                    :key="key+'y'"
                                    pack="fas"
                                    icon="star"
                            ></b-icon>
                            <b-icon v-for="(star, key) in notRanking" class="has-text-white"
                                    :key="key+'w'"
                                    pack="fas"
                                    icon="star"
                            ></b-icon>
                        </span>
                            </div>
                            <b-taglist class="mt-2 mb-0">
                                <b-tag v-if="title.category_2" type="is-light" class="has-text-black" size="is-medium">
                                    Categorias: {{ title.category_1 }}, {{ title.category_2 }}
                                </b-tag>
                                <b-tag v-else type="is-dark" size="is-medium">Categoria: {{ title.category_1 }}</b-tag>
                            </b-taglist>
                        </div>
                        <div class="media-right">
                            <button
                                class="button is-small has-background-white button-right px-2" @click="tableReturn">
                                <i class="fas fa-reply"></i><span class="ml-3">Retornar</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="mb-6 mt-2 ml-3">
                        <h5 class="title is-5 mb-2 pb-0">Resumo:</h5>
                        <p>{{ title.synopsis }}</p>
                    </div>
                    <table class="table is-fullwidth" >
                        <thead class="has-background-white">
                        <tr>
                            <th class="title is-5 has-text-dark">Ator/Personagem</th>
                            <th class="title is-5">{{ cast.length }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="ac in cast">
                            <td class="pl-5">{{ ac.actor }}</td>
                            <td>{{ ac.character }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table is-fullwidth">
                        <thead class="has-background-white">
                        <tr>
                            <th class="title is-5 has-text-dark">
                                <span v-if="table === 'movies'">Diretores</span>
                                <span v-if="table === 'series'">Criadores</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="producer in producers">
                            <td class="pl-5">{{ producer.name }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TitleShow",
    props: {
        title: Object
    },
    data() {
        return {
            isOpen: false,
            url: "../images/poster/faker-poster.png",
            cast: null,
            producers: null,
        }
    },
    computed: {
        table() {
            return this.$store.getters.getTable
        },
        notRanking() {
            return 5 - this.title.rating
        }
    },
    methods: {
        tableReturn() {
            this.$emit('showTable', false)
        }
    },
    beforeMount() {
        axios.get(`/api/${this.table}/cast/${this.title.id}`).then(response => {
            this.cast = response.data
        }).catch(errors => console.log(errors))
        axios.get(`/api/${this.table}/producers/${this.title.id}`).then(response => {
            this.producers = response.data
        }).catch(errors => console.log(errors))
    }
}
</script>

<style scoped>
.bd-card {
    border: 1px solid #9C9C9C;
}

.bd-media {
    border-radius: 30px;
}

.image img {
    margin-top: 5px;
    margin-left: 5px;
}

h3 {
    font-size: 1.4rem;
}

.button-right {
    position: absolute;
    top: 10px;
    right: 10px;
}

.v-center {
    margin: auto;
}

</style>
