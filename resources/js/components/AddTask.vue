<template>

    <div>
        <div id="add-transaction-form">
            <form method='post' action="/add-new-task" @submit.prevent="submit">
                <label for="title">Title:</label>
                <textarea rows = "20" cols = "50" id='title' name='title' type="text" v-model="title"/>
                <br>
                <label for="description">Description:</label>
                <textarea rows = "20" cols = "50" id='description' name='description' type="text" v-model="description"/>
                <br>
                <button>Save task</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: function() {
            return {
                title: '',
                description: '',
            }
        },
        mounted() {
        },

        methods: {
            submit : function(e) {
                this.saveTransaction()
            },

            async saveTransaction() {
                axios.post('/add-new-task', {
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
</style>
