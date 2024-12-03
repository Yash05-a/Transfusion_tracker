<?php
include "../pages/dbconnect.php";

$bloodgroup = $_GET['bloodgroup'];
$address = $_GET['address'];

$qry = "SELECT * FROM blood WHERE 1=1";

if (!empty($bloodgroup)) {
   $qry .= " AND bloodgroup LIKE '%$bloodgroup%'";
}

if (!empty($address)) {
   $qry .= " AND address LIKE '%$address%'";
}

$result = mysqli_query($conn, $qry);
?>

<!DOCTYPE html>
<html>
<head>


   <style>
      body {
         background-image:url("searchbg.jpg") ;
         background-size: cover;
         background-repeat: no-repeat;
         background-position: center;
         color: #333;
         
      }

      .table {
         border-collapse: separate;
         border-spacing: 0;
         width: 100%;
         background-color: #fff;
         color: #333;
      }
      .table th,
      .table td {
         padding: 10px;
         text-align: center;
         vertical-align: middle;
      }
      .table thead th {
         background-color:#B7E9F7;
         font-weight: bold;
      }
      .table tbody tr {
         background-color:#DBF3FA;
      }
      .table tbody tr:nth-child(even) {
         background-color: 	#B7E9F7;
      }
      .table-hover tbody tr:hover {
         background-color: #F5FCFF;
      }
      .table-bordered {
         border: 1px solid #dddddd;
      }
      .table-bordered th,
      .table-bordered td {
         border: 1px solid #dddddd;
      }
      .table-striped tbody tr:nth-child(odd) {
         background-color: #22c0f0;
      }
      h2 {
         color: #333;
      }
   </style>
</head>
<body>
   <!-- Display the search results in a styled table -->
   <div class="table-responsive">
      <div>
         <h1>The available blood stock information.</h1>
         <?php if (mysqli_num_rows($result) > 0) { ?>
            <table class="table table-bordered table-hover" id="dataTables-example" >
               <thead>
                  <tr>
                     <th>Blood Group</th>
                     <th>Full Name</th>
                     <th>Gender</th>
                     <th>D.O.B</th>
                     <th>Weight</th>
                     <th>Address</th>
                     <th>Contact</th>
                     <th>Blood Quantity</th>
                     <th>Collection Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($result)) {
                     echo "<tr class='gradeA'>";
                     echo "<td>".$row['bloodgroup']."</td>";
                     echo "<td>".$row['name']."</td>";
                     echo "<td>".$row['gender']."</td>";
                     echo "<td>".$row['dob']."</td>";
                     echo "<td>".$row['weight']."</td>";
                     echo "<td>".$row['address']."</td>";
                     echo "<td>".$row['contact']."</td>";
                     echo "<td>".$row['bloodqty']."</td>";
                     echo "<td>".$row['collection']."</td>";
                     echo "</tr>";
                  }
                  ?>
               </tbody>
            </table>
         <?php } else { ?>
            <h2>No blood stock information available.</h2>
         <?php } ?>
      </div>
   </div>
</body>
</html>
