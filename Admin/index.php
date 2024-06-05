  <?php
      $con = mysqli_connect("localhost","root","","attendance");
      
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attandance List</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="index.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body>
  <h1>Attandace List</h1>
  <form class="my-form"  action="" method="POST">
    <div class="container">
      <h1>Admin Panel   </h1>
      <h3>Attendance List</h3>
      <ul>
      
        <li>
          <div class="grid grid-2">
            <input type="date" name="fdate" id="fdate"  value="<?php if(isset($_POST['fdate'])){ echo $_POST['fdate']; } ?>" placeholder="From" required>  

            <input type="date" name="tdate" id="tdate" value="<?php if(isset($_POST['tdate'])){ echo $_POST['tdate']; } ?>"placeholder="TO" required>
            <input type="text" placeholder="Search..">
            
          </div>
    
       
            
            <button class="btn-grid" type="submit">
              <span class="back">
               \
              </span>
              <span class="front">SUBMIT</span>
            </button>
            <br>
           
        </li>    
      </ul>
    </div>
  </form>

    <table id="myTable" class="table"  border="3px solid" bgcolor="black"  style="color:#ffffff; font: size 20px;">
        <tr> 
          <th>Sr no</th>
          <th>Name</th>
          <th>Enrollmeant Number</th>
          <th>Date</th>
          <th>Lecture Number</th>
          <th>Option</th>
        </tr> 
        <?php 
          

          if(isset($_POST['fdate']) && isset($_POST['tdate']))
          {
              $fdate = $_POST['fdate'];
              $tdate= $_POST['tdate'];

              $query = "SELECT * FROM user WHERE `date` BETWEEN '$fdate' AND '$tdate' ";
              $query_run = mysqli_query($con, $query);

              if(mysqli_num_rows($query_run) > 0)
              {
                  foreach($query_run as $row)
                  {
                      ?>
                      <tr>
                      <td id="stid"><?= $row['id']; ?></td>
                      <td id="stname"><?= $row['name']; ?></td>
                      <td id="stno"><?= $row['enroll_number']; ?></td>
                      <td id="stdate"><?= $row['date']; ?></td>
                      <td id="stselc"><?= $row['selection']; ?></td>
                      <td class="text-left"><a href="delete.php?book=<?= $row['id']; ?>">
                      <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                      </tr>
                      <?php
                  }
              }
              else
              {
                  echo "No Record Found";
              }
          }
        ?>
         
    </table>
    <br><br>
    <button id="convert">
      Convert to image
      </button>
      <div id="result">
         <!-- Result will appear be here -->
      </div>
      
      <script type="text/javascript" src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
      <script>
         //convert table to image            
         function convertToImage() {
            var resultDiv = document.getElementById("result");
            html2canvas(document.getElementById("myTable"), {
                onrendered: function(canvas) {
                    var img = canvas.toDataURL("image/jpg");
                    result.innerHTML = '<a download="test.jpeg" href="'+img+'">Dawoload Image</a>';
                    }
            });
         }        
         //click event
         var convertBtn = document.getElementById("convert");
         convertBtn.addEventListener('click', convertToImage);
      </script>

</body>
</html>