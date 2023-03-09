<template>
  <h4 class="mb-2">Bienvenue à Sneat! 👋</h4>
  <p class="mb-4">
    Veuillez vous connecter à votre compte et commencer l'aventure
  </p>

  <form @submit.prevent="handleLogin" class="mb-3">
    <div class="row mb-3">
      <label for="email" class="form-label">Adresse email</label>
      <!-- @error('email') is-invalid @enderror -->
      <div class="mb-3">
        <input
          v-model="form.email"
          id="email"
          type="email"
          class="form-control"
          :class="{ 'is-invalid': errors.email }"
          placeholder="Entrez votre adresse email"
        />

        <span v-if="errors.email" class="invalid-feedback" role="alert">
          <strong>{{ errors.email[0] }}</strong>
        </span>
      </div>
    </div>

    <div class="mb-3 form-password-toggle">
      <div class="d-flex justify-content-between">
        <label class="form-label" for="password">Mot de passe</label>
        <a href="password/reset">
          <small>Mot de passe oublié ?</small>
        </a>
      </div>
      <div class="input-group input-group-merge">
        <input
          v-model="form.password"
          type="password"
          class="form-control"
          :class="{ 'is-invalid': errors.password }"
          name="password"
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
      <div class="form-check">
        <input
          class="form-check-input"
          type="checkbox"
          name="remember"
          id="remember"
        />
        <label class="form-check-label" for="remember">
          Souviens-toi de moi
        </label>
      </div>
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary d-grid w-100">
        Connexion
      </button>
    </div>
  </form>

  <p class="text-center">
    <span>Nouveau sur notre plateforme ?</span> &nbsp;
    <a href="register">
      <span>Créer un compte</span>
    </a>
  </p>
</template>

<script>
export default {
  data() {
    return {
      form: { email: null, password: null },
      errors: {},
    };
  },

  methods: {
    async handleLogin() {
      try {
        await axios.get("/sanctum/csrf-cookie");
        await axios.post("/login", this.form);
        window.location = "/";
      } catch (error) {
        this.errors = error.response.data.errors;
      }
    },
  },
};
</script>
