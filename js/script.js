const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: 'server.php',
            todoList: [],
            todoNew: ''
        }
    },
    mounted() {
        this.getTodoList();
    },
    methods: {
        // metodo per recuperare la lista dei task dal server
        getTodoList() {
            axios.get(this.apiUrl).then((response) => {
                this.todoList = response.data;
            })
        },

        // metodo per aggiungere un Todo alla lista
        addTodo() {
            // creiamo l'oggetto' data
            const data = {
                name: this.todoNew,
            }

            // passiamo l'oggetto appena creato alla chiamata POST 
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoNew = '';
                this.todoList = response.data;
            });
        },

        // metodo per eliminare un Todo dalla lista
        removeTodo(key) {
            const data = {
                index: key
            }

            // passiamo la variabile appena creata alla chiamata POST 
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoList = response.data;
            });
        },

        // metodo per cambiare lo status di un Todo (done: true/false)
        toggleTodoStatus(key) {
            const data = {
                todoIndex: key
            }
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoList = response.data;
            })
        }
    }
}).mount('#app')