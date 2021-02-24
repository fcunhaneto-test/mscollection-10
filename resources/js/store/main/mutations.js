export default {
    SET_TABLE: (state, payload) => { state.table = payload },
    SET_CHANNEL: (state, payload) => { state.channel = payload },
    SET_PER_PAGE: (state, payload) => { state.per_page = payload },
    SET_PAGES: (state, payload) => { state.pages = payload },
    SET_PAGE: (state, payload) => { state.page = payload },
    SET_TITLES: (state, payload) => { state.titles = payload },
    SET_TITLE: (state, payload) => { state.title = payload },
}
