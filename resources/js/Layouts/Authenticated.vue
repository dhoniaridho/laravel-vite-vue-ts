<template>
    <n-space vertical>
        <n-layout>
            <n-layout has-sider>
                <n-layout-sider
                    bordered
                    show-trigger
                    collapse-mode="width"
                    :collapsed-width="64"
                    :width="240"
                    :native-scrollbar="false"
                    style="min-height: 100vh"
                >
                    <div class="h-20 flex items-center">
                        <div class="mx-auto max-w-10 flex items-center gap-3">
                            <n-image
                                class="mx-auto max-w-10"
                                :width="40"
                                :alt="page.app.name"
                                :src="page.app.logo"
                                lazy
                            />
                            <n-h6 strong>
                                {{ page.app.name }}
                            </n-h6>
                        </div>
                    </div>
                    <n-menu
                        :collapsed-width="64"
                        :collapsed-icon-size="22"
                        :options="menuOptions"
                    />
                </n-layout-sider>
                <n-layout style="min-height: 100vh">
                    <slot />
                </n-layout>
            </n-layout>
        </n-layout>
    </n-space>
</template>

<script setup lang="ts">
import { h, defineComponent, ref, Component } from "vue";
import { NIcon } from "naive-ui";
import {
    BookOutline as BookIcon,
    PersonOutline as PersonIcon,
    WineOutline as WineIcon,
} from "@vicons/ionicons5";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { usePage } from "@inertiajs/inertia-vue3";

function renderIcon(icon: Component) {
    return () => h(NIcon, null, { default: () => h(icon) });
}

const page: any = usePage().props as any;

const menuOptions = [
    {
        label: "Hear the Wind Sing",
        key: "hear-the-wind-sing",
        icon: renderIcon(BookIcon),
    },
    {
        label: "Pinball 1973",
        key: "pinball-1973",
        icon: renderIcon(BookIcon),
        disabled: true,
        children: [
            {
                label: "Rat",
                key: "rat",
            },
        ],
    },
    {
        label: "A Wild Sheep Chase",
        key: "a-wild-sheep-chase",
        disabled: true,
        icon: renderIcon(BookIcon),
    },
    {
        label: "Dance Dance Dance",
        key: "Dance Dance Dance",
        icon: renderIcon(BookIcon),
        children: [
            {
                type: "group",
                label: "People",
                key: "people",
                children: [
                    {
                        label: "Narrator",
                        key: "narrator",
                        icon: renderIcon(PersonIcon),
                    },
                    {
                        label: "Sheep Man",
                        key: "sheep-man",
                        icon: renderIcon(PersonIcon),
                    },
                ],
            },
            {
                label: "Beverage",
                key: "beverage",
                icon: renderIcon(WineIcon),
                children: [
                    {
                        label: "Whisky",
                        key: "whisky",
                    },
                ],
            },
            {
                label: "Food",
                key: "food",
                children: [
                    {
                        label: "Sandwich",
                        key: "sandwich",
                    },
                ],
            },
            {
                label: "The past increases. The future recedes.",
                key: "the-past-increases-the-future-recedes",
            },
        ],
    },
];
</script>
