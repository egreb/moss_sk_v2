import EasyMDE from "easymde";

(function() {
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

    const markdownConfig = {
        showIcons: []
    };

    const ingress = document.getElementById("ingress");
    if (ingress) {
        const e = new EasyMDE({
            element: ingress,
            initialValue: ingress.value,
            ...markdownConfig
        });
    }

    const content = document.getElementById("content");
    if (content) {
        new EasyMDE({
            element: content,
            initialValue: content.value,
            ...markdownConfig
        });
    }

    // const createEventBtn = document.getElementById("create-event");
    // if (createEventBtn) {
    //     createEventBtn.addEventListener("click", async function(e) {
    //         const event = document.getElementById("event");
    //         const date = document.getElementById("date");
    //         const id = document.getElementById("schedule_id");

    //         if (!event || !date) return;

    //         if (!event.value || !date.value) {
    //             alert("Event og dato er påkrevd");
    //             return;
    //         }

    //         try {
    //             const res = await fetch("/admin/event/store", {
    //                 method: "POST",
    //                 headers: {
    //                     "X-CSRF-TOKEN": document.querySelector(
    //                         'meta[name="csrf-token"]'
    //                     ).attributes.content.value,
    //                     "Content-Type": "application/json"
    //                 },
    //                 body: JSON.stringify({
    //                     event: event.value,
    //                     date: date.value,
    //                     schedule_id: id.value
    //                 })
    //             });

    //             const json = await res.json();
    //             if (json.success) {
    //                 renderEvents(json.events);
    //             }
    //         } catch (error) {
    //             console.error(error);
    //         }
    //     });
    // }
})();

function renderEvents(events = []) {
    const list = document.getElementById("event-list");
    if (!list) return;

    list.innerHTML = "";

    events.forEach(event => {
        list.appendChild(createEvent(event));
    });
}

function createEvent(event = null) {
    let li = document.createElement("li");
    li.classList.add("flex", "mt-2", "p-2", "border", "rounded");

    const title = document.createElement("div");
    title.classList.add("w-3/4");
    title.innerHTML = `${event.title}`;

    const date = document.createElement("div");
    date.classList.add("w-1/4");
    date.innerHTML = `${event.date}`;

    li.appendChild(title);
    li.appendChild(date);

    return li;
}
