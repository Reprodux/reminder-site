<?php
//Step1
 $con = mysqli_connect('localhost','pi','reprodux','SiteInfo')
 or die('Error connecting to MySQL server.');

  $query = "SELECT * FROM Reminders";
  mysqli_query($con, $query) or die('Error querying database');

  $result = mysqli_query($con,$query);
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DisplayV7</title>
    <link rel="stylesheet" href="stylesV4.css" >
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src='time.js'></script>

    <div class="header-container">
      <div class="header">
        <div class="time" id ='clock'></div>
      </div>
    </div>


    <div class="weather-container">

      <div class="weather-grid">
        <div class="current">
          <script type="text/javascript" src="weatherv2.js"></script>
          <div class="current-header">
            <h1 class= 'city' id = "city"></h1>
          </div>
          <div class="current-info">
            <img class='sign'src="" alt="icon" id="icon" width='75'/>
            <div class="degrees">
              <h1 class ="num" id='temp'>16</h1>
              <span class = 'circle'>&#176;</span>
            </div>
            <h3 class = 'desc' id='desc'></h3>
          </div>
        </div>

        <div class="weekcast">

            <h1 class="future">5 day</h1>

          <div class="weekcast-info">
            <ul>
              <li><span class = 'day1' id='day1'> </span> : <img src="" alt="icon" id= 'day1-icon' width='30'/> : <span id='day1-degree'></span>&#176; - <span id='day1-desc'></span></li>
              <li><span class = 'day2' id='day2'> </span> : <img src="" alt="icon" id= 'day2-icon' width='30'/> : <span id='day2-degree'></span>&#176; - <span id='day2-desc'></span></li>
              <li><span class = 'day3' id='day3'> </span> : <img src="" alt="icon" id= 'day3-icon' width='30'/> : <span id='day3-degree'></span>&#176; - <span id='day3-desc'></span></li>
              <li><span class = 'day4' id='day4'> </span> : <img src="" alt="icon" id= 'day4-icon' width='30'/> : <span id='day4-degree'></span>&#176; - <span id='day4-desc'></span></li>
              <li><span class = 'day5' id='day5'> </span> : <img src="" alt="icon" id= 'day5-icon' width='30'/> : <span id='day5-degree'></span>&#176; - <span id='day5-desc'></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="reminder-container">

      <table class ='table'>
        <thead>
          <th class = 'rhead'>Reminders</th>
        </thead>
        <?php
          include "dbCon.php";

          $data = mysqli_query($con, "SELECT * FROM `Reminders`");

          $num = mysqli_num_rows($data);
          if($num == 0){
            echo "
          <tr>
            <td>No reminders added as of right now. </td>
          </tr>";}

          while($row = mysqli_fetch_array($data)):
        ?>
          <tr>
            <td><a id="button" class= 'button' href="delete.php?id=<?php echo $row['id']; ?>" ><?php echo $row['reminder'] ?></a></td>
          </tr>
        <?php endwhile; ?>

      </table>

    </div>


  </body>
</html>
