<script setup>
import { Head } from '@inertiajs/vue3';
import GroupList from '@/Components/app/GroupList.vue';

defineProps({});
</script>

<template>
  <Head title="Social Media Website" />

  <div class="grid grid-cols-12 gap-3">
    <!-- Sidebar: Groups -->
    <GroupList />

    <!-- Posts -->
    <div class="col-span-6 bg-white dark:bg-gray-900 p-3 rounded shadow">
      Posts
    </div>

    <!-- Followers -->
    <div class="col-span-3 bg-white dark:bg-gray-900 p-3 rounded shadow">
      Followers
    </div>
  </div>
</template>