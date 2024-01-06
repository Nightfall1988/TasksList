import { createApp } from 'vue';
import TaskList from './components/TaskList.vue';
import AddTask from './components/AddTask.vue';
import EditTask from './components/EditTask.vue';
import Menu from './components/Menu.vue';

const app = createApp({});
app.component('task-list', TaskList);
app.component('add-task', AddTask);
app.component('edit-task', EditTask);
app.component('head-menu', Menu);

app.mount('#app');