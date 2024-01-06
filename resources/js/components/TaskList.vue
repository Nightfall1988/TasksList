<template>
    <div id="wrapper">
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
                <tr v-bind:key="i" v-for="(task,i) in tasks">
                    <td><input type="checkbox" v-model="task.selected"></td>
                    <td>{{task.title}}</td>
                    <td>{{task.description}}</td>
                    <td>
                        <span v-if="task.completed === 1" style="color: rgb(5, 168, 81);">
                            Completed
                        </span>
                        <span v-else style="color: rgb(207, 11, 11);">
                            Incomplete
                        </span>
                    </td>
                    <td>{{getFormattedDate(task.created_at)}}</td>
                    <td><a :href="/get-task/+ task.id">Profile</a></td>
                    <td><a :href="/edit-new-task/ + task.id">Edit</a></td>
                    <td><button @click="completeTask(task.id)">Complete</button></td>
                </tr>
            </table>
        </div>

        <br>
    </div>
    </template>
    
    <script>
    import axios from 'axios';
    import moment from 'moment';

    export default {
        props: ['tasks'],
    
        methods: {
            confirmDelete() {
                const isConfirmed = window.confirm('Are you sure you want to delete these tasks?');
    
                if (isConfirmed) {
                    const selectedTasks = this.tasks.filter(task => task.selected);
                    if (selectedTasks.length > 0) {
                        for (let i=0; i<selectedTasks.length; i++) {
                            axios.post('/delete-task/' + selectedTasks[i].id, {})
                            .catch(function (error) {
                                console.log(error);
                            });
                        }
                        window.location.reload();
                    } else {
                        alert('No tasks selected.');
                    }
                }
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
            }
        }
    };
    </script>
    