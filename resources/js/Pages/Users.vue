<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users Management
            </h2>
        </template>

        <div class="my-6 p-3 mx-3 lg:mx-12 bg-white">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="relative">
                    <button class="btn mr-2 mb-2 py-2" @click="newData()">
                        New Data
                    </button>
                </div>
                <div class="block relative mb-4">
                    <i
                        class="absolute top-2 left-2 fa fa-search text-gray-400 z-20 hover:text-gray-500"
                    ></i>
                    <input
                        placeholder="Search"
                        class="input pl-8 pr-6 py-1 w-full"
                    />
                    <button class="py-1 m-1 btn absolute top-0 right-0">
                        Search
                    </button>
                </div>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                >
                    <div
                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                    >
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Title
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Status
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Role
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="obj in data.data" :key="obj.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10"
                                            >
                                                <img
                                                    class="h-10 w-10 rounded-full"
                                                    :src="obj.profile_photo_url"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="ml-4">
                                                <div
                                                    class="text-sm font-medium text-gray-900"
                                                >
                                                    {{ obj.name }}
                                                </div>
                                                <div
                                                    class="text-sm text-gray-500"
                                                >
                                                    {{ obj.email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            Regional Paradigm Technician
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Optimization
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                                        >
                                            Active
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                    >
                                        Admin
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                    >
                                        <a
                                            href="#"
                                            class="text-indigo-600 hover:text-indigo-900"
                                            @click.prevent="editData(obj.id)"
                                            >Edit</a
                                        >
                                        <a
                                            href="#"
                                            class="ml-3 text-indigo-600 hover:text-indigo-900"
                                            @click.prevent="deleteData(obj.id)"
                                            >Delete</a
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div
                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between"
            >
                <span class="text-xs xs:text-sm text-gray-900">
                    Showing 1 to 4 of 50 Entries
                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    <button
                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l"
                    >
                        Prev
                    </button>
                    <button
                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r"
                    >
                        Next
                    </button>
                </div>
            </div>
        </div>
    </layout>
    <jet-dialog-modal :show="showModal" @close="closeModal">
        <template #title>
            {{ form.id ? "Edit data" : "New data" }}
        </template>

        <template #content>
            <div class="col-span-6 sm:col-span-4">
                <label class="label">Name</label>
                <input
                    type="text"
                    class="input mt-1 block w-full"
                    v-model="form.name"
                />
                <p class="input-error mt-2">{{ form.errors.name }}</p>
            </div>
            <div class="col-span-6 sm:col-span-4 mt-2">
                <label class="label">Email</label>
                <input
                    type="text"
                    class="input mt-1 block w-full"
                    v-model="form.email"
                />
                <p class="input-error mt-2">{{ form.errors.email }}</p>
            </div>
        </template>

        <template #footer>
            <button class="btn-secondary mr-2" @click="closeModal">
                Cancel
            </button>
            <button
                class="btn"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                @click="writeData"
            >
                Save
            </button>
        </template>
    </jet-dialog-modal>
</template>

<script>
import Layout from "@/Layouts/AppLayout";
import JetDialogModal from "@/Jetstream/DialogModal";
import axios from "axios";

export default {
    props: {
        data: Object,
        errors: Object,
    },

    components: {
        Layout,
        JetDialogModal,
    },

    data() {
        return {
            showModal: false,
            form: this.$inertia.form({
                id: null,
                name: null,
                email: null,
                password: null,
            }),
        };
    },

    created() {},

    methods: {
        submit() {
            this.form.post(url("/b/users?req=write"));
        },
        newData() {
            this.showModal = true;
        },
        async editData(id) {
            const response = await axios.get(
                url("/b/users?req=single&id=" + id)
            );
            // VALIDATE OBJ
            this.form.id = response.data.id;
            this.form.name = response.data.name;
            this.form.email = response.data.email;
            this.showModal = true;
        },
        closeModal() {
            this.form.reset();
            this.form.clearErrors();
            this.showModal = false;
        },
        async writeData() {
            this.form.post(url("/b/users?req=write"));
        },
    },
};
</script>

<style></style>
