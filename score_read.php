<?php

include('functions.php'); // 関数を記述したファイルの読み込み
$pdo = connect_to_db(); // 関数実行

// データ取得SQL作成
$sql = 'SELECT * FROM score_table';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["id"]}</td>";
    $output .= "<td>{$record["date"]}</td>";
    $output .= "<td>{$record["weather"]}</td>";
    $output .= "<td>{$record["place"]}</td>";
    $output .= "<td>{$record["name_1"]}</td>";
    $output .= "<td>{$record["name_2"]}</td>";
    $output .= "<td>{$record["name_3"]}</td>";
    $output .= "<td>{$record["out_score"]}</td>";
    $output .= "<td>{$record["in_score"]}</td>";
    $output .= "<td>{$record["total"]}</td>";
    // edit deleteリンクを追加
    $output .= "<td><a href='score_edit.php?id={$record["id"]}'>変更</a></td>";
    $output .= "<td><a href='score_delete.php?id={$record["id"]}'>消去</a></td>";
    $output .= "</tr>";
  }
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ゴルフスコア管理</title>
</head>

<body>
  <fieldset>
    <legend>ゴルフスコア管理</legend>
    <a href="score_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>プレー日</th>
          <th>天気</th>
          <th>ゴルフ場</th>
          <th>同伴者①</th>
          <th>同伴者②</th>
          <th>同伴者③</th>
          <th>OUT</th>
          <th>IN</th>
          <th>合計</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>