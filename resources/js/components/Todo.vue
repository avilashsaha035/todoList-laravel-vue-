<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header text-center fw-bold h2">Manage your Time Effectly!</div>

                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" placeholder="ToDo.." class="form-control" aria-lable="todo" aria-describedby="todo" v-model="todo_input">
                            <div class="input-group-append">
                                <button class="btn bg-teal-500 hover:bg-teal-400 text-white" @click="savaTodo()">Add</button>
                            </div>
                        </div>

                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(todo,index) in todos" :key="index">
                                    <td>{{ ++index }}</td>
                                    <td>{{ todo.name }}</td>
                                    <td>
                                        <button class="btn bg-red-500 hover:bg-red-400 text-white"> Delete </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todos:[],
                api: 'http://localhost:8000/api/todos',
                todo_input: ''
            }
        },
        mounted() {
            this.axios.get(this.api).then((response) => {
                this.todos = response.data;
            });
        },
        methods:{
            savaTodo() {
                if(this.todo_input.length > 0){
                    let data = {'name': this.todo_input}
                    this.axios.post(this.api,data).then((response) => {
                        this.todos.push(response.data);
                    });
                }
            }
        }

    }
</script>
