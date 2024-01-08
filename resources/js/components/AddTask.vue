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
                <p v-if="showWarning" style="color: red;" class="text-red-500">Title and description should not exceed 200 characters.</p>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
    data: function () {
        return {
            title: '',
            description: '',
            showWarning: false,
        }
    },
    methods: {
        submit: function (e) {
            if (this.validateFields()) {
                this.saveTransaction();
            } else {
                this.showWarning = true;
            }
        },

        validateFields: function () {
            return this.title.length <= 200 && this.description.length <= 200;
        },

        async saveTransaction() {
            axios.post('/add-new-task', {
                    title: this.title,
                    description: this.description,
                })
                .catch(function (error) {
                    console.log(error);
                });
            window.location.href = '/';
        },
    },
}
</script>

<style scoped>
</style>
