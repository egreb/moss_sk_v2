<template>
    <div>
        <textarea
            ref="textarea"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline h-32"
            :name="name"/>

        <modal title="Link" :show="showModal" :callback="insertLink" :close="closeModal">
            <div class="flex flex-col">
                <label><strong>Tekst</strong></label>
                <input type="text" name="tekst" v-model="text"/>

                <label class="mt-2"><strong>URL</strong></label>
                <input type="text" name="url" v-model="url"/>
            </div>
        </modal>
    </div>
</template>

<script>
    import EasyMDE from 'easymde'
    import Modal from './Modal.vue'

    export default {
        data() {
            return {
                text: '',
                url: '',
                el: null,
                showModal: false
            }
        },
        props: {
            name: String,
            value: String,
            uploadImage: Boolean
        },
        name: "IngressTextArea",
        mounted() {
            const markdownConfig = {
                showIcons: []
            };
            const target = document.querySelector(`textarea[name="${this.name}"]`);
            let toolbar = ["bold", "italic", "heading", "|", "quote", "|", "ordered-list", "unordered-list", "|"];
            if (this.uploadImage) {
                toolbar = [...toolbar, ...['|', 'upload-image']];
            }
            toolbar = [...toolbar, {
                name: 'link',
                action: this.toggleLinkModal,
                className: 'fa fa-link',
                title: 'Link'
            }];
            // {
            //     name: "gallery",
            //     action: toggleGallery,
            //     className: "fa fa-image",
            //     title: "Vis Galleri",
            // },

            this.el = new EasyMDE({
                element: target,
                initialValue: this.value,
                uploadImage: this.uploadImage,
                imageUploadEndpoint: '/api/image',
                ...markdownConfig,
                toolbar
            })
            ;
        },
        methods: {
            toggleLinkModal() {
                this.showModal = true
            },
            insertLink() {
                const link = `[${this.text}](${this.url})`;

                const doc = this.el.codemirror.getDoc();
                if (doc) {
                    const cursor = doc.getCursor();
                    doc.replaceRange(link, cursor);
                }

                this.showModal = false
            },
            closeModal() {
                console.log('check')
                this.showModal = false;
            }
        },
        components: {
            'modal': Modal
        }
    }
</script>

<style scoped>

</style>
