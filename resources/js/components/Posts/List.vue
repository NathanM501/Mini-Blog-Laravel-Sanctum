<template>
  <div v-if="posts.length != 0">
    <div
      v-for="post in posts"
      v-bind:key="post.id"
      class="col-md-6 col-lg-6 offset-lg-3 mb-3"
    >
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">{{ post.title }}</h5>

          <h6 class="small text-muted">
            Publier par <strong>{{ post.user.name }}</strong>
          </h6>
          <p class="card-text">{{ subStr(post.content) }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <div>
            <a :href="`posts/${post.id}`" class="btn btn-sm btn-outline-info"
              >Lire la suite</a
            >&nbsp;
            <span v-if="post.user_id === user">
              <a
                :href="`posts/${post.id}/edit`"
                class="btn btn-sm btn-outline-primary"
                ><i class="tf-icons bx bx-pencil"></i></a
              >&nbsp;
              <a
                @click.prevent="deletePost(post.id)"
                class="btn btn-sm btn-danger text-white"
              >
                <i class="tf-icons bx bx-trash"></i>
              </a>
            </span>
          </div>
          <div>
            <p class="card-text">
              <small class="text-muted">{{ post.created_at }}</small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div v-if="posts.length === 0" class="col-md-6 col-lg-6 offset-lg-3 mb-3">
    <div class="card">
      <div class="card-body mt-3">
        <h6 class="text-center text-muted">
          Pas d'article disponible pour le moment.
        </h6>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import usePosts from "../../composables/";
import Swal from "sweetalert2";
const { posts, getPosts, destroyPost } = usePosts();

onMounted(async () => {
  await getPosts();
});

defineProps({
  user: Number,
});
const subStr = (str) => {
  return str.substr(0, 150) + "...";
};

const deletePost = async (id) => {
  Swal.fire({
    title: "Souhaitez-vous vraiment supprimer cette article ?",
    text: "Vous ne pourrez pas revenir en arrière !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Oui, supprimez-le !",
    cancelButtonText: "Annuler",
  }).then((result) => {
    if (result.isConfirmed) {
      destroyPost(id);
      Swal.fire("Supprimé !", "Votre article a été supprimé.", "success");
      getPosts();
    }
  });
};
</script>
