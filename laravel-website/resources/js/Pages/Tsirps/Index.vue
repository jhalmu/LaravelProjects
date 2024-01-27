<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Tsirp from "@/Components/Tsirp.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Head, useForm} from "@inertiajs/vue3";

defineProps(['tsirps'])

const form = useForm({
    message: '',
});
</script>

<template>
    <Head title="Tsirps"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tsirps</h2>
        </template>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('tsirps.store'),
                { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    placeholder="What's on your mind?"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2"/>
                <PrimaryButton class="mt-4">Tsirp</PrimaryButton>
            </form>

            <div class="mt-6 bg-white shadow-dm rounded-lg divide-y">

                <Tsirp
                    v-for="tsirp in tsirps"
                    :key="tsirp.id"
                    :tsirp="tsirp"
                />
            </div>
        </div>
    </AuthenticatedLayout>

</template>
