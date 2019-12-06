<!DOCTYPE HTML>
<?php
//require_once("metier/functions.php");
//if(amiLoggedIn()) {$user = getuserData();}
//else {
  //  header("Location: http://localhost");
//}
?>
<html>
	<head>
		<title>Livraisons</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="DataTables/assets/css/main.css"/>
		
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script src="../assets/js/notie.min.js"></script>
        <script type="application/javascript" src="../metier/js/achat.js"></script>
    

	

</head>
	<body onload="requestit()">




		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-diamond"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Diamond</h1>
                            </br><p>Hommage aux magnifiques pierres précieuses taillées à la perfection dans des designs audacieu ces</br>
                                créations illustrent le sens esthétique et le savoir-faire exceptionnel de la Maison romaine.</p>
							</div>

                            <table align="center" id="myTable" class="table" data-page-length="10" >

                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom & Prenom</th>
                                    <th>Produits</th>
                                    <th>Adresse</th>
                                    <th>montant</th>
                                    <th>date de livraison</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                require_once("./../metier/database.php");

                                global $db;
                                if(!empty($db)){

                                    $query=$db->prepare("Select * from a");
                                    $query->execute();
                                    $res = $query->fetchAll();
                                    foreach ($res as $m) {
                                        echo "<tr>";
                                        echo "<td> ".$m['id']." </td>";
                                        echo "<td> ".$m['nom'].''.$m['prenom']." </td>";
                                        echo "<td> ".$m['libelle']." </td>";
                                        echo "<td> ".$m['addresse'].' '.$m['ville'].' '.$m['codepostal']." </td>";
                                        echo "<td> ".$m['prix']." </td>";
                                        echo "<td> ".$m['datelivraison']." </td>";
                                        $l=$m['id'];
                                        //echo "<td></td>";
                                        echo "<td><button type='submit' onclick='solder($l)'><span class='fa fa-check-circle'></span> </button></td>";
                                        $sconfirm ="return confirm('Are you sure you want to delete this item?');";
                                        echo "</tr>";
                                    }

                                }

                                ?>
                                </tbody>

                            </table>
        </br>
                            </form>
                        </div>
    </body>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script type="text/javascript" src="../assets/js/sweetalert.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#myTable').DataTable( {
			colvis:true,
			autoFill: true,
			"pagingType": "full_numbers",
			"info":     false,
			select: true,
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "tous"]],
            dom: 'Bfrtip',
            buttons: [
                'print',
				'csv',
                'excel',
                'pdf',
				'copy',
				'selectAll',
        		'selectNone'
            ]

        } );
    } );



    /*swal({
        title: "Are you sure?",
        text: "Once ble to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
*/
</script>
</html>
