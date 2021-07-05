<?php include_once("../includes/inc_functions.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Haviz Lanzile | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="shortcut icon" href="../img/1fa39604-50a2-4ad7-9a48-85271cdbc0bd (1).ico" type="image/x-icon">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- header -->
        <?php include_once("pages/header.php"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include_once("pages/sidebar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Products
                    <small> Upload Product</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            <div class="row container">

                <?php
                if (isset($_POST['uploadProduct'])) {
                    $createproduct = array($_POST['productname'], $_POST['productdesc'], $_POST['productfeatures'], $_POST['productcategory'], $_FILES['productimage'], $_POST['productamount'], $_POST['productquantity'], $_POST['productSize'], $_POST['productColor']);
                    uploadproduct($conn, $createproduct);
                }
                ?>
                <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal">

                    <div class='alert' id="message-box" style="display: none"> Please select just 2 images.. </div>
                    <div class="col-lg-7 mt-4" style="margin-top: 30px;">
                        <div class="card" style="background-color: white; padding: 40px 40px 40px 40px">
                            <span style="color: darkgoldenrod; font-weight: bolder; font-family:'montserrat' , 'sans-serif';font-size: 16px; ">Product details </span>
                            <div class=" card-body card-block" style="margin-top: 10px">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Product Name <b style="color: red">*</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="productname" type="text" id="productname" placeholder="Product Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Description <b style="color: red">*</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="productdesc" id="productdesc" rows="4" placeholder="Product Description..." class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Features <b style="color: red">*</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="productfeatures" id="productfeatures" rows="4" placeholder="Content..." class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Category <b style="color: red">*</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="productcategory" id="productcategory" class="form-control" required>
                                            <option value="0">Please select</option>
                                            <option value="clothing">Clothing</option>
                                            <option value="shoe">Shoe</option>
                                            <option value="bag">Bag</option>
                                            <option value="wristwatch">Wristwatch</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-multiple-input" class=" form-control-label">Select Image <b style="color: red">*</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="productimage" name="productimage[]" multiple class="form-control-file" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Background</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="color" name="productbg" id="productbg" value="#f5f5f5">
                                        <small style="color: red;">*for image without background</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-multiple-input" class=" form-control-label">Amount <b style="color: red">*</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="productamount" min="0" type="number" id="productamount" placeholder="Amount" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Old Amount (if applicable)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="oldamount" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-multiple-input" class=" form-control-label">Quantity </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="productquantity" min="1" type="number" id="productquantity" placeholder="Quantity" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 mt-4" style="margin-top: 30px;">
                        <div class="card" style="background-color: white; padding: 40px 40px 40px 40px">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Size</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input name="productSize" type="text" id="productSize" placeholder="Product Name" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Color</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="productColor" id="productColor" class="form-control">
                                        <option value="0">Please select</option>
                                        <option value="white">White</option>
                                        <option value="black">Black</option>
                                        <option value="brown">Brown</option>
                                        <option value="blue">Blue</option>
                                        <option value="pink">Pink</option>
                                        <option value="purple">Purple</option>
                                        <option value="red">Red</option>

                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Discount %</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input name="productDiscount" id="" class="form-control">
                                </div>
                            </div>




                            <div class="card-footer">
                                <button type="submit" name="uploadProduct" id="uploadProduct" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer" style="text-align: center; background:#44288A; color: white">

            <strong>Copyright &copy; <?php echo date("Y"); ?> <b style="text-transform: uppercase;"> Haviz</b>Lanzile</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">


                </div>
                <!-- /.tab-pane -->

                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../js/jquery-2.1.1.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="bower_components/raphael/raphael.min.js"></script>
    <!-- <script src="bower_components/morris.js/morris.min.js"></script> -->
    <!-- Sparkline -->
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script>
        $(document).ready(() => {
            $("#uploadProduct").on("click", (err) => {



            })
        })
    </script>



</body>

</html>