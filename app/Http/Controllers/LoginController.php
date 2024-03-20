<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(Request $request){
        $loginId = $request->session()->get('login_id', null); //sessionの中にあるlogin_idの値を取得、ない場合はnullとする
        $variables = [
            'isLoginActive' => isset( $loginId ) //isset関数で$loginIdに値がsetされているかを判断＝login状態かを判断
        ];
        
        return view('login.index', compact('variables')); //viewの第2引数を入れる場合は連想配列を入れる必要がある
    }

    public function login(Request $request){
        $id = $request->input('id');
        $password = $request->input('password');

        $registered = DB::connection('mysql')->select("select count(*) from users where id_str = '" . $id . "' and password = '" . $password . "'");
        $check = (array)($registered[0]);
        


        if( $check["count(*)"] == 0 ){
            return response("ログインに失敗しました。<a href='/login'>前のページへ戻る</a>");
        }else{
            
            return response("you are logined!!");
        }
    }

    public function register(Request $request){
        $id = $request->input('id');
        $password = $request->input('password');

        $oldRecords = DB::connection('mysql')->select("select count(*) from users where id_str ='".$id."'");
        // select~id_str='まででまとまり。そこに$idをドットで連結し、最後に「'」をつけている。
        // select count(*)でカウント関数（一致する行数をカウント）を実行し、すべてのデータから$idに一致するものを検索し、$oldRecordsに一致した行数を格納
        // 今回の場合は検索に一致したものがオブジェクトとして格納されていく。count(*)をキーとして行数の数字が格納されている。

        if( count($oldRecords) == 0 ){
            return response("処理中に問題が発生しました。<a href='/login'>前のページへ戻る</a>");
        }
        // 一致する行が見つからないときの処理
        // $oldRecordsの式で一致する行が見つからないときは$oldRecordsには一致した行数として「0」が格納されている。
        // responseで返すHTMLの内容を書いている。リンクのコードもHTMLで処理してくれる。（普段はこれをview関数でbladeを表示して処理している）

        $record = (array)( $oldRecords[0] ); // オブジェクトである$oldRecords[0]を配列にキャストしている。連想配列になる。
        if ($record["count(*)"] > 0){
            return response("すでに存在するアカウント id です。<a href='/login'>前のページへ戻る</a>");
        }
        // count(*)をキーとして検索で一致した行数（値）が格納されているため、それにアクセスし、その値が0より大きければすでに登録済みのresponseが返る

        DB::connection('mysql')->insert("insert into users (id_str,password) values ('" . $id . "','" . $password . "')");
        // SQLの構文で保存処理を実行。Levtechではモデルをインスタンス化し、そのモデルからfill、saveの関数を呼び出すだけで保存できていた。
        // 今回はモデルをインスタンス化しての処理などを学んでいないため?もしくはSQLを書くことに慣れておくためにこのようにしているかも。

        $records = DB::connection('mysql')->select("select * from users where id_str = '" . $id . "'" );

        if(count($records) == 0){
            return response("ユーザーデータの登録処理中に問題が発生しました。<a href='/login'>前のページへ戻る</a>");
        }
        

        $request->session()->put( "login_id", $records[0]->id_str );
        // putでの第1引数でセッションに保存するキーを設定、第2引数でそのキーで呼び出す値を指定


        return response("登録が完了しました。<a href='/login'>前のページへ戻る</a>");
    }

    public function unregister(Request $request){
        $request->session()->flush();
        return response("ログアウトが完了しました。<a href='/login'>前のページへ戻る</a>");
    }
}