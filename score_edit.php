<?php
// 送信されたidをgetで受け取る
$id = $_GET['id'];

// 関数ファイル読み込み
include("functions.php");

// DB接続&id名でテーブルから検索
$pdo = connect_to_db();
$sql = 'SELECT * FROM score_table WHERE id=:id';
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
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
}
// var_dump($record);
// exit();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>scoreリスト（編集画面）</title>
</head>

<body>
    <form action="score_update.php" method="POST">
        <fieldset>
            <legend>scoreリスト（編集画面）</legend>
            <a href="score_read.php">一覧画面</a>
            <div>
                プレー日: <input type="date" name="プレー日" value="<?= $record["date"] ?>">
            </div>
            <div>
                OUT: <input type="text" name="out_score" value="<?= $record["out_score"] ?>">
            </div>
            <div>
                IN: <input type="text" name="in_score" value="<?= $record["in_score"] ?>">
            </div>
            <div>
                TOTAL: <input type="text" name="total" value="<?= $record["total"] ?>">
            </div>


            <!-- // idを見えないように送る
      // input type="hidden"を使用する！
      // form内に以下を追加 -->
            <input type="hidden" name="id" value="<?= $record['id'] ?>">

            <div>
                <button>変更</button>
            </div>

        </fieldset>
    </form>

</body>

</html>