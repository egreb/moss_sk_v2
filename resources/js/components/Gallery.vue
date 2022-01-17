<template>
  <div>
    <button type="button" class="btn btn-blue" @click="toggleModal">
      Velg fra galleri
    </button>

    <modal title="Galleri" :show="showModal" :close="closeModal">
      <div
        class="flex flex-col overflow-y-scroll w-full"
        style="max-height: 80vh"
      >
        <div class="flex flex-col items-center">
          <a
            v-for="image in images"
            :key="image.id"
            class="image-selector"
            @click="() => closeModalAndSelectImage(image)"
          >
            <img
              class="object-contain"
              style="max-height: 200px"
              :src="image.url"
            />
          </a>

          <button
            v-if="showLoadMoreImagesBtn"
            type="button"
            class="btn btn-blue mt-4"
            @click="fetchData"
          >
            Last inn..
          </button>
        </div>
      </div>
    </modal>
  </div>
</template>
<script>
import Modal from './Modal.vue'

export default {
  components: {
    Modal,
  },
  props: {
    selectImage: Function,
  },
  data: function () {
    return {
      showModal: false,
      images: [],
      dataFetched: false,
      offset: 0,
      showLoadMoreImagesBtn: true,
      limit: 10,
    }
  },
  methods: {
    closeModalAndSelectImage(image) {
      this.showModal = false
      this.selectImage(image)
    },
    closeModal() {
      this.showModal = false
    },
    toggleModal() {
      if (!this.dataFetched) {
        this.fetchData()
      }
      this.showModal = !this.showModal
    },
    async fetchData() {
      const csrfToken = document.head.querySelector(
        '[name~=csrf-token][content]',
      ).content

      try {
        const response = await fetch(
          `/api/image?offset=${this.offset + 1}&limit=${this.limit}`,
          {
            method: 'GET',
            credentials: 'same-origin',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-Token': csrfToken,
            },
          },
        )

        const json = await response.json()
        this.offset = this.offset + this.limit
        if (json.data.length < this.limit) {
          this.showLoadMoreImagesBtn = false
        }
        this.images = [...this.images, ...json.data]
      } catch (error) {
        alert(
          error.message
            ? error.message
            : 'Noe gikk galt, kunne ikke hente bildene. Prøv på nytt',
        )
      }
      this.dataFetched = true
    },
  },
}
</script>

<style scoped>
.image-selector {
    @apply mt-2;
}

.image-selector:hover {
    @apply border-2 border-blue-500 cursor-pointer;
}
</style>
