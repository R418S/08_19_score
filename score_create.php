<?php

// 送信確認
// var_dump($_POST);
// exit();

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
  !isset($_POST['date']) || $_POST['date'] == '' ||
  // !isset($_POST['weather']) || $_POST['weather'] == '' ||
  // !isset($_POST['place']) || $_POST['place'] == '' ||
  // !isset($_POST['name_1']) || $_POST['name_1'] == '' ||
  // !isset($_POST['name_2']) || $_POST['name_2'] == '' ||
  // !isset($_POST['name_3']) || $_POST['name_3'] == '' ||
  !isset($_POST['out_score']) || $_POST['out_score'] == '' ||
  !isset($_POST['in_score']) || $_POST['in_score'] == '' ||
  !isset($_POST['total']) || $_POST['total'] == ''
) {
  // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

// 受け取ったデータを変数に入れる
$date = $_POST['date'];
$weather = $_POST['weather'];
$place = $_POST['place'];
$name_1 = $_POST['name_1'];
$name_2 = $_POST['name_2'];
$name_3 = $_POST['name_3'];
$out_score = $_POST['out_score'];
$in_score = $_POST['in_score'];
$total = $_POST['total'];

include('functions.php'); // 関数を記述したファイルの読み込み
$pdo = connect_to_db(); // 関数実行

// var_dump($_POST);
// exit();
// // DB接続の設定
// // DB名は`gsacf_x00_00`にする
// $dbn = 'mysql:dbname=gsacf_d07_19;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   // ここでDB接続処理を実行する
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO score_table(id, date, weather, place, name_1, name_2, name_3, out_score, in_score, total) VALUES(NULL, :date, :weather, :place, :name_1, :name_2, :name_3, :out_score, :in_score, :total)';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':weather', $weather, PDO::PARAM_STR);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':name_1', $name_1, PDO::PARAM_STR);
$stmt->bindValue(':name_2', $name_2, PDO::PARAM_STR);
$stmt->bindValue(':name_3', $name_3, PDO::PARAM_STR);
$stmt->bindValue(':out_score', $out_score, PDO::PARAM_INT);
$stmt->bindValue(':in_score', $in_score, PDO::PARAM_INT);
$stmt->bindValue(':total', $total, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header("Location:score_input.php");
  exit();
}
