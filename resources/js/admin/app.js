import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Pages/Shared/Layout'
import VueMarkdownEditor from '@kangc/v-md-editor'
import '@kangc/v-md-editor/lib/style/base-editor.css'
import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js'
import '@kangc/v-md-editor/lib/theme/style/vuepress.css'
import {createPinia} from 'pinia'

VueMarkdownEditor.use(vuepressTheme)

createInertiaApp({
  resolve: (name) => {
    let page = require(`./Pages/${name}`).default
    page.layout = Layout || page.layout

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(VueMarkdownEditor)
      .use(createPinia())
      .mount(el)
  },
})

InertiaProgress.init()
