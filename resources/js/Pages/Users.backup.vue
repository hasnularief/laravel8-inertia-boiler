<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3"
                >
                    <a href="#" class="btn" @click="newData()">Add New</a>
                    <button class="btn ml-3" @click="submit()">
                        Test banner
                    </button>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th style="width: 120px">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="obj in data.data" :key="obj.id">
                                <td>
                                    <span class="title">Name</span>
                                    {{ obj.name }}
                                </td>
                                <td>
                                    <span class="title">Email</span>
                                    {{ obj.email }}
                                </td>
                                <td>
                                    <span class="title">Role</span>
                                    {{ obj.role }}
                                </td>
                                <td>
                                    <span class="title">Act</span>
                                    <a
                                        href="#"
                                        class="text-blue-400 hover:text-blue-600 underline"
                                        @click="editData(obj.id)"
                                        >Edit</a
                                    >
                                    <a
                                        href="#"
                                        class="text-blue-400 hover:text-blue-600 underline ml-2"
                                        >Delete</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
