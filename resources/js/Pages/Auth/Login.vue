<script setup lang="ts">
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

    <div class="flex justify-center items-center min-h-screen">
        <n-card
            title="Login"
            class="shadow-md"
            style="max-width: 600px; margin: auto"
        >
            <form @submit.prevent="submit">
                <n-form-item
                    ref="email"
                    first
                    id="email"
                    path="reenteredPassword"
                    label="Email"
                >
                    <n-input
                        id="email"
                        type="email"
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
                        v-model:value="form.password"
                        required
                        autocomplete="current-password"
                        :loading="form.processing"
                        :status="form.errors.password ? 'error' : 'success'"
                    />
                    <template #feedback>
                        <n-text type="error">{{ form.errors.password }}</n-text>
                    </template>
                </n-form-item>
                <n-checkbox class="mt-6" v-model:checked="form.remember">
                    Remember me
                </n-checkbox>

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
        </n-card>
    </div>
</template>

<style module>
.login-wrapper {
    margin: auto;
}
</style>
