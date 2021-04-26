import { reactive } from "vue";

export const store = reactive({
    isNavOpen: false,
    menuAccordion: false,
});

export const mutations = {
    setIsNavOpen(yesno) {
        store.isNavOpen = yesno;
    },

    toggleNav() {
        store.isNavOpen = !store.isNavOpen;
    },

    closeAccordion() {
        store.menuAccordion = false;
    },

    setNav(val) {
        store.isNavOpen = val;
    },
};
