<?php
    include "config.php";
    error_reporting(E_ALL);
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: admin.php");
    }       
    $mail = $_SESSION['user_name'];
    $query2 = "SELECT nombre FROM Users WHERE user='$mail'";
    $res = mysqli_query($mysqli, $query2);
    $mysqli->close(); //cerramos la conexió
    $num_row = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Agregar Nuevo Salón</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	   
        
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css_template/bootstrap.min.css" rel="stylesheet">
	<link href="css_template/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css_template/admin.css" rel="stylesheet">
	<link id="base-style-responsive" href="css_template/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	<script src="js/bootbox.js"></script>
<script src="js/bootbox.min.js"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css_template/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css_template/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Casa Beltrami</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">


						
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> 
                                                                <?php echo $row['nombre']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Opciones</span>
								</li>
								
								<li><a href="logout.php?logout"><i class="halflings-icon off"></i> Cerrar Sesión</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
                                           <li ><a href="salon.php"><i class="icon-calendar"></i><span class="hidden-tablet">&nbsp;Salones</span></a></li>
                                            <li ><a href="events.php"><i class="icon-globe"></i><span class="hidden-tablet"> Eventos</span></a></li>
				            <li class="active"><a href="services.php"><i class="icon-tags"></i><span class="hidden-tablet"> Servicios</span></a></li>
                                            <li><a href="images.php"><i class="icon-upload-alt"></i><span class="hidden-tablet">&nbsp; Subir Imagenes</span></a></li>
                                            <li><a href="Home.php"><i class="icon-picture"></i><span class="hidden-tablet">&nbsp; Galería Por Salones</span></a></li>   
                                            <li><a href="galeri_by_event.php"><i class="icon-picture"></i><span class="hidden-tablet"> Galería Por Eventos</span></a></li>
                                            <li><a href="gallery_by_service.php"><i class="icon-picture"></i><span class="hidden-tablet"> Galería Por Servicios</span></a></li>
                                        </ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
                            <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
                                <li><i class="icon-tags"></i><a href="salon.php">&nbsp;Crear Servicios</a></li>
                            </ul>
                            
                            
                       <?php
                            include "config.php";
                if (isset($_POST['bts'])):
    if ($_POST['name_sub_service'] != null && $_POST['status'] != null && $_POST['service'] != null ) {
        $stmt = $mysqli2->prepare("INSERT INTO sub_services(name_sub_service,status,id_service) VALUES (?,?,?)");
        $stmt->bind_param('sss', $name_sub_service, $status,$id_ser);
        $name_sub_service = $_POST['name_sub_service'];
        $status = $_POST['status'];
        $id_ser = $_POST['service'];
        if ($stmt->execute()):
             $mysqli2->close(); //cerramos la conexió
           echo "<script>location.href='sub_services.php'</script>";
        
?>             
              
<?php
    else:
?>
    <p></p>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Error!</strong> <?php echo $stmt->error; ?>
    </div>
<?php
    endif;
    } else {
?>
    <p></p>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Error!</strong>Llena los campos
        </div>
<?php
    }
    endif;
?>
    <br>
   <h1 style="text-align: center">LLENA LOS SIGUIENTES CAMPOS</h1>  
    <p><br/></p>
    
    <div class="panel panel-default">
        
    <div class="panel-body">
        <form role="form" method="post" class="form-horizontal">
            
            <div class="control-group col-sm-5 mar-top40">
		<label class="control-label" for="focusedInput">Nombre Del Sub Servicio:</label>
		    <div class="controls">
		        <input class="input-xlarge focused" id="focusedInput" type="text" 
                               name="name_sub_service" id="nm">
		    </div>
	    </div>
     
             <div class="control-group col-sm-5 mar-top41">
                                    <label class="control-label" for="selectError">Asignar salón:</label>
                                        <div class="controls">
                                            <select  data-rel="chosen" name="service" id="service">
                                                <?php
                                                    
                                                    $sql1 = "SELECT id_service,name_service from services WHERE status=1";
                                                    $result1 = $mysqli2->query($sql1);
                                                    if ($result1->num_rows > 0) { 
                                                        $combobit1 = "";
                                                        while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
                                                        $combobit1 .=" <option value='" . $row1['id_service'] . "'>" . $row1['name_service'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
                                                        }
                                                    } else {
                                                    echo "No hubo resultados";
                                                }
                                                $mysqli2->close(); //cerramos la conexión
                                                echo $combobit1;
                                                ?>
                                            </select>
                                        </div>
                                </div>
            <div class="control-group col-sm-5 mar-top50 ">
		<label class="control-label" for="selectError">Estatus:</label>
		<div class="controls">
                    <select id="selectError" data-rel="chosen" name="status">
                        <option value="1">Activa</option>
                        <option value="0">Inactivo</option>
                    </select>
		</div>
            </div>
             
              <div class="form-group">
                <input type="hidden" type="text" class="form-control" name="creation_date" id="" value="<?php echo date("Y/m/d") ?>">
            </div>  
<!--            <div class="form-group">
                <label for="section">Seccion a la que pertenece</label>
                <input type="text" class="form-control" name="section" id="">
            </div>-->
            <center>
                <a href="services.php" class="btn btn-primary btn-md center-block mar-right mar-top40"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
                <button type="submit" name="bts" class="btn btn-success center-block mar-top40">Guardar</button>
            </center> 
        </form>
          
    </div>
</div>

                        </div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2016 <a >Blick</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js_template/jquery-1.9.1.min.js"></script>
	<script src="js_template/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js_template/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js_template/jquery.ui.touch-punch.js"></script>
	
		<script src="js_template/modernizr.js"></script>
	
		<script src="js_template/bootstrap.min.js"></script>
	
		<script src="js_template/jquery.cookie.js"></script>
	
		<script src='js_template/fullcalendar.min.js'></script>
	
		<script src='js_template/jquery.dataTables.min.js'></script>

		<script src="js_template/excanvas.js"></script>
	<script src="js_template/jquery.flot.js"></script>
	<script src="js_template/jquery.flot.pie.js"></script>
	<script src="js_template/jquery.flot.stack.js"></script>
	<script src="js_template/jquery.flot.resize.min.js"></script>
	
		<script src="js_template/jquery.chosen.min.js"></script>
	
		<script src="js_template/jquery.uniform.min.js"></script>
		
		<script src="js_template/jquery.cleditor.min.js"></script>
	
		<script src="js_template/jquery.noty.js"></script>
	
		<script src="js_template/jquery.elfinder.min.js"></script>
	
		<script src="js_template/jquery.raty.min.js"></script>
	
		<script src="js_template/jquery.iphone.toggle.js"></script>
	
		<script src="js_template/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js_template/jquery.gritter.min.js"></script>
	
		<script src="js_template/jquery.imagesloaded.js"></script>
	
		<script src="js_template/jquery.masonry.min.js"></script>
	
		<script src="js_template/jquery.knob.modified.js"></script>
	
		<script src="js_template/jquery.sparkline.min.js"></script>
	
		<script src="js_template/counter.js"></script>
	
		<script src="js_template/retina.js"></script>

		<script src="js_template/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>