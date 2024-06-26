<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header text-center fw-bold h2">Manage your Time Effectively!</div>

                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" placeholder="ToDo.." class="form-control" aria-lable="todo" aria-describedby="todo" v-model="todo_input">
                            <div class="input-group-append">
                                <button v-if="!edit_todo_id" class="btn bg-teal-500 hover:bg-teal-400 text-white" @click="savaTodo()"><i class="las la-plus-circle" style="font-size: 24px;"></i></button>
                                <button v-else class="btn bg-teal-500 hover:bg-teal-400 text-white" @click="updateTodo()">Update</button>
                            </div>
                        </div>

                        <button class="mt-2 btn bg-red-500 hover:bg-red-700 text-white" @click="resetTodo()"><i class="las la-redo-alt" style="font-size: 20px;"></i></button>

                        <table class="table table-bordered mt-3">
                            <thead class="text-center">
                                <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr v-for="(todo,index) in todos" :key="index">
                                    <td>{{ ++index }}</td>
                                    <td>{{ todo.name }}</td>
                                    <td>{{ todo.status }}</td>
                                    <td>
                                        <button class="btn bg-emerald-500 hover:bg-emerald-700 text-white" @click="editTodo(--index)"> <i class="las la-check-circle" style="font-size: 20px;"></i> </button>
                                        <button class="btn bg-sky-700 hover:bg-sky-500 text-white m-2" @click="editTodo(--index)"> <i class="las la-edit" style="font-size: 20px;"></i> </button>
                                        <button class="btn bg-red-500 hover:bg-red-700 text-white" @click="deleteTodo(--index)"> <i class="las la-trash" style="font-size: 20px;"></i> </button>
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
                todo_input: '',
                edit_todo_id: '',
                edit_todo_index: '',
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
                        this.todo_input = '';
                    });
                }
            },
            editTodo(index) {
                if(this.todos[index].id){
                    this.todo_input = this.todos[index].name;
                    this.edit_todo_id = this.todos[index].id;
                    this.edit_todo_index = index;
                }
            },
            updateTodo() {
                if(this.todo_input.length > 0){
                    let data = {'name': this.todo_input}
                    this.axios.patch(this.api+'/'+this.todos[this.edit_todo_index].id,data).then((response) => {
                        this.todos[this.edit_todo_index].name = response.data.name;
                        this.resetTodo();
                    });
                }
            },
            resetTodo() {
                this.todo_input = '';
                this.edit_todo_id = '';
                this.edit_todo_index = '';
            },
            deleteTodo(index) {
                if(this.todos[index].id){
                    this.axios.delete(this.api+'/'+this.todos[index].id).then(response=>{
                        this.todos.splice(index,1);
                    });
                }
            }
        }

    }
</script>
