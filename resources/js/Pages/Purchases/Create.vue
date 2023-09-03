<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { getToday } from '@/common'
import { router } from '@inertiajs/vue3';
import { onMounted, reactive, ref, computed } from "vue"
import { Head } from '@inertiajs/vue3';
import MicroModal from '@/Components/MicroModal.vue'

const props = defineProps({
    'customers': Array,
    'items': Array,
})

const itemList = ref([])

onMounted(() => {
    form.date = getToday()
    props.items.forEach(item => {
        itemList.value.push({
            id: item.id,
            name: item.name,
            price: item.price,
            quantity: 0
        })
    })
})

const form = reactive({
    date: null,
    customer_id: null,
    status: true,
    items: []
})

const totalPrice = computed(() => {
    let total = 0
    itemList.value.forEach(item => {
        total += item.price * item.quantity
    })
    return total
})

const storePurchase = () => {
    itemList.value.forEach(item => {
        if (item.quantity > 0) {
            form.items.push({
                id: item.id,
                quantity: item.quantity
            })
        }
    })
    router.post(route('purchases.store'), form)
}

const setCustomerId = id => {
    form.customer_id = id
}

const quantity = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
</script>

<template>
    <Head title="購入画面" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">購入画面</h2>
        </template>
        <form @submit.prevent="storePurchase">
            <input class="mt-5" type="date" name="date" v-model="form.date"><br>
            会員名<br>
            <MicroModal @update:customerId="setCustomerId"></MicroModal>
            商品・サービス
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>商品名</th>
                        <th>金額</th>
                        <th>数量</th>
                        <th>小計</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in itemList">
                        <td>{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.price }}</td>
                        <td>
                            <select name="quantity" v-model="item.quantity">
                                <option v-for="q in quantity">{{ q }}</option>
                            </select>
                        </td>
                        <td>{{ item.price * item.quantity }}</td>
                    </tr>
                </tbody>
            </table>
            <h3>合計{{ totalPrice }}円</h3>
            <button class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
        </form>
    </AuthenticatedLayout>
</template>
