<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsuid']==0)) {
    header('location:logout.php');
} else {
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <title>VPMS - View Transactions</title>
    <!-- Include your CSS links here -->
</head>
<body>
    <!-- Include sidebar and header -->
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="view-transactions.php">View Transactions</a></li>
                                <li class="active">View Transactions</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">View Transactions</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>User</th>
                                        <th>Parking Space</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve transaction data from the database
                                    $query = "SELECT * FROM transactions";
                                    $result = mysqli_query($con, $query);
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php echo $row['user'];?></td>
                                        <td><?php echo $row['parking_space'];?></td>
                                        <td><?php echo $row['amount'];?></td>
                                        <td><?php echo $row['status'];?></td>
                                        <td><?php echo $row['transaction_date'];?></td>
                                        <td>
                                            <!-- Add actions here (if needed) -->
                                        </td>
                                    </tr>
                                    <?php 
                                $cid=$_GET['viewid'];
                                $ret=mysqli_query($con,"select * from tblvehicle where ID='$cid'");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret))  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="clearfix"></div>
    <!-- Include footer -->
    <?php include_once('includes/footer.php');?>
</body>
</html>
<?php } ?>

