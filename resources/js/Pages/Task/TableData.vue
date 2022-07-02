<script setup>
const props = defineProps({
    task: Object,
    updateTask: Function,
    deleteTask:Function,
});
</script>

<template>

    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
        {{task.created_at}}

    </td>
    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">

        <input
            class="m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
            type="text" v-model="task.task_name" />
    </td>
    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">

        <input
            class="m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
            type="time" v-model="task.start_task" />
    </td>
    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">

        <input
            class="m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
            type="time" v-model="task.end_task" />
    </td>
    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
        {{ task.total_time }}
    </td>
    <td
        class="border-b flex space-x-2 border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
        <button
            class="bg-green-500 text-white px-3 text-sm py-1 rounded-md shadow-sm hover:bg-green-600 hover:shadow-lg"
            @click="UpdateTask(task)">
            Update
        </button>
        <button class="bg-red-500 text-white px-3 text-sm py-1 rounded-md shadow-sm hover:bg-red-600 hover:shadow-lg"
            @click="deleteTask(task)">
            Delete
        </button>
    </td>
</template>
