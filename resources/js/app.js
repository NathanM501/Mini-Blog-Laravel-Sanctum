import "./bootstrap.js";

import { createApp } from "vue";

const app = createApp({});

import Login from "./components/Login.vue";
import Register from "./components/Register.vue";
import List from "./components/Posts/List.vue";
import Create from "./components/Posts/Create.vue";
import Profile from "./components/Profiles/Profile.vue";

app.component("login", Login);
app.component("register", Register);
app.component("list", List);
app.component("create", Create);
app.component("Profile", Profile);
app.mount("#app");
