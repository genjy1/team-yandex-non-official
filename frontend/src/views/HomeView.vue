<script setup>
import { getData } from '@/main'
import { onMounted, ref } from 'vue'
import HeaderComponent from '@/components/HeaderComponent.vue'
import ContainerComponent from '@/components/ContainerComponent.vue'
let data = ref()

onMounted(async () => {
  data.value = (await getData('players/cs')).data

  console.log(data.value)
})
</script>

<template>
  <HeaderComponent></HeaderComponent>
  <main
    class="bg-[url('@/assets/img/orig.jpg')] bg-center bg-cover bg-no-repeat w-full h-screen bg-black"
  >
    <ContainerComponent class="flex flex-col translate-y-1/2">
      <div class="wrapper bg-black/35 px-10 py-20 sm:p-20 rounded-xl backdrop-blur">
        <h1 class="text-white text-center font-bold text-2xl py-10">
          Яндекс запускает бренд Team Yandex для развития киберспортивных проектов
        </h1>
        <div class="btn-wrapper w-4/5 sm:pt-20 sm:pb-40 mx-auto my-0 flex">
          <RouterLink class="bg-[#FCE000] rounded px-3.5 py-3 mx-auto block w-max">
            Подробнее
          </RouterLink>
        </div>
      </div>
    </ContainerComponent>
  </main>
</template>
