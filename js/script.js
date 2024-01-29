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
            // creiamo la variabile POST
            const data = {
                name: this.todoNew,
                done: false
            }

            // passiamo la variabile appena creata alla chiamata POST 
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoNew = '';
                this.todoList = response.data;
            });
        }
    },
}).mount('#app')