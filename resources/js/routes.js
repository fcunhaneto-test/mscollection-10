import VueRouter from "vue-router";

import Titles from "./frontend/Titles";
import TitlesAdmin from "./backend/TitlesAdmin";
const routes = [
    {
        path: '/filmes/:channel',
        component: Titles,
        name: 'frontend-movies'
    },
    {
        path: '/series/:channel',
        component: Titles,
        name: 'frontend-series'
    },
    {
        path: '/admin/filmes/:channel',
        component: TitlesAdmin,
        name: 'backend-movies'
    },
    {
        path: '/admin/series/:channel',
        component: TitlesAdmin,
        name: 'backend-series'
    },
];

const router = new VueRouter({
    mode: "history",
    routes
})

export default router;
