import { defineStore } from "pinia";

export const useTodos = defineStore('todos', {
    // State
    state: () => ({
        todos: [],
        filter: 'all',
        nextId: 0
    }),
    // Getters
    getters: {
        filteredTodos() {
            if(this.filter === 'finished') {
                return this.todos.filter(todo => todo.isFinished)
            }else if(this.filter === 'unfinished') {
                return this.todos.filter(todo => !todo.isFinished)
            }else{
                return this.todos;
            }
        },
    },
    // Actions
    actions: {
        addTodo(title) {
            this.todos.push({
                title: title,
                id: this.nextId++,
                isFinished: false,
            })
        }
    }
})