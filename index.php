<?php
  $weeks = [
    0 => '日',
    1 => '月',
    2 => '火',
    3 => '水',
    4 => '木',
    5 => '金',
    6 => '土'
  ];

  $today = time();
  $start = date('Ym01',$today);
  $end = date('Ymt',$today);

  $days = [];
  $len = 0;
  for($day = $start;$day <= $end;$day ++){
    $w = date('w',strtotime($day));
    if($w == 0){
      $len ++;
    }
    if(!isset($days[$len])){
      foreach($weeks as $key_week => $val_week){
        $days[$len][$key_week] = '';
      }
    }
    $days[$len][$w] = $day;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>PHPで作るカレンダー</title>
</head>
  <body>
    <div>
      <?php echo date('Y年n月',$today)?>
    </div>
    <table>
      <thead>
        <tr>
          <?php foreach($weeks as $key_week => $val_week):?>
            <th><?php echo $val_week?></th>
          <?php endforeach?>
        </tr>
      </thead>
      <tbody>
        <?php foreach($days as $day):?>
          <tr>
            <?php foreach($weeks as $key_week => $val_week):?>
              <?php
                $style = '';
                if($key_week == 0){
                  $style = 'color:red;';
                }elseif($key_week == 6){
                  $style = 'color:blue;';
                }
              ?>
              <?php if($day[$key_week]):?>
                <td style="text-align:right;<?php echo $style?>">
                  <?php echo date('j',strtotime($day[$key_week]))?>
                </td>
              <?php else:?>
                <td></td>
              <?php endif?>
            <?php endforeach?>
          </tr>
        <?php endforeach?>
      </tbody>
    </table>
  </body>
</html>