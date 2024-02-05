import { reactive } from 'vue'

const todos = reactive([
    { id:1, name: 'Todo 1', status: 'complete' },
    { id:2, name: 'Todo 2', status: 'pending' },
    { id:3, name: 'Todo 3', status: 'complete' },
    { id:4, name: 'Todo 4', status: 'pending' },
])

export default todos;