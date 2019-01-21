<?php
$connection=connectDb();
$sid=$_SESSION['sid'];
if(isset($_SESSION['cid']))
      unset($_SESSION['sid']);
$query="select * from student where sid='$sid'";
$result=mysqli_query($connection, $query);
$row=mysqli_fetch_assoc($result);
?>
<table class="table table-striped table-bordered">
      <tr>
            <th>Firstname</th> <td><?php echo $row['firstname']?></td>
      </tr>
      <tr>
            <th>Lastname</th> <td><?php echo $row['lastname']?></td>
      </tr>
      <tr>
            <th>University</th> <td><?php echo $row['university']?></td>
      </tr>
      <tr>
            <th>Email</th> <td><?php echo $row['email']?></td>
      </tr>
      <tr>
            <th>Result</th> <td><?php echo $row['result']?></td>
      </tr>
      <tr>
            <th>Father's Name</th> <td><?php echo $row['fathername']?></td>
      </tr>
      <tr>
            <th>Mother's Name</th> <td><?php echo $row['mothername']?></td>
      </tr>
      <tr>
            <th>Gender</th> <td><?php echo $row['gender']?></td>
      </tr>
      <tr>
            <th>Date of Birth</th> <td><?php echo $row['dob']?></td>
      </tr>
      <tr>
            <th>Address</th> <td><?php echo $row['address']?></td>
      </tr>
      <tr>
            <th>Number</th> <td><?php echo $row['number']?></td>
      </tr>
      <tr>
            <th>Depertment</th> <td><?php echo $row['depertment']?></td>
      </tr>
      <tr>
            <th>Level</th> <td><?php echo $row['level']?></td>
      </tr>

</table>
<?php
        freenclose($result,$connection);
    
?>
