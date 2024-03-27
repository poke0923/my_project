<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>

        <link rel="stylesheet" href="/css/build/top/index.css">

    </head>

    <body>
       <header>
        <a href="/login">
            <h2>タイトル</h2>
        </a>
       </header>

       <main>
        <h2 v-html="title"></h2> 
        <!-- 
            v-htmlで表示内容についてデータバインディングしている。イコールの後は表示内容に合わせて、Vue側で設定した名前と同じにする
            v-htmlはjs側でhtmlのタグまで設定するときに使う（例：js側でtitleの値をtitle = "<h2>aaaa</h2>" のようにしてタグまで決めている）
            v-htmlはユーザーが書き込みを行える内容に設定してしまうと値が書き換わってしまい危険。セキュリティに注意。 
        -->
        <button v-on:click="buttonClick">変更</button>

        <form action="">
            <p v-html="validateResult"></p>
            <input type="text" name="name" v-model="name"> 
            <!-- 
                v-modelによりinputタグの入力内容をjs側に紐づけている。
                v-modelは双方向データバインディングというもので、inputタグの入力値が変わった場合、
                それをjs側（今回は変数nameの値）にも反映させることができる。
            -->
            <button type="button" v-on:click="validate">ひらがな確認</button>
        </form>

         <!-- componetを利用 -->
        <sample-component tab-name1="A" tab-name2="B" tab-name3="C" tab-body1="{{ $phpValue }}" tab-body2="tabBody2-B" tab-body3="tabBody3-C"></sample-component>
        <sample-component tab-name1="D" tab-name2="E" tab-name3="F" tab-body1="tabBody1-D" tab-body2="tabBody2-E" tab-body3="tabBody3-F"></sample-component>
        <!-- sample-componentを利用し、props（プロパティ）として各要素の値を指定している -->

        <!-- 
        <section class="tab-layout">
            <div class="tabs">
                <button class="tab" v-on:click="page=1">tab1</button> 
                <button class="tab" v-on:click="page=2">tab2</button>
                <button class="tab" v-on:click="page=3">tab3</button>
            </div>
            <div class="content" v-bind:class="{ show : page == 1 }"> 
                <p>page1</p>
            </div>
             -->
            <!-- 
                v-bindを用いてpageの値によりclass名が変化（class="content show"）するようにしている。
                v-bindは動的にhtmlのタグを制御するときに使われる。
                cssでshowがついていないタグは表示されない、ついているタグは表示されるように設定している。 
            -->
            <!-- 
            <div class="content" v-bind:class="{ show : page == 2 }">
                <p>page2</p>
            </div>
            <div class="content" v-bind:class="{ show : page == 3 }">
                <p>page3</p>
            </div>            
        </section>
         -->

       </main>

       <script src="/js/build/top/index.js"></script>
    </body>

</html>