<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue'
import Pagination from '@/Components/Pagination.vue'
import { ref } from 'vue'

defineProps({
    customers: Object
})

const search = ref('')

const searchCustomers = () =>
{
    router.get(route('customers.index', { search: search.value }))
}
</script>

<template>
    <Head title="商品一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品一覧</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-5 mx-auto">
                                <FlashMessage></FlashMessage>
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <div class="mb-5">
                                        <input type="text" naem="search" v-model="search">
                                        <button @click="searchCustomers" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button>
                                    </div>
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カナ</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話番号</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="customer in customers.data">
                                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                                            <Link class="text-blue-500" :href="route('customers.show',{customer: customer.id})">{{ customer.id }}</Link>
                                        </td>
                                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ customer.name }}</td>
                                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ customer.kana }}</td>
                                        <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">{{ customer.tel }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                    <Link as="botton" :href="route('customers.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">商品登録</Link>
                                <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                                </div>
                            </div>
                            <Pagination class="mt-6" :links="customers.links"></Pagination>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
