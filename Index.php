<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attandace Sheet</title>
  <script src="index.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style/style.css">

  
</head>
<body>
 
<form  action="#" method="post" class="my-form">
  <div class="container">
    <h1>Attendance Div F</h1>
  <ul>

    <li>
      <div class="grid grid-2">
        <input type="text" placeholder="Name" name="name" id="name" required>  
        <input type="text" placeholder="Enrollment number" name="enroll_number" id="enroll_number">  
        <input type="date" placeholder="date" id="date" name="date" required>
      </div>
    </li>

    <li>
      <select name="selection" id="selection" >
        <option selected disabled>-- Select Lecture --</option>
        <option value="Adv Java">Adv Java</option>
        <option value="DCN">DCN</option>
        <option value="CG">CG</option>      
        <option value="CA">CA</option>
        <option value="FSW">FSW</option>      
      </select>
    </li>

    <li>    
      <button class="btn-grid" type="submit" value="Submit" onclick="return a1();">
        <span class="back">
        
        </span>
        <span class="front">SUBMIT</span>
      </button> 
      <br> <br>
        <a href="admin/index.php"><button  class="btn-grid" type="button"  >
            
            <span class="front">Admin</span>
          </button> </a>
        </div> 
    </li>

  </ul>
  </div>
</form>
        <!-- // php database work start -->
          <?php 

            if($_POST)
            {     
              
              $name=$_POST['name'];
              $enroll_number=$_POST['enroll_number'];
              $date=$_POST['date'];
              $selection=$_POST['selection'];

              $con = mysqli_connect("localhost","root","","attendance");

             $con->query("INSERT INTO `user`(`name`, `enroll_number`, `date`, `selection`) VALUES ('$name','$enroll_number','$date','$selection')");
            }                                                                                                                                                                                                                 
          ?>

        <!-- php databse work end  -->

  <script type="text/javascript">
  function a1()
    {
      var selection=$("#selection").val();
        if(selection=="Select Lecture")
        {
          alert("Select Lecture");
          return false;
        }
    }
  </script>
       
        
</body>
</html>

