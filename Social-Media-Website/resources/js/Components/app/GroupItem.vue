<script setup>
defineProps({
  image: String,
  title: String,
  description: String,
});
</script>

<template>
  <div
    class="group flex items-start gap-3 mb-2 cursor-pointer
           rounded-xl p-3 transition
           hover:bg-gray-100 dark:hover:bg-gray-800
           hover:shadow-sm"
  >
    <!-- Avatar -->
    <img
      :src="image"
      class="w-12 h-12 rounded-full object-cover
             ring-2 ring-transparent
             group-hover:ring-gray-300 dark:group-hover:ring-gray-600
             transition"
    />

    <!-- Content -->
    <div class="flex-1">
      <h3
        class="font-semibold text-sm
               text-gray-900 dark:text-gray-100
               group-hover:text-black dark:group-hover:text-white
               transition"
      >
        {{ title }}
      </h3>

      <p
        class="text-xs leading-snug line-clamp-2
               text-gray-500 dark:text-gray-400"
      >
        {{ description }}
      </p>
    </div>

    <!-- Arrow -->
    <svg
      class="ml-auto w-5 h-5
             text-gray-400 dark:text-gray-500
             opacity-0 group-hover:opacity-100
             group-hover:translate-x-1 transition"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      viewBox="0 0 24 24"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M9 5l7 7-7 7"
      />
    </svg>
  </div>
</template>

<style scoped></style>