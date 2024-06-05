
  

<?php


$con=mysqli_connect("localhost","root","","attendance");

 $selc=$_POST['selc'];

 $data=$con->query("select * from user where selc='$selc'");

 


?>






  <!-- start code here -->
  <div class="container" id="maindiv">  
    <table id="result" class="table"  border="3px solid" bgcolor="black"  style="color:#ffffff; font: size 20px;">
        <tr> 
          <th>Sr no</th>
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
  </div>




<!-- script -->

