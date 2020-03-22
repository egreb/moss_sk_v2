window.Vue = require("vue");
Vue.component("markdown-area", require("./components/MarkdownArea").default);
Vue.component("post-image", require("./components/PostImage").default);
Vue.component("relevant-links", require("./components/RelevantLinks").default);
Vue.component("gallery", require("./components/Gallery").default);
new Vue({
    el: "#admin"
});

const toggleMenuButton = document.getElementById("toggle-menu");
if (toggleMenuButton) {
    toggleMenuButton.addEventListener("click", function() {
        const menu = document.querySelector("#menu");
        if (menu) {
            menu.classList.toggle("hidden");
        }
    });
}

const deletePostBtn = document.getElementById("delete-post");
if (deletePostBtn) {
    deletePostBtn.addEventListener("click", function(event) {
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
    uploadPostImage.addEventListener("change", function() {
        this.form.submit();
    });
}
