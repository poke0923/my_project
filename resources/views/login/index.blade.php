<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>

    <link rel="stylesheet" href="/css/build/login/index.css">
</head>

<body class="login">
    <main id="login">
    <h2>ログイン</h2>
    <form method="post" action="/login">
        @csrf
        <div>
            ID:<input type="text" v-model="id" name="id">
        </div>
        <div>
            PW:<input type="password" v-model="password" name="password">
        </div>
        <div>
            <button type="button" v-on:click="loginSubmit" >送信</button>
        </div>

    </form>
    @if( $variables["isLoginActive"] )
        <a href="/login/unregister">ログアウト</a>  
    @else
        <h2>新規登録</h2>
        <form method="post" action="/login/register">
            @csrf
            <div>
                ID:<input type="text" v-model="id" name="id">
            </div>
            <div>
                PW:<input type="password" v-model="password" name="password">
            </div>
            <div>
                <button type="button" v-on:click="registerSubmit" >送信</button>
            </div>

        </form>
    @endif
    </main>
    <script src="/js/build/login/index.js"></script>
</body>

</html>