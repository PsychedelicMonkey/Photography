<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home Page" />

    <AppLayout>
        <div class="mx-auto max-w-7xl p-4 lg:p-6">
            <div class="mb-4">
                <h1 class="text-3xl font-semibold">Home Page</h1>
            </div>

            <fieldset
                class="fieldset w-xs rounded-box border border-base-300 bg-base-200 p-4"
            >
                <label for="email" class="label">Email address</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email address"
                    class="input"
                />

                <label for="password" class="label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    class="input"
                />

                <label class="label">
                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="checkbox"
                    />
                    Remember me
                </label>

                <button type="submit" class="btn btn-neutral">Login</button>
            </fieldset>
        </div>
    </AppLayout>
</template>
