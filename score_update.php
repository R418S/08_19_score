<?php
// 送信確認
// var_dump($_POST);
// exit();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
// 各値をpostで受け取る

$date = $_POST['date'];
$out_score = $_POST['out_score'];
$in_score = $_POST['in_score'];
$total = $_POST['total'];
$id = $_POST['id'];

include('functions.php'); // 関数を記述したファイルの読み込み
$pdo = connect_to_db(); // 関数実行

// var_dump($_POST);
// exit();
// idを指定して更新するSQLを作成（UPDATE文）
$sql = "UPDATE score_table SET date=:date, out_score=:out_score, in_score=:in_score, total=:total, updated_at=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':out_score', $out_score, PDO::PARAM_INT);
$stmt->bindValue(':in_score', $in_score, PDO::PARAM_INT);
$stmt->bindValue(':total', $total, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

// var_dump($_POST);
// exit();
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
