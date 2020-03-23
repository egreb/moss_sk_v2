<template>
  <div class="flex flex-col">
    <div
      v-if="state === LOADING_STATE.DONE && image"
      class="flex w-full post-image items-center flex-col"
    >
      <div class>
        <img :src="image.url" alt :srcset="image.srcset" />
      </div>

      <button class="btn btn-danger mt-3" type="button" @click="deleteImage">Slett</button>
    </div>
    <div v-else-if="state === LOADING_STATE.LOADING">Laster opp...</div>
    <div v-else-if="state === LOADING_STATE.ERROR">Noe gikk galt :(</div>
    <div v-else class="flex flex-col">
      <div class="flex items-center mt-3">
        <label class="btn text-white bg-indigo-500 hover:bg-indigo-800 mt-0 text-base">
          <span class="text-base leading-normal">Last opp bilde</span>
          <input
            type="file"
            class="hidden"
            id="file"
            name="file"
            ref="file"
            @change="onSelectImage"
          />
        </label>

        <span class="mx-3">eller</span>
        <gallery :selectImage="selectImageFromGallery"></gallery>
      </div>
    </div>

    <input type="hidden" :value="image ? image.id : null" name="image_id" />
  </div>
</template>

<script>
import Gallery from "./Gallery.vue";

const LOADING_STATE = {
  LOADING: "LOADING",
  DONE: "DONE",
  ERROR: "ERROR"
};
export default {
  name: "PostImage",
  props: {
    postId: String,
    imageId: String,
    imageUrl: String,
    imageSrcSet: String
  },
  data() {
    return {
      image: this.imageId
        ? {
            id: this.imageId || null,
            url: this.imageUrl || null,
            srcset: this.imageSrcSet || null
          }
        : null,
      file: null,
      state: LOADING_STATE.DONE,
      LOADING_STATE: LOADING_STATE
    };
  },
  methods: {
    selectImageFromGallery(image) {
      this.image = image;
    },
    async onSelectImage(event) {
      event.preventDefault();
      this.file = this.$refs.file.files[0];
      this.uploadImage();
    },
    async uploadImage() {
      const formData = new FormData();
      formData.append("image", this.file);

      try {
        this.state = LOADING_STATE.LOADING;
        const csrfToken = document.head.querySelector(
          "[name~=csrf-token][content]"
        ).content;
        const url = this.postId
          ? `/admin/post/${this.postId}/image/upload`
          : "/api/image";
        const response = await fetch(url, {
          method: "post",
          body: formData,
          headers: {
            "X-CSRF-Token": csrfToken
          }
        });
        this.state = LOADING_STATE.DONE;
        if (response.status === 200) {
          const json = await response.json();
          const { id, url, srcset } = json.data ? json.data : json;
          this.image = {
            id: id,
            url: url,
            srcset: srcset
          };
        }
      } catch (error) {
        console.error(error);
      }
    },
    async deleteImage() {
      this.image = null;
      this.file = null;
    }
  },
  components: {
    Gallery
  }
};
</script>

<style scoped>
img {
  max-height: 400px;
}
</style>
