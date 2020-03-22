<template>
  <div>
    <button class="btn btn-blue" @click="toggleModal">Toggle modal</button>

    <modal :show="showModal" :close="toggleModal">
      <h2 class="text-2xl">Galleri</h2>

      <div class="grid flex flex-col">
        <figure v-for="image in images" :key="image.id">
          <img class="object-contain" style="max-height:100px;" :src="image.url" />
        </figure>
      </div>
    </modal>
  </div>
</template>
<script>
import Modal from "./Modal.vue";

export default {
  props: {},
  data: function() {
    return {
      showModal: false,
      images: [],
      dataFetched: false,
      offset: 0
    };
  },
  methods: {
    toggleModal() {
      if (!this.dataFetched) {
        this.fetchData();
      }
      this.showModal = !this.showModal;
    },
    async fetchData() {
      const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
      ).content;

      try {
        const response = await fetch(`/api/image?offset=${this.offset}`, {
          method: "GET",
          credentials: "same-origin",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": csrfToken
          }
        });

        const json = await response.json();

        this.images = json.data;
      } catch (error) {
        console.error("gallery.fetchData:", error);
        alert(
          error.message
            ? error.message
            : "Noe gikk galt, kunne ikke hente bildene. Prøv på nytt"
        );
      }
      this.dataFetched = true;
    }
  },
  mounted() {
    console.log("modal mounted");
  },
  components: {
    Modal
  }
};
</script>

<style scoped>
</style>