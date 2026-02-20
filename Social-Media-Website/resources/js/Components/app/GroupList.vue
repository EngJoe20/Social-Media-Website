<script setup>
import GroupItem from "@/Components/app/GroupItem.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref, computed } from "vue";

const searchKeyword = ref("");

const groups = ref([
  { image: "https://picsum.photos/100", title: "Laravel Developers", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit." },
  { image: "https://picsum.photos/100", title: "Vue.JS Developers", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit." },
  ...Array.from({ length: 30 }, (_, i) => ({
    image: "https://picsum.photos/100",
    title: `Group ${i + 1}`,
    description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
  }))
]);

const filteredGroups = computed(() => {
  if (!searchKeyword.value) return groups.value;
  return groups.value.filter(group =>
    group.title.toLowerCase().includes(searchKeyword.value.toLowerCase())
  );
});
</script>

<template>
  <div class="col-span-3 py-6 px-3 flex flex-col h-screen">
    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">My Groups</h2>

    <!-- Search Input -->
    <TextInput
      v-model="searchKeyword"
      placeholder="Search groups..."
      class="w-full
             bg-gray-100 dark:bg-gray-800
             text-gray-900 dark:text-gray-100
             border border-gray-300 dark:border-gray-700
             rounded-xl px-4 py-2
             placeholder:text-gray-500 dark:placeholder:text-gray-400
             focus:outline-none focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-800
             transition-colors mb-4"
    />

    <!-- Groups List -->
    <div class="flex-1 overflow-y-auto custom-scrollbar space-y-2">
      <div
        v-if="filteredGroups.length === 0"
        class="text-gray-400 dark:text-gray-500 text-center text-sm mt-4"
      >
        No groups found.
      </div>

      <div v-else class="flex flex-col">
        <GroupItem
          v-for="(group, index) in filteredGroups"
          :key="index"
          :image="group.image"
          :title="group.title"
          :description="group.description"
        />
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Custom scrollbar - works on Chrome, Edge, Safari */
.custom-scrollbar::-webkit-scrollbar {
  width: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
  background-color: #cbd5e1; 
  border-radius: 9999px;
  border: 2px solid transparent;
  background-clip: content-box;
}

.dark .custom-scrollbar::-webkit-scrollbar-thumb {
  background-color: #4b5563; 
}


.custom-scrollbar {
  scrollbar-width: thin;
  scrollbar-color: #cbd5e1 transparent;
}

.dark .custom-scrollbar {
  scrollbar-color: #4b5563 transparent;
}
</style>