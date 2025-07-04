import './assets/main.css'
import 'primeicons/primeicons.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import axios from 'axios'

import App from './App.vue'
import router from './router'

const app = createApp(App)

export const getData = async (endpoint) => {
  let response = await axios.get('http://localhost:8080/api/' + endpoint)

  return {
    data: response.data,
    status: response.status,
    ok: response.status === 200 ? true : false,
  }
}

app.use(createPinia())
app.use(router)

app.mount('#app')
