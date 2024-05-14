<?php

function build_calendar($month,$year){

$mysqli = new mysqli('localhost', 'root', '', 'eventmaze');
$stmt = $mysqli->prepare('select * from bookings where MONTH(date) = ? AND YEAR(date) = ?');
$stmt->bind_param('ss',$month, $year);
$bookings = array();

if($stmt->execute()){
  $result = $stmt->get_result();
  if ($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
       $bookings[] = $row['date'];
    }
    $stmt->close();
  }
}

$daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$firstDayOfMonth = mktime(0,0,0,$month,1,$year);
$numberDays = date('t',$firstDayOfMonth);
$dateComponents = getdate($firstDayOfMonth);
$monthName = $dateComponents['month'];
$dayOfWeek = $dateComponents['wday'];
$dateToday = date('Y-m-d');

$prev_month = date('m',mktime(0,0,0,$month-1,1,$year));
$prev_year = date('Y',mktime(0,0,0,$month-1,1,$year));
$next_month = date('m',mktime(0,0,0,$month+1,1,$year));
$next_year = date('Y',mktime(0,0,0,$month+1,1,$year));

$calendar = "<center><h2>$monthName $year</h2>";
$calendar .= "<a class='btn btn-primary btn-xs' href='?month=".$prev_month."&year=".$prev_year."'>Previous Month</a>";
$calendar .="<a class='btn btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
$calendar .= "<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=".$next_year."'>Next Month</a></center>";

$calendar .="<br><table class='table table-bordered'>";
$calendar .= "<tr>";

//creating calendar header
foreach($daysOfWeek as $day){
  $calendar .= "<th class = 'header'>$day</th>";
}

  $calendar .= "</tr><tr>";
  $currentDay = 1;

  //the variable $dayOfWeek will make sure that there must be only 7 columned on our table
  if($dayOfWeek > 0){
    for($k=0; $k<$dayOfWeek; $k++){
      $calendar .= "<td class='empty'></td>";
    }
  }
  
  $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  while($currentDay <= $numberDays){
    //seventh column saturday reached, start a new row
    if($dayOfWeek == 7){
      $dayOfWeek = 0;
      $calendar .= "</tr><tr>";
    }

    $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
    $date = "$year-$month-$currentDayRel";

    $dayName= strtolower(date('l',strtotime($date)));
    $evenNum = 0;
    $today = $date==date('Y-m-d')?'today': '';
    if($date<date('Y-m-d')){
      $calendar .="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
    }
    elseif(in_array($date, $bookings)){
      $calendar .="<td class='$today'><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Booked</button>";
    }else{
      $calendar .= "<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a></td>";
    }

    $currentDay++;
    $dayOfWeek++;
  }  

if($dayOfWeek <7){
  $remainingDays = 7-$dayOfWeek;
  for($i=0; $i<$remainingDays; $i++){
    $calendar .= "<td class='empty'></td>";
  }
}

$calendar .= "</tr></table>";

return $calendar;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar System</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="calender.css">
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
          $dateComponents = getdate();
          if(isset($_GET['month']) && isset($_GET['year'])){
            $month = $_GET['month'];
            $year = $_GET['year'];
          }else{
            $month = $dateComponents['mon'];
            $year = $dateComponents['year'];
          }

          echo build_calendar($month, $year);
        ?>
      </div>
    </div>
  </div>

</body>
</html>