<template>
  <div>
    <p
      v-if="!relevantLinks || !relevantLinks.length"
      class="text-blue-500 text-lg my-3"
    >
      Det er ikke opprettet noen lenker.
    </p>

    <div v-else>
      <ul class="list border">
        <li
          class="flex justify-between text-xl text-gray-800 bg-gray-100 border-b border-gray-500 px-1"
        >
          <div class="w-1/2">Lenke</div>
          <div class="w-2/6">Opprettet</div>
          <div class="w-2/6">Utløper</div>
          <div class="w-1/6" />
        </li>
        <li
          v-for="link in relevantLinks"
          :key="link.id"
          class="px-2 py-1 flex justify-between items-center"
        >
          <div class="w-1/2">
            <a class="text-xl" :href="link.url">{{
              link.description
            }}</a>
          </div>
          <div class="w-2/6">
            {{ link.updated_at }}
          </div>
          <div class="w-2/6">
            <span>{{ link.expires }}</span>
          </div>
          <div class="w-1/6">
            <button
              class="btn btn-danger text-sm"
              type="button"
              @click="deleteLink(link.id)"
            >
              Slett
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'RelevantLinks',
  props: {
    list: Array,
  },
  data: function () {
    return {
      relevantLinks: null,
    }
  },
  mounted() {
    this.relevantLinks = Object.values(this.list)
  },
  methods: {
    async deleteLink(id) {
      const csrfToken = document.head.querySelector(
        '[name~=csrf-token][content]',
      ).content

      try {
        const response = await fetch(`/admin/relevant_links/${id}`, {
          method: 'delete',
          credentials: 'same-origin',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken,
          },
        })

        if (response.ok) {
          this.relevantLinks = this.relevantLinks.filter(
            (link) => link.id !== id,
          )
        } else {
          alert('Kunne ikke slette lenke')
        }
      } catch (e) {
        console.error(e)
        alert('Kunne ikke slette lenke')
      }
    },
  },
}
</script>

<style scoped></style>
