import { useForm } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";

export function usePost(props) {
    console.log({ props });
    let state = reactive({
        image: props.image,
    });

    const form = useForm({
        ...props.post,
        publish: !props.post.draft,
    });

    let submit = () => form.post(props.postUrl);

    let handleImage = (error, data) => {
        if (error) {
            alert("Noe gikk galt ved opplastning av bilde.");
        }
        state.image = JSON.parse(data.serverId);
        form.image_id = state.image.id;
    };

    return { state, submit, handleImage, form };
}
