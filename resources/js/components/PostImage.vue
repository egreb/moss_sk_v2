<template>
    <div class="flex flex-col">
        <div v-if="state === LOADING_STATE.DONE && image" class="flex w-full post-image items-center flex-col">
            <div class="w-6/12">
                <img :src="image.url" alt="" :srcset="image.srcset">
            </div>

            <button class="btn btn-danger mt-3" type="button" @click="deleteImage">Slett</button>
        </div>
        <div v-else-if="state === LOADING_STATE.LOADING">
            Laster opp...
        </div>
        <div v-else-if="state === LOADING_STATE.ERROR">
            Noe gikk galt :(
        </div>
        <div v-else class="flex flex-col items-start">
            <label for="file">Last opp bilde</label>
            <input type="file" name="file" id="file" ref="file" @change="onSelectImage">

            <button v-if="this.file" type="button" class="btn btn-success mt-3" @click="uploadImage">Last opp</button>
        </div>

        <input type="hidden" :value="image ? image.id : null" name="image_id">
    </div>
</template>

<script>
    const LOADING_STATE = {
        LOADING: 'LOADING',
        DONE: 'DONE',
        ERROR: 'ERROR'
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
                image: this.imageId ? {
                    id: this.imageId || null,
                    url: this.imageUrl || null,
                    srcset: this.imageSrcSet || null,
                } : null,
                file: null,
                state: LOADING_STATE.DONE,
                LOADING_STATE: LOADING_STATE
            }
        },
        methods: {
            onSelectImage(event) {
                event.preventDefault();
                this.file = this.$refs.file.files[0];
            },
            async uploadImage() {
                const formData = new FormData();
                formData.append('image', this.file);

                try {
                    this.state = LOADING_STATE.LOADING;
                    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                    const url = this.postId ? `/admin/post/${this.postId}/image/upload` : '/api/image';
                    const response = await fetch(url, {
                        method: 'post',
                        body: formData,
                        headers: {
                            'X-CSRF-Token': csrfToken
                        }
                    });
                    this.state = LOADING_STATE.DONE;
                    if (response.status === 200) {
                        const json = await response.json();
                        const {id, url, srcset} = json.data ? json.data : json;
                        this.image = {
                            id: id,
                            url: url,
                            srcset: srcset
                        }
                    }

                } catch (error) {
                    console.error(error);
                }
            },
            async deleteImage() {
                const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

                try {
                    this.state = this.LOADING_STATE.LOADING;
                    const response = await fetch(`/admin/post/${this.postId}/image/delete`, {
                        method: 'delete',
                        credentials: "same-origin",
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': csrfToken
                        }
                    })

                    if (response.status === 200) {
                        this.image = null;
                    }

                    this.state = this.LOADING_STATE.DONE;
                } catch (error) {
                    console.error(error);
                    if (error.message) {
                        alert(error.message);
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
