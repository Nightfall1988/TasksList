<template>
    <div id="wrapper">
        <div id="task-table">
            <table>
                <tr>
                    <td></td>
                    <td>Title</td>
                    <td>Description</td>                
                    <td>Completed</td>                
                    <td>Created At</td>
                </tr>
                <tr v-bind:key="i" v-for="(task,i) in tasks">
                    <td>{{task.title}}</td>
                    <td>{{task.title}}</td>
                    <td>{{task.description}}</td>
                    <td>{{task.completed}}</td>
                    <td>{{task.created_at}}</td>
                    <td><a :href="/get-task/+ task.id">Profile</a></td>
                    <td><button @click="completeTask(task.id)">Complete</button></td>
                    <td><button @click="confirmDelete(i,task.title)">Delete</button></td>
                    <td><button @click="editTask(i)">Edit</button></td>
                </tr>
            </table>
        </div>
        <br>
    </div>
    </template>
    
    <script>
    import axios from 'axios';

    export default {
        props: ['tasks'],
    
        methods: {
            confirmDelete(index, title) {
                const taskToDelete = this.tasks[index];
                const isConfirmed = window.confirm('Are you sure you want to delete ' + title + '?');
    
                if (isConfirmed) {
                    console.log('Task to delete:', taskToDelete);
                }
            },
    
            editTask(index) {
                const taskToEdit = this.tasks[index];
                console.log('Task to edit:', taskToEdit);
            },

            completeTask(id) {
                axios.post('/complete-task/' + id, {
                    	title: this.title,
                        description: this.description,
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
        }
    };
    </script>
    