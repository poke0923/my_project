<template> <!-- htmlで表示したいcomponentを作る -->
    <section class="sample-component">
        <section class="tab-layout">
            <div class="tabs">
                <button class="tab" v-on:click="page = 1">{{ tabName1 }}</button>
                <button class="tab" v-on:click="page = 2">{{ tabName2 }}</button>
                <button class="tab" v-on:click="page = 3">{{ tabName3 }}</button>
            </div>
            <div class="content" v-bind:class="{ show : page == 1}">
                <p>{{ tabBody1 }}</p>
            </div>
            <div class="content" v-bind:class="{ show : page == 2}">
                <p>{{ tabBody2 }}</p>
            </div>
            <div class="content" v-bind:class="{ show : page == 3}">
                <p>{{ tabBody3 }}</p>
            </div>
        </section>
    </section>
</template>

<script> // 上のhtmlに対してのjsを書いていく
import { ref } from "vue";
import Axios from "axios"; //HTTPリクエスト（GET,POST,PUT,DELETE）などの機能を非同期処理で行うことができるAPI？axios.get('~~')などのように使用？

export default {
    setup( props, context ){ // contextはimportを省略してVueの機能を使うことができる？context.emit('~~~~')のような感じでemitをimportしなくても使える？
        const page = ref(1);
        return {
            page,
        };
    },
    props: {
        tabName1 : String,
        tabName2 : String,
        tabName3 : String,
        tabBody1 : String,
        tabBody2 : String,
        tabBody3 : String,
    }, // propsは親コンポーネントか子コンポーネントに値を渡すときに使う。使用しない場合は空のオブジェクト（{}）でOK。
};
</script>

<style lang="scss">
.sample-component {
    & .tab-layout {
        padding: 0;
        margin: 0;

        & * {
            padding: 0;
            margin: 0;
        }

        & .tabs {
            display: flex;
            flex-wrap: nowrap;
            justify-content: left;

            & .tab {
                width: 100%;
                line-height: 2rem;

                color: black;
                background-color: #ddd;

                transition: all 500ms;
                &:hover {
                    color: white;
                    background-color: #1d2946;
                }
            }
        }

        & .content {
            max-height: 0rem;
            opacity: 0;

            transition: all 500ms;
            &.show {
                max-height: 4rem;
                opacity: 1;
            }
        }
    }
}
</style>