<template>
    <div
        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between"
    >
        <span class="text-xs xs:text-sm text-gray-900">
            Showing {{ links.from }} to {{ links.to }} of
            {{ links.total }} Entries
        </span>
        <div class="inline-flex mt-2 xs:mt-0">
            <inertia-link
                v-if="links.current_page > 2"
                :href="first_page_url"
                class="btn-secondary"
                :class="{ 'rounded-r-none': links.prev_page_url }"
            >
                First
            </inertia-link>
            <inertia-link
                v-if="links.prev_page_url"
                :href="prev_page_url"
                class="btn-secondary"
                :class="{
                    'rounded-r-none': links.next_page_url,
                    'rounded-l-none': links.current_page > 2,
                }"
            >
                Prev
            </inertia-link>
            <inertia-link
                v-if="links.next_page_url"
                :href="next_page_url"
                class="btn-secondary"
                :class="{
                    'rounded-l-none':
                        links.prev_page_url || links.current_page > 2,
                }"
            >
                Next
            </inertia-link>
        </div>
    </div>
</template>
<script>
export default {
    props: ["links", "filters"],
    created() {
        //console.table(this.links);
    },

    computed: {
        first_page_url() {
            return this.links.first_page_url
                ? this.appendFilters(this.links.first_page_url)
                : null;
        },
        prev_page_url() {
            return this.links.prev_page_url
                ? this.appendFilters(this.links.prev_page_url)
                : null;
        },
        next_page_url() {
            return this.links.next_page_url
                ? this.appendFilters(this.links.next_page_url)
                : null;
        },
    },
    methods: {
        appendFilters(link) {
            const url = new URL(link);
            for (const key in this.filters) {
                if (this.filters[key]) {
                    url.searchParams.append(key, this.filters[key]);
                }
            }
            return url;
        },
    },
};
</script>
