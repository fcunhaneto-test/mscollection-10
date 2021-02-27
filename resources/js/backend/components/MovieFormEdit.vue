<template>
    <div class="columns is-widescreen is-centered full-height">
        <div class="column is-two-thirds">
            <header class="has-text-centered mt-6">
                <h1 v-if="title" class="title is-3 mb-5">Editar {{ title.title }}</h1>
            </header>
            <form class="columns is-multiline is-centered">
                <div class="column is-half-desktop is-narrow">
                    <b-field label="Título" class="form-edit">
                        <b-input type="text" v-model="title.title"></b-input>
                        <p v-if="title_message" class="has-text-danger is-size-6">{{ this.title_message }}</p>
                    </b-field>
                </div>
                <div class="column is-half-desktop is-narrow">
                    <b-field label="Título Original" class="form-edit">
                        <b-input type="text" v-model="title.original_title"></b-input>
                    </b-field>
                </div>
                <div class="column is-full">
                    <div class="columns is-multiline">
                        <div class="column is-3">
                            <b-field label="Ano">
                                <b-input
                                    type="text"
                                    v-model="title.year"
                                    class="input-year"
                                    :has-counter="false"
                                    maxlength="4"
                                >
                                </b-input>
                                <p v-if="year_message" class="has-text-danger is-size-6">{{ this.year_message }}</p>
                            </b-field>
                        </div>
                        <div class="column is-3">
                            <b-field label="Tempo">
                                <b-input type="time" class="input-time" v-model="title.time"></b-input>
                            </b-field>
                            <p v-if="year_message" class="has-text-danger is-size-6"></p>
                        </div>
                        <div class="column is-6">
                            <b-field label="Classificação" class="form-edit">
                                <a href="#" class="has-text-warning" v-for="(ys) in yellow" @click="delStar(ys)">
                                    <i class="fas fa-star"></i>
                                </a>
                                <a href="#" class="has-text-dark" v-for="(ws) in white" @click="addStar(ws)">
                                    <i class="far fa-star"></i>
                                </a>
                            </b-field>
                        </div>
                    </div>
                </div>
                <div class="column is-half-desktop is-narrow">
                    <b-field label="Categoria 1" class="form-edit">
                        <b-input list="categories_1" name="category" v-model="title.category_1" style="width: 100%;"/>
                        <datalist id="categories_1">
                            <option v-for="category in categories" :value="category.name"/>
                        </datalist>
                    </b-field>
                </div>
                <div class="column is-half-desktop is-narrow">
                    <b-field label="Categoria 2" class="form-edit">
                        <b-input list="categories_2" name="category" v-model="title.category_2" style="width: 100%;"/>
                        <datalist id="categories_2">
                            <option v-for="category in categories" :value="category.name"/>
                        </datalist>
                    </b-field>
                </div>
                <div class="column is-half-desktop is-narrow">
                    <b-field label="Keyword" class="form-edit">
                        <b-input list="keywords" name="keyword" v-model="title.keyword" style="width: 100%;"/>
                        <datalist id="keywords">
                            <option v-for="keyword in keywords" :value="keyword.name"/>
                        </datalist>
                    </b-field>
                </div>
                <div class="column is-half-desktop is-narrow">
                    <b-field label="Poster" class="form-edit">
                        <b-input type="text" v-model="title.poster"></b-input>
                    </b-field>
                </div>
                <div class="column is-full is-narrow">
                    <b-field label="Resumo:">
                        <textarea class="textarea is-hovered" placeholder="Hovered textarea"
                                  v-model="title.synopsis"></textarea>
                    </b-field>
                </div>
                <div class="column is-one-quarter">
                    <button type="button" class="button is-link  is-fullwidth" @click="editMovie">ENVIAR</button>
                </div>
            </form>
            <div class="columns mb-6">
                <div class="column is-half mb-6">
                    <header class="has-text-centered mt-3">
                        <h2 v-if="title" class="title is-5 mb-5">Mídias</h2>
                    </header>
                    <b-table
                        v-if="media_movie.length > 0"
                        v-model="media"
                        :data="media_movie"
                        striped
                        bordered
                        sticky-header
                        mobile-cards
                    >
                        <b-table-column field="name" label="Mídia" v-slot="props">
                            <label class="label pt-3">{{ props.row.name }}</label>
                        </b-table-column>
                        <b-table-column field="active" label="Ativa" v-slot="props">
                            <div class="select">
                                <select v-model="props.row.pivot.active" @change="editMediaMovie(props.row.pivot)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </b-table-column>
                    </b-table>
                </div>
            </div>
        </div>
        <b-modal v-if="title" v-model="isModalActive" :width="420" scroll="keep">
            <div class="card">
                <div class="card-content">
                    <h2 v-if="!success_movie && !success_media" class="is-title is-4 has-text-danger">Problemas ao editar o filme</h2>
                    <p v-if="!success_movie">{{ errors }}</p>
                    <h2 v-if="success_movie" class="is-title is-4 has-text-info">Filme Editado com Sucesso</h2>
                    <h2 v-if="success_media" class="is-title is-4 has-text-info">Mídia Editada com Sucesso</h2>
                    <div class="level">
                        <div class="level-item">
                            <button class="button is-success" @click="closeModal">FECHAR</button>
                        </div>
                        <div class="level-item">
                            <button class="button is-link" @click="closeModalReturn">FECHAR E VOLTAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
export default {
    name: "MovieFormEdit",
    props: {
        title: Object
    },
    data() {
        return {
            yellow: 0,
            white: 0,
            title_message: null,
            year_message: null,
            isModalActive: false,
            errors: '',
            media_movie: [],
            media: null,
            success_movie: false,
            success_media: false,
        }
    },
    computed: {
        categories() {
            return this.$store.getters.getCategories
        },
        keywords() {
            return this.$store.getters.getKeywords
        },
    },
    methods: {
        delStar(ys) {
            if (ys === 1) {
                this.yellow = 0
            } else {
                this.yellow = ys
            }
            this.white = 5 - this.yellow
            this.title.rating = this.yellow
        },
        addStar(ws) {
            console.log('ADD', ws)
            this.yellow += ws
            this.white = 5 - this.yellow
            this.title.rating = this.yellow
        },
        closeModal() {
            this.isModalActive = !this.isModalActive
        },
        closeModalReturn() {
            this.isModalActive = !this.isModalActive
            this.$emit('closeEditForm')
        },
        editMovie() {
            axios.put(`/api/movies/update`, {
                'id': this.title.id,
                'title': this.title.title,
                'original_title': this.title.original_title,
                'year': this.title.year,
                'time': this.title.time,
                'rating': this.title.rating,
                'category_1': this.title.category_1,
                'category_2': this.title.category_2,
                'keyword': this.title.keyword,
                'poster': this.title.poster,
                'synopsis': this.title.synopsis,
            }).then(response => {
                if (response.status === 200) {
                    this.$store.commit('SET_TITLE', response.data)
                    // this.$router.push({name: 'movies-table-admin', props: {exist: true}})
                    this.success_movie = true
                    this.success_media = false
                    this.isModalActive = true
                } else {
                    console.log('ERROS')
                    console.log(reponse.status)
                    console.log(reponse.data)
                }
            }).catch(errors => {
                if (errors.response.status === 422) {
                    if (errors.response.data.errors.title) {
                        this.title_message = errors.response.data.errors.title[0]
                    }
                    if (errors.response.data.errors.year) {
                        this.year_message = errors.response.data.errors.year[0]
                    }
                } else {
                    console.log('ERRORS:', errors)
                    this.errors = toString(errors.response.status) + ': ' + errors.response.data
                    this.success_movie = false
                    this.success_media = false
                    this.isModalActive = true
                }
            })
        },
        editMediaMovie(mm) {
            console.log('MM', mm)
            axios.post('/api/movies/updateMediaMovie', {
                movie_id: mm.movie_id,
                media_id: mm.media_id,
                active: mm.active,
                slug: mm.slug
            }).then(response => {
                if (response.status === 200) {
                    this.success_movie = false
                    this.success_media = true
                    this.isModalActive = true
                }
            }).catch(errors => console.log(errors))
        }
    },
    beforeMount() {
        this.yellow = this.title.rating
        this.white = 5 - this.yellow
        axios.get(`/api/movies/media/${this.title.id}`).then(response => {
            this.media_movie = response.data
        }).catch(errors => console.log('errors'))
    }
}
</script>

<style scoped>
.input-year {
    max-width: 100px;
}

.input-time {
    max-width: 100px;
}

#media-table > thead > tr > th {
    border-right: 1px solid #ffffff;
    color: #ffffff;
}

td:nth-of-type(2) {
    display: none;
}

th:nth-of-type(2) {
    display: none;
}

.media-active {
    width: 70px;
    border: 1px solid #0a0a0a;
}
</style>
