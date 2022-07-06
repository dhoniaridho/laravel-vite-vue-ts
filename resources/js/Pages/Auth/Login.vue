<script setup lang="ts">
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <n-input
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model:value="form.email"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div class="mt-4">
            <n-input
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model:value="form.password"
                required
                autocomplete="current-password"
            />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <BreezeCheckbox name="remember" v-model="form.remember" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
            >
                Forgot your password?
            </Link>

            <n-button
                attr-type="submit"
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Log in
            </n-button>
        </div>
    </form>
</template>
