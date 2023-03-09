<template>
  <h4 class="mb-3">L'aventure commence ici 🚀</h4>

  <form @submit.prevent="handleRegister" class="mb-3">
    <div class="mb-3">
      <label for="name" class="form-label">Nom d'utilisateur</label>

      <input
        v-model="form.name"
        type="text"
        class="form-control"
        :class="{ 'is-invalid': errors.name }"
        placeholder="Entrez votre nom d'utilisateur"
      />

      <span v-if="errors.name" class="invalid-feedback" role="alert">
        <strong>{{ errors.name[0] }}</strong>
      </span>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Adresse email</label>

      <input
        v-model="form.email"
        type="email"
        class="form-control"
        :class="{ 'is-invalid': errors.email }"
        placeholder="Entrez votre adresse email"
      />

      <span v-if="errors.email" class="invalid-feedback" role="alert">
        <strong>{{ errors.email[0] }}</strong>
      </span>
    </div>

    <div class="mb-3 form-password-toggle">
      <label for="password" class="form-label">Mot de passe</label>

      <div class="input-group input-group-merge">
        <input
          v-model="form.password"
          type="password"
          class="form-control"
          :class="{ 'is-invalid': errors.password }"
          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
          aria-describedby="password"
        />
        <span class="input-group-text cursor-pointer"
          ><i class="bx bx-hide"></i
        ></span>

        <span v-if="errors.password" class="invalid-feedback" role="alert">
          <strong>{{ errors.password[0] }}</strong>
        </span>
      </div>
    </div>

    <div class="mb-3">
      <label for="password-confirm" class="form-label"
        >Confirmez le mot de passe</label
      >

      <input
        v-model="form.password_confirmation"
        type="password"
        class="form-control"
        name="password_confirmation"
        placeholder="Confirmez votre mot de passe"
      />
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-success d-grid w-100">
        Créer un compte
      </button>
    </div>
  </form>

  <p class="text-center">
    <span>Vous avez déjà un compte ?</span>&nbsp;
    <a href="login">
      <span>Connectez-vous à la place</span>
    </a>
  </p>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
      },
      errors: {},
    };
  },

  methods: {
    async handleRegister() {
      try {
        await axios.get("/sanctum/csrf-cookie");
        await axios.post("/register", this.form);
        window.location = "/";
      } catch (error) {
        this.errors = error.response.data.errors;
      }
    },
  },
};
</script>