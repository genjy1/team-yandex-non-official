<template>
  <header class="z-[9999] absolute w-full top-0 bg-transparent">
    <ContainerComponent class="my-4 flex justify-between">
      <div class="logo">
        <RouterLink to="/"><img src="@/assets/img/logo.png" alt="" /></RouterLink>
      </div>
      <nav>
        <ul class="nav-list flex justify-between">
          <li class="text-white">Команды</li>
          <li class="text-white">Новости</li>
          <li class="text-white">Магазин</li>
          <li class="text-white"></li>
        </ul>
      </nav>
    </ContainerComponent>
  </header>
</template>
<script setup>
import ContainerComponent from './ContainerComponent.vue'
</script>
