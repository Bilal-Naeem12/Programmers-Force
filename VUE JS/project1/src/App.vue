<script setup>
import { reactive, ref } from 'vue'

const data = reactive({
  status: 'pending',
  tasks: ['Task1', 'Task2', 'Task3', 'Task4', 'Task5'],
  newTask: '',
})

const formError = reactive({ status: '' })
const overlay = reactive({ isLoading: false, status: 'Loading' })
const changeStatus = () => {
  if (data.status === 'pending') {
    data.status = 'resolved'
  } else {
    data.status = 'pending'
  }
}

const handleSubmit = () => {
  if (data.newTask !== '') {
    overlay.isLoading = true
    overlay.status = 'Submitting'
    setTimeout(() => {
      data.tasks.push(data.newTask)
      data.newTask = ''
      formError.status = 'Submitted Successfully'

      overlay.isLoading = false
    }, 1000)
  } else {
    formError.status = 'Your task is Empty'
  }
}

const handleDelete = (index) => {
  overlay.isLoading = true
  overlay.status = 'Deleteing'

  setTimeout(() => {
    data.tasks.splice(index, 1)
    overlay.isLoading = false
  }, 1000)
}
</script>

<template>
  <div class="main-container">
    <div class="left-side">
      <h1>
        User is
        <span
          v-bind:class="{
            'text-green': data.status === `resolved`,
            'text-orange': data.status === 'pending',
          }"
        >
          {{ data.status }}</span
        >
      </h1>
      <button class="btn" @click="changeStatus">Click to change the status</button>
    </div>
    <div class="right-side">
      <h1>Tasks we have</h1>
      <ul>
        <li v-for="(task, index) in data.tasks" :key="task">
          {{ task }} <button @click="handleDelete(index)">x</button>
        </li>
      </ul>
    </div>
  </div>
  <div class="bottom-side">
    <h1>Want to Add more Tasks</h1>
    <p
      v-if="formError.status"
      :style="{ color: formError.status === 'Submitted Successfully' ? 'green' : 'red' }"
    >
      {{ formError.status }}
    </p>
    <form @submit.prevent="handleSubmit">
      <input type="text" v-model="data.newTask" placeholder="Enter task here" />
      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
  <div v-if="overlay.isLoading" class="overlay">
    <p>{{ overlay.status }}...</p>
  </div>
</template>

<style scoped>
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: rgba(255, 255, 255, 0.8);
  z-index: 1000;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2rem;
  font-weight: bold;
  color: black;
}
form {
  margin-top: 20px;
  display: flex;
}
.submit-btn {
  all: unset;
  padding: 15px;
  cursor: pointer;
  color: white;
  font-size: larger;
  background-color: orange;
}
input {
  padding: 10px;
  font-size: 1.2rem;
}

.bottom-side {
  padding: 20px;
}
.text-orange {
  color: orange;
}
.text-green {
  color: green;
}
.main-container {
  color: black;
  display: flex;
  gap: 50px;
  background: white;
  padding: 20px;
  border-radius: 10px;
}

.left-side {
  display: flex;
  width: 50%;
  flex-direction: column;
}
.right-side {
  display: flex;
  width: 50%;
  flex-direction: column;
}

.btn {
  width: fit-content;
  padding: 10px 10px;
  border-radius: 20px;
  cursor: pointer;
  background-color: black;
  color: white;
}
</style>
