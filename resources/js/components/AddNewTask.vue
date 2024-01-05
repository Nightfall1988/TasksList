<template>
    <div id="wrapper">
        <div id="task-table">
            <table>
                <tr>
                    <td>Title</td>
                    <td>Description</td>                
                    <td>Completed</td>                
                    <td>Created At</td>
                </tr>
                <tr v-bind:key="i" v-for="(task,i) in tasks">
                    <td>{{task.id}}</td>
                    <td>{{task.Title}}</td>
                    <td>{{task.Description}}</td>
                    <td>{{task.Completed}}</td>
                    <td><a :href="/get-task/+ task.id">Profile</a></td>
                </tr>
            </table>
        </div>
        <br>
        <div id="add-transaction-form">
            <form method='post' action="/add-transaction" @submit.prevent="submit">
                <select v-model="selected" @change="loadTask">
                    <option v-for="(task, i) in tasks" v-bind:value="task.id" v-bind:key="i">
                        {{ task.title }}
                    </option>
                </select>
                <label for="completed">Completed:</label>
                <input id='completed' ref='completed' name='completed' type="text" @keydown="getCompleted" @change="updatePrice" v-model="completed"/>
                <label for="price">Price:</label>
                <input id='price' name='price' type="text" v-model="price" readonly/>
                <label for="total">Total:</label>
                <input id='total' name='total' type="text" v-model="total"/>
                <br>
            </form>
        </div>
    </div>
    </template>
    
    <script>
    import axios from 'axios';
    
        export default {
            props: ['tasks'], // Declare the 'tasks' prop here

            // data: function() {
            //     return {
            //         tasks: [],
            //         company_id: '',
            //         task: {},
            //         companytasks: [],
            //         inStock: 0,
            //         inStockMessage: '',
            //         time: '',
            //         price: '',
            //         completed: 1,
            //         selected: '',
            //         total: 0
            //     }
            // },
            // mounted() {
            //     // this.loadCompany();
            //     // this.loadTasks();
            //     // this.getCompanytasks();
            // },
    
            // methods: {
            //     loadCompany: function() {
            //         let $id = this.$attrs.company_id;
            //         axios.get('/ajax/get-company/' + $id)
            //         .then((response) => {
            //             this.company = response.data
            //             })
            //         .catch(function(error) {
            //             console.log('Error in company retrieval')
            //         });
            //     },
    
            //     loadTasks: function() {
            //         axios.get('/all-tasks')
            //         .then((response) => {
            //             this.tasks = response.data
            //             })
            //         .catch(function(error) {
            //             console.log('Error in task retrieval')
            //         });
            //     },
    
            //     loadTask: function(e) {
            //         let $id = e.target.value;
            //         axios.get('/ajax/get-task/' + $id)
            //         .then((response) => {
            //             this.task = response.data;
            //             this.completed = this.$refs.completed.value;
            //             this.price = this.task.price
            //             this.inStock = this.task.completed_in_stock;
            //             this.updatePrice();
            //             })
            //         .catch(function(error) {
            //             console.log('Error in company retrieval')
            //         });
            //     },
    
            //     updatePrice : function() {
            //         if (this.isDisabled()) {
            //             this.inStockMessage = 'There is not enough items in stock or completed isn\'t a number';
            //         } else {
            //             this.inStockMessage = ''
            //             this.total = (this.completed * this.price).toFixed(2);         
            //         }
            //     },
    
            //     submit : function(e) {
            //         e.preventDefault();
            //         this.saveTransaction()
            //         this.populateTable()
            //     },
    
            //     async saveTransaction() {
            //         axios.post('/save-transaction', {
            //                 task: this.task.title,
            //                 description: this.task.description,
            //                 completed: this.completed,
            //                 price: this.total
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         });
            //     },
    
            //     getCompanytasks: function() {
            //         let id = this.$attrs.company_id;
            //         axios.get('/all-company-tasks/' + id)
            //         .then((response) => {
            //             this.companytasks = response.data
            //             this.loadTasks();
            //             })
            //         .catch(function(error) {
            //             console.log('Error in task retrieval')
            //         });
            //     },
    
            //     populateTable: function() {
            //         this.getCompanytasks();
            //     },

    
            //     getCompleted: function () {
            //             this.completed = this.$refs.completed.value;
            //         }
            // }
        }
    </script>
    