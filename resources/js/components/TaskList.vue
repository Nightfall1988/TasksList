<template>

    
    <div id="wrapper">

        <div v-if="tasks">
<!-- Display tasks -->
<div id="task-table">
  <br>
  <button @click="confirmDelete">Delete selected</button>
  <br>
  <br>
    <table>
            <tr>
                <td></td>
                <td>Title</td>
                <td>Description</td>
                <td>Status</td>
                <td>Created At</td>
            </tr>
            <tr v-for="(task, i) in tasks" :key="task.id">
                <td><input type="checkbox" v-model="task.selected"></td>
                <td>{{ task.title }}</td>
                <td>{{ task.description }}</td>
            <td>
                <span v-if="task.completed === 1" style="color: rgb(5, 168, 81);">
                Completed
                </span>
                <span v-else style="color: rgb(207, 11, 11);">
                Incomplete
                </span>
            </td>
                <td>{{ getFormattedDate(task.created_at) }}</td>
                <td><a :href="'/get-task/' + task.id">Profile</a></td>
                <td><a :href="'/edit-new-task/' + task.id">Edit</a></td>
                <td><button @click="completeTask(task.id)">Complete</button></td>
            </tr>
    </table>
  <br>
  <nav>
            <ul class="pagination">
                <li v-if="pagination.prev_page_url">
                <a @click="getTasks(pagination.prev_page_url)" aria-label="Previous">
                    <i class="fas fa-arrow-left"></i> Previous
                </a>
                </li>

                <li v-for="page in generatePaginationLinks()" :key="page.url" :class="{ active: pagination.current_page === page.url }">
                    <a @click="getTasks(page.url)">
                        {{ page.label }}
                    </a>
                </li>

                <li v-if="pagination.next_page_url">
                <a @click="getTasks(pagination.next_page_url)" aria-label="Next">
                    Next <i class="fas fa-arrow-right"></i>
                </a>
                </li>
            </ul>
            </nav>
</div>

    </div>

        <div v-else>
            Loading tasks...
        </div>
    </div>
    </template>
    
    <script>
    import axios from 'axios';
    import moment from 'moment';

    export default {
        data() {
            return {
                tasks: [],
                pagination: {},
            };
        },
        mounted() {
            this.getTasks('/tasks');
        },
        methods: {
            confirmDelete() {
                const isConfirmed = window.confirm('Are you sure you want to delete these tasks?');

                if (isConfirmed) {
                    const selectedTasks = this.tasks.filter(task => task.selected);
                    if (selectedTasks.length > 0) {
                        for (let i = 0; i < selectedTasks.length; i++) {
                            axios.post('/delete-task/' + selectedTasks[i].id, {})
                        }
                        window.location.reload();
                    } else {
                        alert('No tasks selected.');
                    }
                }
            },

            generatePaginationLinks() {
                const links = [];
                for (let page = 1; page <= this.pagination.last_page; page++) {
                links.push({
                    url: `/tasks?page=${page}`,
                    label: page.toString(),
                });
                }
                return links;
            },
    
            editTask(index) {
                const taskToEdit = this.tasks[index];
                console.log(taskToEdit.id)
                axios.get('/edit-new-task/' + taskToEdit.id, {})
                .catch(function (error) {
                    console.log(error);
                });
            },

            completeTask(id) {
                axios.post('/complete-task/' + id, {
                    	title: this.title,
                        description: this.description,
                })
                .catch(function (error) {
                    console.log(error);
                });
                window.location.reload();

            },

            getFormattedDate(date) {
                return moment(date).format("DD/MM/YYYY HH:MM")
            },

            getTasks(pageUrl) {
                console.log('Fetching tasks from:', pageUrl);
                axios.get(pageUrl)
                .then(response => {
                    this.tasks = response.data.data;
                    this.pagination = response.data;
                })
                .catch(error => {
                    console.error('Error fetching tasks:', error);
                });
            },
        },
    };
    </script>
    