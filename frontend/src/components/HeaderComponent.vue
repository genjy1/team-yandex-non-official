<template>
  <header class="z-[9999] fixed w-full top-0 bg-transparent">
    <ContainerComponent
      class="my-8 bg-black/35 backdrop-blur-2xl py-2 flex justify-between items-center"
    >
      <div class="logo">
        <RouterLink to="/"
          ><img class="sm:hidden" src="@/assets/img/logo.png" alt="" />
          <img class="hidden sm:block w-36" src="@/assets/img/FullLogo.svg" alt=""
        /></RouterLink>
      </div>
      <nav class="hidden sm:block">
        <ul class="nav-list flex justify-between items-center gap-8">
          <li class="text-white">Команды</li>
          <li class="text-white">Новости</li>
          <li class="text-white">Магазин</li>
        </ul>
      </nav>
    </ContainerComponent>
  </header>
</template>
<script setup>
import ContainerComponent from './ContainerComponent.vue'
</script>
