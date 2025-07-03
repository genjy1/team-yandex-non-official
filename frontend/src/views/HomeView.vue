<script setup>
import { getData } from '@/main'
import { onMounted, ref } from 'vue'
import HeaderComponent from '@/components/HeaderComponent.vue'
import ContainerComponent from '@/components/ContainerComponent.vue'
let data = ref()

onMounted(async () => {
  data.value = (await getData('players')).data

  console.log(data.value)
})
</script>

<template>
  <HeaderComponent></HeaderComponent>

  <main class="bg-[url('@/assets/img/orig.jpg')] bg-cover bg-no-repeat w-full h-screen bg-black">
    <ContainerComponent class="flex flex-col h-72">
      <div class="wrapper bg-white/20 p-20 rounded-xl translate-y-1/2">
        <h1 class="text-white">
          Яндекс запускает бренд Team Yandex для развития киберспортивных проектов
        </h1>
      </div>
    </ContainerComponent>
  </main>
</template>
