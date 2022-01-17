import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Pages/Shared/Layout'
import PageHeader from './Pages/Shared/PageHeader'

createInertiaApp({
  resolve: (name) => {
    let page = require(`./Pages/${name}`).default
    page.layout = Layout || page.layout

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
InertiaProgress.init()
