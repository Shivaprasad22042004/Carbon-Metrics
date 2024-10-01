<?php
include("./includes/db_con.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body id="body">
<nav class="navbar navbar-expand-lg bg-body-primary" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Carbon Metrics</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./contactus.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./report.php">Report</a>
              </li>
            </ul>
          </div>
        </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-12 py-3">
            <h1 class="text-center" >Company Records</h1>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Company ID</th>
                <th scope="col">Comapany Name</th>
                <th scope="col">Country Name</th>
                <th scope="col">Region ID</th>
                <th scope="col">Present Carbon Credits</th>
                <th scope="col">Carbon Credits Assigned by Govt</th>
                <th scope="col">Carbon Credits Bought</th>
                <th scope="col">Transaction ID of Buying</th>
                <th scope="col">Carbon Credits Sold</th>
                <th scope="col">Transaction ID of Selling</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_REQUEST['submit'])){
                $country=$_REQUEST['country'];
                $fetch="SELECT * FROM carbon_credits C1 JOIN company_details C2 where C1.Company_id=C2.Company_id AND C2.Country='$country' ORDER BY C1.CarbonCredits_Sold DESC";
                $result= mysqli_query($conn,$fetch);
            $counter=1;
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['Company_name'];?></td>
                        <td><?php echo $row['Country'];?></td>
                        <td><?php echo $row['Region_id'];?></td>
                        <td><?php echo $row['Present_CarbonCredits'];?></td>
                        <td><?php echo $row['CarboCredits_Assigned_by_the_Governement'];?></td>
                        <td><?php echo $row['CarbonCredits_Bought'];?></td>
                        <td><?php echo $row['Transationid_of_Buying'];?></td>
                        <td><?php echo $row['CarbonCredits_Sold'];?></td>
                        <td><?php echo $row['Transationid_of_Selling']?></td>
                </tr>
                <?php
                $counter++;
                }
                ?>
                <?php
            }
            else{
                ?>
                <tr>
                    <td colspan="11">
                        <h3 class="text-center text-danger">No Record Found</h3>
                    </td>
                </tr>
                <?php
            }
            mysqli_close($conn);
        }
            ?>
        </tbody>
    </table>

</div>
</body>
</html>