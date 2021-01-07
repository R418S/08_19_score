<?php
// 送信確認
// var_dump($_GET);
// exit();

// idをgetで受け取る
$id = $_GET['id'];

include('functions.php'); // 関数を記述したファイルの読み込み
$pdo = connect_to_db(); // 関数実行

// idを指定して更新するSQLを作成 -> 実行の処理
$sql = 'DELETE FROM score_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:score_read.php");
    exit();
}
