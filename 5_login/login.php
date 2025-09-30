<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // セッション開始

// 登録済みの個人IDと個人番号の組み合わせ
$users = [
    "tasuku" => "1234",
    "guest456" => "2222",
    "tanaka789" => "3333"
];

// 入力を取得
$input_id = $_POST["user_id"] ?? "";
$input_number = $_POST["personal_number"] ?? "";

// 照合処理
if (isset($users[$input_id]) && $users[$input_id] === $input_number) {
    // ログイン成功：セッションにユーザーIDを保存
    $_SESSION["user_id"] = $input_id;

    // トップページへ移動
    header("Location: ../1_top/index.php");
    exit;
} else {
    // ログイン失敗
    echo "<p>個人IDまたは個人番号が正しくありません。</p>";
    echo "<p><a href='login.html'>戻る</a></p>";
}
