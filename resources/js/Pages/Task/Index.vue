<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { formatDateTypeTwo } from '/resources/js/Utils/Common.js';


const props = defineProps({
    tasks:Object,
});


const form = useForm({
    task_name: '',
    start_task: '',
    end_task: '',
});


function UpdateTask(task) {
    form.task_name = task.task_name;
    form.start_task = task.start_task;
    form.end_task = task.end_task;
    form.patch(route('tasks.update', task.id));
}

function deleteTask(task) {
    console.log(task);
    form.delete(route('tasks.destroy', task.id)); 
    
}




</script>


<template>

    <Head title="Tasks" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-14">
                <Link :href="route('tasks.create')"
                    class="bg-blue-600 text-white float-right px-4 py-2 rounded-md shadow-md hover:bg-blue-700 hover:shadow-lg">
                Create
                Task</Link>
            </div>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="shadow-sm overflow-auto my-8">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead class="bg-gray-500 text-white">
                            <tr>
                                <th class="py-3">Date</th>
                                <th class="py-3">Task Name</th>
                                <th class="py-3">Start Time</th>
                                <th class="py-3">End Time</th>
                                <th class="py-3">Duration</th>
                                <th class="py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800">
                            <tr v-for="task in tasks" :key="task.id">
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ formatDateTypeTwo(new Date(task.created_at))}}

                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">

                                    <input
                                        class="m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        type="text" v-model="task.task_name" />
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">

                                    <input
                                        class="m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        type="time" v-model="task.start_task" />
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">

                                    <input
                                        class="m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        type="time" v-model="task.end_task" />
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ task.total_time }}
                                </td>
                                <td
                                    class="border-b flex space-x-2 border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    <button
                                        class="bg-green-500 text-white px-3 text-sm py-1 rounded-md shadow-sm hover:bg-green-600 hover:shadow-lg"
                                        @click="UpdateTask(task)">
                                        Update
                                    </button>
                                    <Link :href="route('tasks.edit',task.id)"
                                        class="bg-blue-500 text-white px-3 text-sm py-1 rounded-md shadow-sm hover:bg-blue-600 hover:shadow-lg"
                                        >
                                        Edit
                                    </Link>
                                    <button
                                        class="bg-red-500 text-white px-3 text-sm py-1 rounded-md shadow-sm hover:bg-red-600 hover:shadow-lg"
                                        @click="deleteTask(task)">
                                        Delete
                                    </button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>