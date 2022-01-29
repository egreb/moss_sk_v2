import {defineStore} from 'pinia'

export const useModal = defineStore('modal', {
  state: () => ({
    showModal: false,
    text: {
      heading: null,
      message: null,
      confirm: 'Bekreft',
      cancel: 'Avbryt',
    },
    confirm: false,
    callback: null,
  }),
  actions: {
    toggle({confirm = false, message = null, heading = null, callback = null} = {}) {
      this.showModal = !this.showModal
      this.confirm = confirm || false
      this.text.message = message || null
      this.text.heading = heading || null
      this.callback = callback
    },
  },
})
