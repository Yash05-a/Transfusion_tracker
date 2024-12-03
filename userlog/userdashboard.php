<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include 'includes/donornav.php'?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Donor's Dashboard
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <style>
    #scrolling-announcements {
          /* Darker red background color */
        padding: 10px;
        font-size:17px;
        font-weight: bold;
        color: #333;
        text-align: center;
    }

    #scrolling-announcements marquee {
        font-family: Arial, sans-serif;
        white-space: nowrap;
        overflow: hidden;
    }
    .bn-label {
        background-color: red; /* Red background color */
        color: #fff;
        padding: 5px;
        border-radius: 5px;
        display: inline-block; /* Display the label inline */
    }

    .arrow_box_right {
        position: relative;
        
    }

    .arrow_box_right::after {
        content: "";
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -5px;
        border-width:5px;
    
        border-style:solid;
        
        border-color: transparent transparent transparent red;
    }
</style>
 <div id="scrolling-announcements">
               
           
            
                <marquee behavior="scroll" direction="left">
                <span class="bn-label arrow_box_right"> Announcements </span>
                &nbsp;&nbsp;&nbsp; &nbsp;
                <?php
        // Database credentials
        $servername="localhost";
        $uname="root";
        $pass="";
        $db="secyear";

        try {
            // Create a PDO instance
            $conn = new PDO("mysql:host=$servername;dbname=$db", $uname, $pass);

            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch announcements from the database
            $stmt = $conn->prepare("SELECT announcement FROM announce");
            $stmt->execute();
            $announcements = $stmt->fetchAll(PDO::FETCH_COLUMN);

               // Loop through the announcements and display them
            $numAnnouncements = count($announcements);
            for ($i = 0; $i < $numAnnouncements; $i++) {
                echo $announcements[$i]."&nbsp;&nbsp;";

                // Add a space between announcements (adjust the number of spaces as desired)
                if ($i < $numAnnouncements - 1) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                }
 
                
                 }
                
            
            catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        // Close the database connection
        $conn = null;
        ?>
        
       
                </marquee>
                
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="icofont-blood icofont-5x"></i>
                                    <!-- <i class="fa fa-heartbeat fa-5x"></i> -->
                                </div>
                                <div class="col-xs-9 text-right">
                                    <!-- in order to count total donor's record -->
                                    <?php include 'counter/dashbloodcount.php';?> 
                                    
                                    <div>Available Blood</div>
                                </div>
                            </div>
                        </div>
                        <a href="userviewblood.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Blood Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                     
                                <!-- in order to count total donor's record -->
                                        <?php include 'counter/dashboardcampaigncount.php';?> 

                                    <!-- <div class="huge">26</div> -->
                                    <div>Campaigns Made</div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="userviewcampaigns.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Campaigns</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bullhorn fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php include 'counter/dashannouncecount.php';?>
                                    <div class="huge"> </div>
                                    <div>Announcement</div>
                                </div>
                            </div>
                        </div>
                        <a href="userviewannouncement.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Announcement Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="icofont-blood-drop icofont-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Donate</div>
                                    <div>Blood</div>
                                </div>
                            </div>
                        </div>
                        <a href="useraddblood.php">
                            <div class="panel-footer">
                                <span class="pull-left">Donate Blood Now!</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div class="container">
	<div class="row">
	<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong><i class="fa fa-warning"></i> You Are Currently Viewing User's Account</strong> <marquee><p style="font-family: Impact; font-size: 18pt">You Are Currently Viewing User's Account</p></marquee>
</div> -->
	</div>
</div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

<footer>
        <p>&copy; <?php echo date("Y"); ?>: Developed By Swati, Suryanshi, Yashmitha</p>
    </footer>
	
	<style>
	footer{
   background-color: #424558;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
	</style>

</html>
