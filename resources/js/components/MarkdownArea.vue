<template>
    <div class="border border-gray-400">
        <textarea
            ref="textarea"
            class="appearance-none border-none rounded w-full py-2 px-3 text-gray-700 mb-3 focus:outline-none focus:shadow-outline h-32"
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
<style>
    .editor-toolbar {
        border: none!important;
    }
</style>
<script>
    import EasyMDE from 'easymde'
    import Modal from './Modal.vue'

    export default {
        data() {
            return {
                text: '',
                url: '',
                editor: null,
                showModal: false,
                position: {
                    A1: null,
                    B1: null,
                    A2: null,
                    B2: null
                }
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
            toolbar = [...toolbar,
                {
                    name: 'link',
                    action: this.toggleLinkModal,
                    className: 'fa fa-link',
                    title: 'Link'
                }];

            this.editor = new EasyMDE({
                element: target,
                initialValue: this.value,
                uploadImage: this.uploadImage,
                imageUploadEndpoint: '/api/image',
                ...markdownConfig,
                toolbar
            });
        },
        methods: {
            toggleLinkModal(e) {
                const editor = e.codemirror.getDoc();
                const A1 = editor.getCursor().line;
                const A2 = editor.getCursor().ch;

                const B1 = e.codemirror.findWordAt({line: A1, ch: A2}).anchor.ch;
                const B2 = e.codemirror.findWordAt({line: A1, ch: A2}).head.ch;

                const word = editor.getRange({line: A1, ch: B1}, {line: A1, ch: B2});
                if (word) {
                    this.position = {
                        A1, B1, A2, B2
                    };
                    this.text = word;
                } else {
                    this.position = null;
                }

                this.showModal = true
            },
            insertLink() {
                const link = `[${this.text}](${this.url})`;

                const doc = this.editor.codemirror.getDoc();
                if (doc) {
                    const cursor = doc.getCursor();

                    if (this.position) {
                        const {A1, B1, B2} = this.position;
                        doc.replaceRange(link, {line: A1, ch: B1}, {line: A1, ch: B2})
                    } else {
                        doc.replaceRange(link, cursor);
                    }
                }

                this.showModal = false
            },
            closeModal() {
                this.showModal = false;
            }
        },
        components: {
            'modal': Modal
        }
    }
</script>
