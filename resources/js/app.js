import { createApp } from 'vue';
import AddNewTask from './components/AddNewTask.vue';
import DeleteTask from './components/DeleteTask.vue';

const app = createApp({});
app.component('add-new-task', AddNewTask);
app.component('delete-task', DeleteTask);
app.mount('#app');