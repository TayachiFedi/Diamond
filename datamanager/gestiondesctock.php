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
		<title>Liste des produits</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="DataTables/assets/css/main.css"/>
		
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

    

	

</head>
	<body>




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
                                    <th>Libelle</th>
                                    <th>Matiere</th>
                                    <th>Categorie</th>
                                    <th>Prix</th>
                                    <th>Quantité en Stock</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                require_once("./../metier/database.php");

                                global $db;
                                if(!empty($db)){

                                    $query=$db->prepare("Select * from p");
                                    $query->execute();
                                    $res = $query->fetchAll();
                                    foreach ($res as $m) {
                                        echo "<tr>";
                                        echo "<td> ".$m['id']." </td>";
                                        echo "<td> ".$m['libelle']." </td>";
                                        echo "<td> ".$m['matiere']." </td>";
                                        echo "<td> ".$m['categorie']." </td>";
                                        echo "<td> ".$m['prix']." </td>";
                                        echo '<td><form method="post" action="../metier/mettreajourstock.php"><input size="3" type="text" name="qteupdate" id="qteupdate" value="' .$m['qte'].'"/>  <button type="submit" name="valeur" id="valeur" value="'.$m['id'].'" ><span class="icon fa-plus"></button</form></td>';
                                        //echo "<td> ".$m['qte']." </td>";
                                        $sconfirm ="return confirm('Are you sure you want to delete this item?');";
                                        echo '<td><form method="post" action="../metier/supprimerdustock.php"><button type="submit" id="iduser" name="iduser" value="'.$m['id'].'"  ><span class="icon fa-times"></button> </form></td>';
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
