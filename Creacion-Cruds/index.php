<?php
$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applus Inventary</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./frontend/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./frontend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./frontend/assets/plugins/adminlte/css/adminlte.min.css">
    <!-- Fa Fa Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./frontend/node_modules/font-awesome/css/font-awesome.min.css">
    <link href="./frontend/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" href="./frontend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./frontend/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./frontend/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="./frontend/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./frontend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="./frontend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./frontend/assets/plugins/adminlte/js/adminlte.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="./frontend/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./frontend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./frontend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./frontend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./frontend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./frontend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./frontend/assets/plugins/jszip/jszip.min.js"></script>
    <script src="./frontend/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="./frontend/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="./frontend/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./frontend/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./frontend/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="./frontend/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <?php include "./frontend/modules/navbar.php"; ?>
        <?php include "./frontend/modules/sidebar.php"; ?>

        <div class="content-wrapper">
            <?php
            if (!empty($routesArray[3])) {
                if ($routesArray[3] == "product" || $routesArray[3] == "category") {
                    include "./frontend/pages/" . $routesArray[3] . "/" . $routesArray[3] . ".php";
                }
            } else {
                include "./frontend/pages/product/product.php";
            }

            ?>
        </div>

        <?php include "./frontend/modules/footer.php"; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>