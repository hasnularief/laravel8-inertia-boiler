<template>
    <jet-banner />
    <div class="min-h-screen">
        <div
            class="sidebar-backdrop"
            @click="closeSidebarPanel"
            v-show="isPanelOpen"
        ></div>
        <nav class="h-10 py-0 px-8 bg-dark relative flex">
            <a
                href="#"
                title="Menu"
                class="btn btn-dark p-2 fixed left-0 rounded w-8 delay-100"
                @click="openSidebarPanel"
            >
                <i class="fas fa-bars text-white"></i>
            </a>
            <transition name="slide">
                <nav v-show="isPanelOpen" id="sidebar" class="sidebar-wrapper">
                    <div class="sidebar-content">
                        <div class="py-3 px-5 text-base flex">
                            <a href="#" class="font-bold text-base flex-1"
                                >WISHING</a
                            >
                            <div id="close-sidebar" class="close-sidebar">
                                <a href="#" @click="closeSidebarPanel">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div
                            class="overflow-hidden border-gray-500 border-t border-b flex flex-column"
                        >
                            <div
                                title="Update Profile"
                                class="p-3 float-left w-16 p-1 mr-3 cursor-pointer"
                            >
                                <img
                                    :src="url('/images/user.jpg')"
                                    alt="User picture"
                                    class="rounded"
                                />
                            </div>
                            <div
                                title="Update Profile"
                                class="user-info flex-1 flex-row pt-2"
                            >
                                <span class="font-bold"
                                    >Hasnul Arief Fikri</span
                                >
                                <span class="text-sm">#Administrator</span>
                            </div>
                        </div>
                        <div class="sidebar-menu">
                            <backend-layout-menu :menu="menu" />
                        </div>
                    </div>
                    <div
                        class="flex w-full absolute bg-dark-2 border-t border-gray-800 bottom-0 p-1"
                        style="box-shadow: 0px -1px 5px #282c33"
                    >
                        <a href="#" class="flex-1 text-center">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </div>
                </nav>
            </transition>
        </nav>
        <slot />
    </div>
</template>

<script>
import { store, mutations } from "../store";
import BackendLayoutMenu from "./BackendLayoutMenu.vue";
import JetBanner from "@/Jetstream/Banner";
export default {
    components: {
        BackendLayoutMenu,
        JetBanner,
    },
    data() {
        return {
            menu: [
                { name: "Dashboard", path: "/", icon: "fa fa-tachometer-alt" },
                {
                    name: "Posts",
                    icon: "fas fa-thumbtack",
                    children: [
                        {
                            name: "All Posts",
                            path: "/b/edit",
                        },
                        {
                            name: "Add New",
                            path: "/b/post-new",
                        },
                        {
                            name: "Categories",
                            path: "/b/edit-tags?type=category",
                        },
                        {
                            name: "Tags",
                            path: "/b/edit-tags?type=post_tag",
                        },
                    ],
                },
                {
                    name: "Media",
                    icon: "fas fa-photo-video",
                    children: [
                        { name: "Library", path: "/b/upload" },
                        { name: "Add New", path: "/b/media-new" },
                    ],
                },
                {
                    name: "Pages",
                    icon: "fas fa-clone",
                    children: [
                        { name: "All Pages", path: "/b/edit?post_type=page" },
                        { name: "Add New", path: "/b/post-new?post_type=page" },
                    ],
                },
                {
                    name: "Comments",
                    path: "/b/edit-comments",
                    icon: "fas fa-comments",
                },
                {
                    name: "Users",
                    icon: "fas fa-users",
                    children: [
                        { name: "All Users", path: "/b/users" },
                        { name: "Add New", path: "/b/user-new" },
                        { name: "Profile", path: "/b/profile" },
                    ],
                },
            ],
        };
    },

    computed: {
        isPanelOpen() {
            return store.isNavOpen;
        },
    },

    methods: {
        closeSidebarPanel: mutations.toggleNav,
        openSidebarPanel() {
            mutations.setNav(true);
        },
    },
};
</script>

<style>
/* .slide-enter-active,
.slide-leave-active {
    transition: transform 0.2s ease;
}
.slide-enter {
    transform: translateX(-100%);
    transition: all 150ms ease-in 0s;
}
.slide-leave-to {
    transform: translateX(-100%);
    transition: all 150ms ease-in 0s;
} */
.slide-leave-active,
.slide-enter-active {
    transition: 1s !important;
    transform: translateX(0) !important;
}
.slide-enter {
    transform: translateX(100%) !important;
}
.slide-leave-to {
    transform: translate(-100%) !important;
}

.sidebar-backdrop {
    background-color: rgba(19, 15, 64, 0.4);
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    cursor: pointer;
}

.show-enter,
.show-leave-to {
    opacity: 0 !important;
    transform: translateX(-60px) !important;
}
.show-enter-active,
.show-leave-active {
    transition: all 500ms !important;
}
</style>
