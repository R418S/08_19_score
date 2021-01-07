<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
  <title>ゴルフスコア管理</title>
</head>

<body>
  <form action="score_create.php" method="POST">
    <p class="resizeimage">
      <img src="img/1.jpg" width="100%" alt="ゴルフスコア管理">
    </p>

    <!-- fieldsetでformのグループ化グループの間をtabキーで簡単に移動することが可能になる -->
    <fieldset>
      プレー日<input type="date" name="date" size="80">
    </fieldset>
    <fieldset>
      <legend>天気</legend>
      <label><input type="radio" name="weather" value="晴れ">晴れ</label>
      <label><input type="radio" name="weather" value="曇り">曇り</label>
      <label><input type="radio" name="weather" value="雨">雨</label>
      <label><input type="radio" name="weather" value="大雨">大雨</label>
      <label><input type="radio" name="weather" value="台風">台風</label>
      <label><input type="radio" name="weather" value="みぞれ">みぞれ</label>
      <label><input type="radio" name="weather" value="雪">雪</label>
    </fieldset>
    <fieldset>
      <p><label>ゴルフ場：<input type="text" name="place" size="40"></label></p>
    </fieldset>
    <fieldset>
      <p><label>同伴者①：<input type="text" name="name_1" size="40"></label></p>
      <p><label>同伴者②：<input type="text" name="name_2" size="40"></label></p>
      <p><label>同伴者③：<input type="text" name="name_3" size="40"></label></p>
    </fieldset>
    <fieldset>
      <form onsubmit="return false" id="example" oninput="result.value = Number(out_score.value) + Number(in_score.value);">
        <p><label>OUT：<input type="number" name="out_score" min="30" max="100">  IN：<input type="number" name="in_score" min="30" max="100"></label></p>
      </form>
      <!-- IN：<input type="text" name="in_score" size="10"></label></p> -->
      <p><label>TOTAL:<output name="result" form="example">0</output></p>
      <!-- <output name="total" for="out_score in_score"></output></label></p> -->
      <script>

      </script>
      <!-- <p><label>TOTAL：<input type="text" name="total" size="10"></label></p> -->
    </fieldset>
    <p>アウトのスコアを選択してください</p>
    <form>
      <select>
        <script>
          const a = "a"
          var outscore;
          for (outscore = 30; outscore < 100; outscore++) {
            document.write('<option value="' + outscore + '">' + outscore + '</option>');
          }
        </script>
      </select>

      <p>インのスコアを選択してください</p>

      <select>
        <script>
          const b = "b"
          var inscore;
          for (inscore = 30; inscore < 100; inscore++) {
            document.write('<option value="' + inscore + '">' + inscore + '</option>');
          }
          console.log(outscore)
        </script>
      </select>

      <script>
        num = a + b;
        document.write('<p>合計: ' + num + '</p>');
      </script>

      <!-- <script>
        const add = (x, y) => {
          return (x && y) && parseInt(x) + parseInt(y);
        }
      </script>

      <form oninput="result.value = add(hoge.value,fuga.value)">
        <input type="number" name="hoge"> + <input type="number" name="fuga">
        = <output name="result">
      </form> -->

      <p><input type="submit" value="送信"><input type="reset" value="リセット"></p>
      <br>
      </fieldset>
      <p>↓↓一覧画面表示↓↓</p>
      <a href="score_read.php">
        <img src="img/グリーンのフリーアイコン.jpeg" />
      </a>
      <p class="resizeimage">
        <img src="img/3.jpg" width="100%" alt="下バナー">
      </p>
    </form>
</body>

</html>