<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import AppLayout from '@/layouts/AppLayout.vue';
import { form } from '@/routes';
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home Page" />

    <AppLayout>
        <div class="mx-auto max-w-7xl p-4 lg:p-6">
            <div class="mb-4">
                <h1 class="text-3xl font-semibold">Home Page</h1>
            </div>

            <Form
                :action="form()"
                :reset-on-success="['password']"
                v-slot="{ errors, processing }"
            >
                <fieldset
                    class="fieldset w-xs rounded-box border border-base-300 bg-base-200 p-4"
                >
                    <label for="email" class="label">Email address</label>
                    <Input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Email address"
                    />
                    <InputError :message="errors.email" />

                    <label for="password" class="label">Password</label>
                    <Input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                    />
                    <InputError :message="errors.password" />

                    <label class="label">
                        <Checkbox name="remember" id="remember" />
                        Remember me
                    </label>

                    <button
                        type="submit"
                        class="btn btn-neutral"
                        :disabled="processing"
                    >
                        <span
                            v-if="processing"
                            class="loading loading-bars"
                        ></span>
                        <span v-else>Login</span>
                    </button>
                </fieldset>
            </Form>
        </div>
    </AppLayout>
</template>
