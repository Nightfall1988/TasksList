import { createApp } from 'vue';
import TaskList from './components/TaskList.vue';
import DeleteTask from './components/DeleteTask.vue';
import AddTask from './components/AddTask.vue';

const app = createApp({});
app.component('task-list', TaskList);
app.component('delete-task', DeleteTask);
app.component('add-task', AddTask);

app.mount('#app');