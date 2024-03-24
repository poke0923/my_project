<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
    </head>

    <body>
       <header>
        <a href="/login">
            <h2>タイトル</h2>
        </a>
       </header>

       <main>
        <h2 v-html="title"></h2> <!-- v-htmlでデータバインディングしている。イコールの後は表示内容に合わせて、Vue側で設定した名前と同じにする -->
        <button v-on:click="buttonClick">変更</button>
       </main>

       <script src="/js/build/top/index.js"></script>
    </body>

</html>