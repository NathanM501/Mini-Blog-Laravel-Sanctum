<template>
  <form @submit.prevent="Submit">
    <hr class="my-0" />
    <div class="card-body">
      <div class="row">
        <div class="mb-3 col-md-12">
          <label for="title" class="form-label">Titre de l'article</label>
          <input
            v-model="form.title"
            class="form-control"
            :class="{ 'is-invalid': errors.title }"
            type="text"
            id="title"
          />

          <span v-if="errors.title" class="invalid-feedback" role="alert">
            <strong>{{ errors.title[0] }}</strong>
          </span>
        </div>

        <div class="mb-3 col-md-12">
          <label for="content" class="form-label">Déscription</label>

          <textarea
            v-model="form.content"
            id="content"
            rows="5"
            class="form-control"
            :class="{ 'is-invalid': errors.content }"
            placeholder="Déscription de l'article"
          ></textarea>
          <span v-if="errors.content" class="invalid-feedback" role="alert">
            <strong>{{ errors.content[0] }}</strong>
          </span>
        </div>
      </div>

      <div>
        <button
          :disabled="!canSubmit"
          type="submit"
          class="btn btn-primary me-2 float-end mb-3"
        >
          Publier
        </button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: `${this.post != null ? this.post.title : ""}`,
        content: `${this.post != null ? this.post.content : ""}`,
      },
      errors: {},
    };
  },

  props: {
    post: Object,
  },
  computed: {
    canSubmit() {
      if (this.form.title.length != "0" && this.form.content.length != "0") {
        return this.form.title.length + " " + this.form.content.length;
      }
    },
  },
  methods: {
    async Submit() {
      try {
        await axios.post("/posts", this.form);
        window.location = "/";
      } catch (error) {
        this.errors = error.response.data.errors;
      }
    },
  },
};
</script>