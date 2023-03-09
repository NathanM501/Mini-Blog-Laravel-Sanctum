import { ref } from "vue";

export default function usePosts() {
    const posts = ref([]);

    const getPosts = async () => {
        await axios.get("/sanctum/csrf-cookie");
        let response = await axios.get("api/articles");
        return (posts.value = response.data.posts);
    };

    const destroyPost = async (id) => {
        await axios.get("/sanctum/csrf-cookie");
        await axios.delete("api/articles/" + id);
    };

    return {
        posts,
        getPosts,
        destroyPost,
    };
}
