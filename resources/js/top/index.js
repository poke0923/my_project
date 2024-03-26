import * as Vue from "vue";
import { ref } from "vue";

const application = {
    setup() { // インスタンス化（表示したとき？）に自動実行されるメソッド
        const title = ref("vue test title");
        let buttonClick = function(){ //機能を追加するときはfunctionでせっていしていく。
            title.value = "value update"; //ある要素の値にアクセスするときは要素名.valueなどの表記。階層の下に行くイメージでドットを使う
        };

        const validateResult = ref("");
        const name = ref(""); // html側のinputタグに用いる値。

        let validate = function() {
            let isKana = name.value.match(/^[ぁ-んー　]*$/);
            validateResult.value = isKana ? "正常":"ひらがなで入力してください";
            };

        const page = ref(1);
        return { 
            title,
            buttonClick,
            
            name,
            validate,
            validateResult,

            page,

        }; //setupメソッドは何かしらのデータやメソッドを返す必要がある。返す必要がない時は{}で空のオブジェクトを返す。
    },
};

try { //tyrメソッドはエラーが発生する可能性があるコードに用いる
    let mainElement = document.getElementsByTagName("main")[0]; //main要素を配列としてすべて取得し、その中の最初のmain要素を取得
    Vue.createApp(application).mount(mainElement); // mount で application と main を関連付けている（データバインディング？）
} catch (e) {} // catchでエラーが発生した際の対応を記述。(e)の中のeはなんでも良いが、一般的には e か err が使われる。