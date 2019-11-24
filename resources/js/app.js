import EasyMDE from "easymde";

(function () {
    const toggleMenuButton = document.getElementById("toggle-menu");
    if (toggleMenuButton) {
        toggleMenuButton.addEventListener("click", function () {
            const menu = document.querySelector("#menu");
            if (menu) {
                menu.classList.toggle("hidden");
            }
        });
    }

    const deletePostBtn = document.getElementById("delete-post");
    if (deletePostBtn) {
        deletePostBtn.addEventListener("click", function (event) {
            event.preventDefault();
            const ok = confirm("Vil du slette denne posten?");
            if (ok) {
                const url = deletePostBtn.dataset.url;
                if (url) {
                    fetch(url, {
                        method: "DELETE",
                        redirect: "follow",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).attributes.content.value
                        }
                    })
                        .then(result => (window.location = result.url))
                        .catch(error => {
                            console.error(
                                `Something went wrong deleting post ${error}`
                            );
                        });
                    return;
                }
                console.error("url missing from deleting post");
            }
        });
    }

    const uploadPostImage = document.getElementById("image");
    if (uploadPostImage) {
        uploadPostImage.addEventListener("change", function () {
            this.form.submit();
        });
    }

    const markdownConfig = {
        showIcons: []
    };

    const ingress = document.getElementById("ingress");
    if (ingress) {
        new EasyMDE({
            element: ingress,
            initialValue: ingress.value,
            ...markdownConfig,
        });
    }

    const content = document.getElementById("content");
    if (content) {
        new EasyMDE({
            element: content,
            initialValue: content.value,
            ...markdownConfig,
            toolbar: [
                "bold", "italic", "heading", "|", "quote", "|", "ordered-list", "unordered-list", "|",
                {
                    name: "image",
                    action: toggleGallery,
                    className: "fa fa-image",
                    title: "Vis Galleri",
                }
            ]

        });
    }

    const closeModalBtns = document.querySelectorAll('.modal-close');
    if (closeModalBtns) {
        closeModalBtns.forEach(btn => btn.addEventListener('click', toggleModal))
    }
})();

async function toggleGallery(editor) {
    toggleModal();
    const content = document.getElementById('content'); // textarea
    if (!content) return;

    const modal_content = document.querySelector('.modal-body');
    if (!document.body.classList.contains('modal-active') || modal_content.innerHTML !== '') return;
    try {
        const result = await fetch('/api/image', {});
        const data = await result.json();

        if (data.success) {
            Object.values(data.data).forEach(image => {
                const imageContainer = document.createElement('a');
                imageContainer.className = 'relative w-1/3';
                imageContainer.innerHTML = `
                    <img class="" src="${image.url}" alt="${image.name}" style="">
                `;
                imageContainer.addEventListener('click', function (event) {
                    toggleModal();

                    const newText = `![${image.name}](${image.url})`;
                    const doc = editor.codemirror.getDoc();
                    const cursor = doc.getCursor();
                    doc.replaceRange(newText, cursor);
                }.bind(image, editor));

                modal_content.appendChild(imageContainer);
            })
        }
    } catch (e) {
        console.error('fetching images', e);
    }
}

function toggleModal() {
    const modal = document.querySelector('.modal');
    if (!modal) return;

    const body = document.querySelector('body');
    modal.classList.toggle('opacity-0');
    modal.classList.toggle('pointer-events-none');
    body.classList.toggle('modal-active')
}

function insertAtCursor(input, textToInsert) {
    const isSuccess = document.execCommand("insertText", false, textToInsert);

    // Firefox (non-standard method)
    if (!isSuccess && typeof input.setRangeText === "function") {
        const start = input.selectionStart;
        input.setRangeText(textToInsert);
        // update cursor to be at the end of insertion
        input.selectionStart = input.selectionEnd = start + textToInsert.length;

        // Notify any possible listeners of the change
        const e = document.createEvent("UIEvent");
        e.initEvent("input", true, false);
        input.dispatchEvent(e);
    }
}
