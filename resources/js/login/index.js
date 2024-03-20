import * as Vue from "vue";
import { ref } from "vue";

const application = {
    setup() {
        const registerForm = ref(); //refの中の値を初期値として設定。リアクティブな値として処理していくことができる（＝更新していくことができる？）
        const loginForm = ref();
        const id = ref("");
        const password = ref("");

        let  registerSubmit = function(){
            if(id.value == ""){
                alert("idを入力してください");
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
                alert("id を入力してください。");
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