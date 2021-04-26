<template>
    <layout>
        <div class="px-5">
            <div class="flex py-3">
                <h1 class="inline-block font-semibold">Users</h1>
                <a href="#" class="btn-action">Add New</a>
            </div>
            <table class="table">
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

        <!-- <div>
      <div>
        <pre>{{ data }}</pre>
      </div>
      <div>
        <form @submit.prevent="submit">
          <label>Name</label>
          <input v-model="form.name" />
          <br />
          <label>Email:</label>
          <input v-model="form.email" />
          <br />
          <label>Password:</label>
          <input v-model="form.password" type="password" />
          <br />
          <button type="submit">Submit</button>
          <br />
          <div v-if="$page.errors.email">{{ $page.errors.email[0] }}</div>
        </form>
      </div>
    </div>-->
    </layout>
</template>

<script>
import Layout from "./../Layouts/BackendLayout";
export default {
    props: {
        data: Array,
    },

    components: {
        Layout,
    },

    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
            },
        };
    },

    methods: {
        submit() {
            this.$inertia.post("/users?req=write", this.form);
        },
    },
};
</script>

<style></style>
