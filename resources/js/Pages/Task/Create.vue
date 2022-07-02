<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeInputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  task:Object,
});

const form = useForm({
  task_name: props.task?.task_name,
  start_task: props.task?.start_task,
  end_task: props.task?.end_task,
});

function submitForm() {
      props.task
        ? form.patch(route("tasks.update", props.task.id), {
          onSuccess: () => form.reset(),
      })
      : form.post(route("tasks.store"));
  
}

// console.log(form);

</script>

<template>

  <Head title="Create Task" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Create Task
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <diV>
          <div class="w-full rounded-lg bg-white p-6 shadow-lg mx-auto">
            <form @submit.prevent="submitForm">
              <div class="grid-cols-2 grid gap-10">
                <div class="mb-6 col-span-2 md:col-span-2">

                  <BreezeLabel for="task_name" value="Task Name" />
                  <BreezeInput id="task_name" type="text"
                    class=" m-0 mt-3 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                    v-model="form.task_name" autofocus />
                  <BreezeInputError :message="form.errors.task_name" />

                </div>


                <div class="mb-6 col-span-2 md:col-span-1">



                  <BreezeLabel for="start_task" value="Start Time" />
                  <BreezeInput id="start_task" type="time"
                    class=" m-0 mt-3 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                    v-model="form.start_task" autofocus />
                  <BreezeInputError :message="form.errors.start_task" />

                </div>
                <div class="mb-6 col-span-2 md:col-span-1">

                  <BreezeLabel for="end_task" value="Start Time" />
                  <BreezeInput id="end_task" type="time"
                    class=" m-0 mt-3 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                    v-model="form.end_task" autofocus />
                  <BreezeInputError :message="form.errors.end_task" />

                </div>
              </div>

              <button type="submit" :disabled="form.processing"
                class="rounded bg-blue-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                Submit
                
              </button>
            </form>
          </div>
        </diV>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
