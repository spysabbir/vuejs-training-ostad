<script setup>
    import { ref } from 'vue'
    import todos from './../assets/todo'
    import fun from './../function'

    const getStorageData = () => {
        todos.length = 0;
        const storedTodos = fun.getTodosStorage();
        storedTodos.forEach(todo => {
            todos.push(todo)
        });
    }
    getStorageData();

    const activeTab = ref('all')
    const getTodos = () => {
        if (activeTab.value === 'all') {
            return todos;
        }
        return todos.filter(todo => todo.status === activeTab.value);
    };
    const newTodoName = ref('')
    const addNewTodo = () => {
        if(!newTodoName.value){
            alert('Please enter your todo name!')
        }else{
            let todoId = todos.length+1;
            todos.unshift({id:todoId, name:newTodoName.value, status: 'pending'});
            newTodoName.value = ''
            fun.updateTodosStorage(todos)
        }
    }
    const changeTodoStatus = (todoId) => {
        const todoIndex = todos.findIndex(todo => todo.id === todoId);
        todos[todoIndex].status = todos[todoIndex].status === 'pending' ? 'complete' : 'pending';
        fun.updateTodosStorage(todos)
    }
    const deleteTodo = (todoId) => {
        const todoIndex = todos.findIndex(todo => todo.id === todoId);
        todos.splice(todoIndex, 1);
        fun.updateTodosStorage(todos)
    }
    const editTodoId = ref(null)
    const editTodoName = ref('')
    const editTodo = (todoId) => {
        const todoToEdit = todos.find(todo => todo.id === todoId);
        editTodoId.value = todoToEdit.id;
        editTodoName.value = todoToEdit.name;
    }
    const updateTodo = () => {
        const todoIndex = todos.findIndex(todo => todo.id === editTodoId.value);
        todos[todoIndex].name = editTodoName.value;
        editTodoId.value = null;
        editTodoName.value = '';
        fun.updateTodosStorage(todos)
    }
    const clearAllTodo = () => {
        if (activeTab.value === 'all') {
            todos.splice(0, todos.length);
        } else if (activeTab.value === 'pending') {
            const completeTodos = todos.filter(todo => todo.status === 'complete');
            todos.splice(0, todos.length, ...completeTodos);
        } else if (activeTab.value === 'complete') {
            const pendingTodos = todos.filter(todo => todo.status === 'pending');
            todos.splice(0, todos.length, ...pendingTodos);
        }
        fun.updateTodosStorage(todos)
    }
</script>

<template>
    <!-- component -->
    <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
        <div class="mb-3 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-medium">Todo list</h1>
                <p class="text-slate-500">Hello, here are your latest tasks</p>
            </div>
            <div class="flex justify-between items-center">
                <button type="button" @click="activeTab = 'all'" class="px-2 py-1 rounded text-white mx-1" :class="activeTab == 'all' ? 'bg-orange-500' : 'bg-slate-500'">All</button>
                <button type="button" @click="activeTab = 'pending'" class="px-2 py-1 rounded text-white mx-1" :class="activeTab == 'pending' ? 'bg-orange-500' : 'bg-indigo-500'">Pending</button>
                <button type="button" @click="activeTab = 'complete'" class="px-2 py-1 rounded text-white mx-1" :class="activeTab == 'complete' ? 'bg-orange-500' : 'bg-green-500'">Complete</button>
            </div>
        </div>
        <div class="my-2">
            <form @submit.prevent="addNewTodo()" class="flex flex-row justify-between items-center">
                <input type="text" v-model="newTodoName" class="border w-full p-2 rounded" placeholder="Enter todo name...">
                <button class="px-5 py-3 border border-slate-200 rounded-md inline-flex space-x-1 items-center bg-indigo-500 hover:bg-indigo-400">
                    <span class="text-sm text-white">Add</span>              
                </button>
            </form>
        </div>
        <div class="my-5 border p-2 rounded">
            <div v-for="todo in getTodos()" :key="todo.id" class="border-b mb-1 transition ease-linear duration-150" :class="'complete' == todo.status ? 'border-green-200 py-3 px-2 border-l-4 border-l-green-300 bg-gradient-to-r from-green-100 to-transparent hover:from-green-200' : 'border-indigo-200 py-3 px-2 border-l-4 border-l-indigo-300 bg-gradient-to-r from-indigo-100 to-transparent hover:from-indigo-200'">
                <div class="flex justify-between items-center" v-if="editTodoId != todo.id">
                    <div @click="changeTodoStatus(todo.id)">
                        <svg v-if="'complete' == todo.status" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500 hover:text-green-600 hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                            <circle cx="12" cy="12" r="9" stroke-width="1.5" stroke="currentColor" fill="none"></circle>
                            <circle cx="12" cy="12" r="6" stroke-width="1.5" stroke="currentColor" fill="none"></circle>
                            <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke="currentColor" fill="none"></circle>
                        </svg>
                    </div>
                    <div class="px-2" @click="editTodo(todo.id)">
                        <div class="text-slate-500" :class="'complete' == todo.status ? 'line-through' : ''">{{ todo.name }}</div>
                    </div>
                    <div @click="deleteTodo(todo.id)" class="text-red-500 hover:text-red-700 hover:cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>                      
                    </div>
                </div>
                <div v-else>
                    <form @submit.prevent="updateTodo()" class="flex flex-row justify-between items-center">
                        <input type="text" v-model="editTodoName" class="border w-full p-2 rounded">
                        <button class="px-3 py-2 border border-slate-200 rounded-md inline-flex space-x-1 items-center bg-indigo-500 hover:bg-indigo-400">
                            <span class="text-sm text-white">Update</span>              
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-red-400 text-center mt-2" v-if="getTodos().length <= 0">Todo not available!</p>
        </div>
        <div class="flex justify-end my-2">
            <button class="text-xs text-red-500" @click="clearAllTodo()">Clear All</button>
        </div>
        <p class="text-xs text-slate-500 text-center">Total {{ todos.length }}, Pending {{ todos.filter(todo => todo.status === 'pending').length }}, Complete {{ todos.filter(todo => todo.status === 'complete').length }}</p>
    </div>
</template>

<style scoped>

</style>
