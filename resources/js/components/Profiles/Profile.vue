<template>
  <div class="card mb-4">
    <h5 class="card-header">Détails du profil</h5>
    <form @submit.prevent="handleUpdate">
      <hr class="my-0" />
      <div class="card-body">
        <div class="row">
          <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Nom d'utilisateur</label>
            <input
              v-model="form.name"
              class="form-control"
              :class="{ 'is-invalid': errors.name }"
              type="text"
              id="name"
              placeholder="Entrez votre adresse email"
            />

            <span v-if="errors.name" class="invalid-feedback" role="alert">
              <strong>{{ errors.name[0] }}</strong>
            </span>
          </div>
        </div>

        <div>
          <button
            :disabled="!canSubmit"
            type="submit"
            class="btn btn-sm btn-success me-2 float-end mb-3"
          >
            <i class="bx bx-save mt-1 mr-2"></i>
            Enregistrer
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="card">
    <h5 class="card-header">Supprimer le compte</h5>
    <div class="card-body">
      <div class="mb-3 col-12 mb-0">
        <div class="alert alert-warning">
          <h6 class="alert-heading fw-bold mb-1">
            Êtes-vous sûr de vouloir supprimer votre compte ?
          </h6>
          <p class="mb-0">
            Une fois que vous avez supprimé votre compte, il n'y a plus de
            retour en arrière. Soyez certain.
          </p>
        </div>
      </div>
      <form id="formAccountDeactivation" onsubmit="return false">
        <button
          type="button"
          @click.prevent="handleDelete"
          class="btn btn-danger deactivate-account"
        >
          <i class="bx bx-trash mt-1 mr-3"></i> Supprimer le compte
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
export default {
  data() {
    return {
      form: {
        name: `${this.user.name}`,
      },
      errors: {},
    };
  },

  props: {
    user: Object,
  },
  computed: {
    canSubmit() {
      if (this.form.name.length != "0") {
        return this.form.name.length;
      }
    },
  },
  methods: {
    async handleUpdate() {
      try {
        const response = await axios.post("/profile/update", this.form);
        this.errors.name = "";
        Swal.fire({
          toast: true,
          icon: "success",
          title: response.data,
          position: "bottom-end",
          showConfirmButton: false,
          timer: 4000,
        });
      } catch (error) {
        this.errors = error.response.data.errors;
      }
    },

    async handleDelete() {
      await Swal.fire({
        title: "Êtes-vous sûr de vouloir supprimer votre compte ?",
        text: "Une fois que vous avez supprimé votre compte, il n'y a plus de retour en arrière. Soyez certain.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Oui, supprimez-le !",
        cancelButtonText: "Annuler",
      }).then(async (result) => {
        if (result.isConfirmed) {
          await axios.delete("/profile/delete");
          window.location = "/login";
        }
      });
    },
  },
};
</script>