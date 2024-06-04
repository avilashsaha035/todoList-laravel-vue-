<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header text-center fw-bold h2">Manage your Time Effectly!</div>

                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" placeholder="ToDo.." class="form-control" aria-lable="todo" aria-describedby="todo">
                            <div class="input-group-append">
                                <button class="btn bg-teal-500 hover:bg-teal-400 text-white">Add</button>
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
                                <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
