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
		<title>Liste des utilisateurs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="DataTables/assets/css/main.css"/>
		
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

    

	

</head>
	<body >




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
                            <form method="post" action="../metier/supprimerutilisateur.php">
                            <table align="center" id="myTable" class="table" data-page-length="10" >

    <thead>
    <tr>
        <th>Nom & Prénom</th>
        <th>E-mail</th>
        <th>Sexe</th>
        <th>Date d'inscription</th>
        <th>dernière connexion</th>
        <th>N° Telephone</th>
        <th>Fonction</th>
        <th>Nombre d'achats</th>
        <th>Modifications</th>
    </tr>
    </thead>
    <tbody>


    <?php
    require_once("./../metier/database.php");

    global $db;
    if(!empty($db)){

        $query=$db->prepare("Select * from u");
        $query->execute();
        $res = $query->fetchAll();
        foreach ($res as $m) {
            echo "<tr>";
            echo "<td> ".$m['nom'].' '.$m['prenom']." </td>";
            echo "<td> ".$m['email']." </td>";
            echo "<td> ".$m['sexe']." </td>";
            echo "<td> ".$m['dateinscription']." </td>";
            echo "<td> ".$m['lastconnection']." </td>";
            echo "<td> ".$m['tel']." </td>";
            echo "<td> ".$m['fonction']." </td>";
            echo "<td> ".$m['buycount']." </td>";
            echo '<td><button type="submit" id="iduser" name="iduser" value="'.$m['id'].'"  ><span class=\'fa fa-trash-o\'></span> </button></td>';
            echo "</tr>";
        }

    }

    ?>
    </tbody>
    
</table>
                            </form>
</br>
                        </div>
</body>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
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
</script>
</html>
