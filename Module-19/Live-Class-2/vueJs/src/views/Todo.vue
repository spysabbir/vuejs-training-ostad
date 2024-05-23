<template>
  <div class="bg-gray-100 flex flex-col items-center p-4">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-xl">
      <h1 class="text-3xl font-bold mb-4 text-center">Todo</h1>
      <div class="mb-4 bg-slate-500 p-1">
        <input v-model="newTodo" @keyup.enter="addTodo" class="border rounded w-full py-2 px-3 text-gray-700" placeholder="Add a new todo"/>
        <div class="flex justify-between mt-2">
          <input v-model="newDueDate" type="date" class="border rounded w-full py-2 px-3 text-gray-700"/>
          <select v-model="newPriority" class="border rounded w-full py-2 px-3 mx-2 text-gray-700">
            <option value="">Select Priority</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
          </select>
          <button @click="addTodo" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add
          </button>
        </div>
      </div>
      <div class="mb-4 flex justify-between">
        <input v-model="searchQuery" class="border rounded w-full py-2 px-3 text-gray-700" placeholder="Search todos"/>
        <select v-model="priorityFilter" @change="filterTodosByPriority" class="border rounded px-4 py-2 mx-1 text-gray-700">
          <option value="">Priority</option>
          <option value="Low">Low</option>
          <option value="Medium">Medium</option>
          <option value="High">High</option>
        </select>
        <button @click="filterTodos('all')" :class="{'bg-blue-500 text-white': filter === 'all', 'bg-gray-200 text-gray-700': filter !== 'all'}" class="px-3 py-2 rounded hover:bg-gray-300 mx-1">
          All
        </button>
        <button @click="filterTodos('active')" :class="{'bg-blue-500 text-white': filter === 'active', 'bg-gray-200 text-gray-700': filter !== 'active'}" class="px-3 py-2 rounded hover:bg-gray-300 mx-1">
          Active
        </button>
        <button @click="filterTodos('completed')" :class="{'bg-blue-500 text-white': filter === 'completed', 'bg-gray-200 text-gray-700': filter !== 'completed'}" class="px-3 py-2 rounded hover:bg-gray-300">
          Completed
        </button>
      </div>
      <div class="bg-gray-200 p-2">
        <ul v-if="filteredAndSearchedTodos.length > 0">
          <li v-for="todo in filteredAndSearchedTodos" :key="todo.id" class="flex justify-between items-center border-b py-2">
            <div class="flex items-center">
              <input type="checkbox" v-model="todo.completed" @change="saveTodosToLocalStorage" class="mr-2"/>
              <span :class="{'line-through text-green-500': todo.completed}" @dblclick="editTodo(todo)">
                {{ todo.text }} (Due: {{ todo.dueDate }}) <span class="badge bg-indigo-500 px-1 rounded">{{ todo.priority }}</span>
              </span>
            </div>
            <div>
              <button @click="deleteTodo(todo.id)" class="text-red-500 hover:text-red-700 mr-2">
                Delete
              </button>
              <button @click="editTodo(todo)" class="text-blue-500 hover:text-blue-700">
                Edit
              </button>
            </div>
          </li>
        </ul>
        <div v-else class="text-center text-gray-500 py-4">Todo not found</div>
      </div>
      <div class="bg-gray-200 p-4 mt-4 rounded-lg flex justify-between">
        <p>Total Todos: {{ totalTodos }}</p>
        <p>Active Todos: {{ activeTodos }}</p>
        <p>Completed Todos: {{ completedTodos }}</p>
      </div>
      <div class="bg-gray-200 p-4 flex justify-between mt-4">
        <button @click="deleteAllTodos" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
          Delete All Todos
        </button>
        <button @click="deleteAllCompletedTodos" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
          Delete All Completed Todos
        </button>
      </div>
    </div>

    <div v-if="editingTodo" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
      <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Edit Todo</h2>
        <input v-model="editingTodo.text" @keyup.enter="updateTodo" class="border rounded w-full py-2 px-3 text-gray-700 mb-2" placeholder="Edit todo"/>
        <input v-model="editingTodo.dueDate" type="date" class="border rounded w-full py-2 px-3 text-gray-700 mb-2"/>
        <select v-model="editingTodo.priority" class="border rounded w-full py-2 px-3 text-gray-700 mb-2">
          <option value="Low">Low</option>
          <option value="Medium">Medium</option>
          <option value="High">High</option>
        </select>
        <button @click="updateTodo" class="mt-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">
          Update
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import showAlert from '../helpers/alert';

const newTodo = ref('');
const newDueDate = ref('');
const newPriority = ref('');
const searchQuery = ref('');
const priorityFilter = ref('');
const todos = ref([]);
const filter = ref('all');
const editingTodo = ref(null);

const addTodo = () => {
  if (!newTodo.value.trim() || !newDueDate.value || !newPriority.value) {
    showAlert('error', "Please enter a todo, due date, and priority");
    return;
  }

  todos.value.unshift({
    id: Date.now(),
    text: newTodo.value.trim(),
    dueDate: newDueDate.value,
    priority: newPriority.value,
    completed: false,
  });

  saveTodosToLocalStorage();
  newTodo.value = '';
  newDueDate.value = '';
  newPriority.value = '';
  showAlert('success', 'Todo added successfully!');
};

const deleteTodo = (id) => {
  todos.value = todos.value.filter(todo => todo.id !== id);
  saveTodosToLocalStorage();
  showAlert('success', 'Todo deleted successfully!');
};

const deleteAllTodos = () => {
  todos.value = [];
  saveTodosToLocalStorage();
  showAlert('success', 'All todos deleted successfully!')
};

const deleteAllCompletedTodos = () => {
  todos.value = todos.value.filter(todo => !todo.completed);
  saveTodosToLocalStorage();
  showAlert('success', 'All completed todos deleted successfully!')
};

const editTodo = (todo) => {
  editingTodo.value = { ...todo };
};

const updateTodo = () => {
  if (!editingTodo.value.text.trim() || !editingTodo.value.dueDate || !editingTodo.value.priority) {
    showAlert('error', "Please enter a todo, due date, and priority")
    return;
  }

  const index = todos.value.findIndex(todo => todo.id === editingTodo.value.id);
  if (index !== -1) {
    todos.value[index] = { ...editingTodo.value };
    saveTodosToLocalStorage();
    editingTodo.value = null;
    showAlert('success', 'Todo updated successfully!');
  }
};

const filterTodos = (status) => {
  filter.value = status;
};

const filterTodosByPriority = () => {
  filter.value = 'priority';
};

const filteredAndSearchedTodos = computed(() => {
  let filtered = todos.value;
  if (filter.value === 'active') {
    filtered = todos.value.filter(todo => !todo.completed);
  } else if (filter.value === 'completed') {
    filtered = todos.value.filter(todo => todo.completed);
  } else if (filter.value === 'priority' && priorityFilter.value) {
    filtered = todos.value.filter(todo => todo.priority === priorityFilter.value);
  }
  if (searchQuery.value) {
    filtered = filtered.filter(todo =>
      todo.text.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
  }
  return filtered;
});

const totalTodos = computed(() => todos.value.length);
const activeTodos = computed(() => todos.value.filter(todo => !todo.completed).length);
const completedTodos = computed(() => todos.value.filter(todo => todo.completed).length);

const saveTodosToLocalStorage = () => {
  localStorage.setItem('todos', JSON.stringify(todos.value));
};

const loadTodosFromLocalStorage = () => {
  const storedTodos = localStorage.getItem('todos');
  if (storedTodos) {
    todos.value = JSON.parse(storedTodos);
  }
};

onMounted(() => {
  loadTodosFromLocalStorage();
});
</script>

<style scoped>
</style>
