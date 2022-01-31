import {defineStore} from 'pinia'

export const useNotifications = defineStore('notifications', {
  state:() => ({
    items: [],
  }),
  actions: {
    add(message, type = 'success') {
      this.items.push({
        message,
        type,
      })
    },
    remove() {
      this.items.splice(0,1)
    },
  },
})
