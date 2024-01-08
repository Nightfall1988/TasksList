<template>
    <div>
        <div id="add-transaction-form">
            <form method='post' action="/edit-new-task/" @submit.prevent="submit">
                <input id='id' name='id' type="text" v-model="task.id" hidden/>
                <label for="title">Title:</label>
                <textarea rows = "20" cols = "50"  id='title' name='title' type="text" v-model="task.title"/>
                <label for="description">Description:</label>
                <textarea id='description' name='description' type="text" v-model="task.description" />
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
                this.saveTask()
            },

            async saveTask() {
                axios.post('/edit-save-task', {
                        id: this.task.id,
                    	title: this.task.title,
                        description: this.task.description,
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
</style>
