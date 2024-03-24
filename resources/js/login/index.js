import * as Vue from "vue"; // Vue.jsのすべての機能をVueという名前でimportしている。この先すべてVueという名前でアクセスできる。
import { ref } from "vue"; // Vueの機能のrefを使うためのコード。今後これで初期値を設定することでデータの変更を検知して関連するビューを更新してくれる

const application = {
    setup() {
        const registerForm = ref(); //refを使って初期値を設定。リアクティブな値として処理ができる（＝イベントがあれば関連するビューにも反映）
        const loginForm = ref();
        const id = ref("");
        const password = ref("");

        let  registerSubmit = function(){
            if(id.value == ""){
                alert("idを入力してください。");
                return;
            }
            if(password.value == ""){
                alert("passwordを入力してください");
                return;
            }

            registerForm.value.submit();
        };

        let loginSubmit = function () {
            if (id.value == "") {
                alert("id を入力してください!");
                return;
            }
            if (password.value == "") {
                alert("password を入力してください。");
                return;
            }
            loginForm.value.submit();
        };

        return{ 
            registerForm,
            loginForm,

            id,
            password,

            registerSubmit,
            loginSubmit,
        };
        // ここはsetup関数に対してのreturnで、registerSubmitとloginSubmitを超えた後にそれぞれの変数などの値を保持している。
        // これにより他のコンポーネントからも値にアクセスできるようにしている。
        
    },
};

Vue.createApp(application).mount("#login");
// 前半部分でここまで書いてきたconst applicationをアプリとして設定し、
// 後半部分でHTMLないのidがloginの要素に関連付けている（マウントしている）。（レンダリング（可視化？）しているともいう？）
// ⇒これにより、その要素の変更などをリアクティブに監視できる。