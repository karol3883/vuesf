
import Vue from 'vue'
import Vuetify from 'vuetify'

import 'vuetify/dist/vuetify.min.css'
import 'vuetify/dist/vuetify.css';

Vue.use(Vuetify)

const opts = {
    theme: {
        themes: {
            light: {
                primary: '#1565c0',
                secondary: '#64b5f6',
                accent: '#78002e',
                error: '#d50000',
            },
        }
    }
}

export default new Vuetify(opts)