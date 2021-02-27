export default {
    state: {
        categories: [],
        keywords: [],
        media: [],
        cast: [],
        producers: [],
    },
    getters: {
        getCategories(state) { return state.categories },
        getKeywords(state) { return state.keywords },
        getMedia(state) { return state.media },
        getCast(state) { return state.cast },
        getProducers(state) { return state.producers },
    },
    mutations: {
        SET_CATEGORIES: (state, payload) => { state.categories = payload },
        SET_KEYWORDS: (state, payload) => { state.keywords = payload  },
        SET_MEDIA: (state, payload) => { state.media = payload },
        SET_CAST: (state, payload) => { state.cast = payload },
        SET_PRODUCERS: (state, payload) => { state.producers = payload },
    },
    actions: {
        setQualifiers(context, payload) {
            const set_option = 'SET_' + payload.toUpperCase()
            axios.get(`/api/${payload}`).then(response => {
                context.commit(set_option, response.data)
            }).catch(errors => console.log(errors))
        }
    }
}
