<script>
import { mutations } from "../store";
export default {
    name: "backend-layout-menu",
    props: {
        menu: {
            type: Array,
            required: true,
        },
        level: {
            type: Number,
            default: 0,
        },
    },

    data() {
        return {
            childrenShowedIndex: null,
        };
    },
    created() {},

    methods: {
        icon(ic) {
            return ic ? ic : "far fa-circle";
        },
        showChildren(index) {
            this.childrenShowedIndex =
                this.childrenShowedIndex === index ? null : index;

            this.$emit("close-others", { level: this.level, index });
        },
        closeSidebar() {
            mutations.setNav(false);
        },
    },
};
</script>
<template>
    <ul :class="{ 'bg-dark-2': level > 0 }">
        <li
            v-for="(m, index) in menu"
            :key="index"
            :class="{ 'sidebar-dropdown': m.children && m.children.length > 0 }"
            class="text-sm"
        >
            <inertia-link
                @click="closeSidebar()"
                class="flex py-2"
                :style="{ 'padding-left': level * 5 + 'px' }"
                v-if="!m.children"
                :href="m.path"
            >
                <div class="mx-2 flex items-center text-xs">
                    <i :class="icon(m.icon)" />
                </div>
                <span class="flex-1">{{ m.name }}</span>
            </inertia-link>
            <a
                v-if="m.children"
                href="#"
                class="flex py-2 bg-dark"
                :style="{ 'padding-left': level * 5 + 'px' }"
                @click="showChildren(index)"
            >
                <div class="mx-2 flex items-center text-xs">
                    <i :class="m.icon ? m.icon : 'far fa-circle'" />
                </div>
                <span class="flex-1">{{ m.name }}</span>
                <i
                    class="text-right fas mr-3 expand-icon fa-chevron-right"
                    :class="{
                        //'fa-chevron-right': childrenShowedIndex !== index,
                        //'fa-chevron-down': childrenShowedIndex === index,
                        rotate: childrenShowedIndex === index,
                    }"
                />
            </a>
            <div v-show="m.children && childrenShowedIndex == index">
                <backend-layout-menu
                    v-if="m.children && m.children.length > 0"
                    :menu="m.children"
                    :level="level + 1"
                />
            </div>
        </li>
    </ul>
</template>
<style></style>
