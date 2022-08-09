<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <div class="flex justify-center items-center min-h-screen">
        <n-card
            title="Register"
            class="shadow-md"
            style="max-width: 600px; margin: auto"
        >
            <form @submit.prevent="submit">
                <n-form-item
                    ref="name"
                    first
                    id="name"
                    path="reenteredPassword"
                    label="Name"
                >
                    <n-input
                        id="name"
                        type="text"
                        v-model:value="form.name"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Input Name"
                        :loading="form.processing"
                        :status="form.errors.name ? 'error' : 'success'"
                    />
                    <template #feedback>
                        <n-text type="error">{{ form.errors.name }}</n-text>
                    </template>
                </n-form-item>
                <n-form-item
                    ref="email"
                    first
                    id="email"
                    path="reenteredPassword"
                    label="Email"
                >
                    <n-input
                        id="email"
                        type="text"
                        v-model:value="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Input Email"
                        :loading="form.processing"
                        :status="form.errors.email ? 'error' : 'success'"
                    />
                    <template #feedback>
                        <n-text type="error">{{ form.errors.email }}</n-text>
                    </template>
                </n-form-item>
                <n-form-item
                    ref="password"
                    first
                    path="reenteredPassword"
                    label="Password"
                >
                    <n-input
                        id="password"
                        type="password"
                        style="min-width: 100%"
                        v-model:value="form.password"
                        required
                        placeholder="Input Password"
                        autocomplete="current-password"
                        :loading="form.processing"
                        :status="form.errors.password ? 'error' : 'success'"
                    />
                    <template #feedback>
                        <n-text type="error">{{ form.errors.password }}</n-text>
                    </template>
                </n-form-item>
                <n-form-item
                    ref="password_confirmation"
                    first
                    path="password_confirmation"
                    label="Password Confirmation"
                >
                    <n-input
                        id="password_confirmation"
                        type="password"
                        placeholder="Input Password Confirmation"
                        v-model:value="form.password_confirmation"
                        required
                        autocomplete="password_confirmation"
                        :loading="form.processing"
                        :status="form.errors.password_confirmation ? 'error' : 'success'"
                    />
                    <template #feedback>
                        <n-text type="error">{{ form.errors.password_confirmation }}</n-text>
                    </template>
                </n-form-item>

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
                        Register
                    </n-button>
                </div>
            </form>
        </n-card>
    </div>
</template>
