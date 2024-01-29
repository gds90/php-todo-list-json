<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
    ">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP To Do List</title>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center my-3">
                    <h1>To Do List</h1>
                </div>
                <div class="col-12">
                    <div class="todolist-container">
                        <ul class="list-unstyled ">
                            <li v-for="todo, key in todoList" :key="key">
                                <div class="todo_content" :class="todo.done ? 'text-decoration-line-through' : ''" @click="todoList[key].done = !todoList[key].done">
                                    <span>{{todo.name}}</span>
                                </div>
                            </li>
                        </ul>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="my-2 form-control " name="todo" placeholder="Inserisci nuovo To Do" @keyup.enter="addTodo" v-model="todoNew">
                                    <button @click="addTodo" class="btn btn-success my-2">Aggiungi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/script.js" type="text/javascript"></script>
</body>

</html>