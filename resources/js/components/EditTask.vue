<template>
    <div>
        <div id="add-transaction-form">
            <form method='post' action="/edit-new-task" @submit.prevent="submit">
                <input id='id' name='id' type="text" v-model="task.id" hidden/>
                <label for="title">Title:</label>
                <input id='title' name='title' type="text" v-model="task.title"/>
                <label for="description">Description:</label>
                <input id='description' name='description' type="text" v-model="task.description" value="{{ task.description }}"/>
                <br>
                <button>Edit task</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['task'],
        data: function() {
            return {
                id: '',
                title: '',
                description: '',
            }
        },

        methods: {
            submit : function(e) {
                this.saveTransaction()
            },

            async saveTransaction() {
                axios.post('/edit-new-task', {
                        id: this.id,
                    	title: this.title,
                        description: this.description,
                })
                .catch(function (error) {
                    console.log(error);
                });
                window.location.href = '/'
            },
        }
    }
</script>

<style scoped>
    /* Component-specific styles go here */
</style>
