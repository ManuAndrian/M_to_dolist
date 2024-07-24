<?php
include("../inc/conn.php");
$sql="SELECT * FROM Task WHERE activite='Autre'";
$sqlR=mysqli_query(dbconnect(),$sql);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php if(mysqli_num_rows($sqlR) > 0) { ?>
    <div class="container">
    <div class="row">
    <table border=1 width=800 class="table table-hove">
    <center><h1>Added task(s)</h1>
                                <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Action</th>
                                </tr>
    <?php  while ($tab = mysqli_fetch_assoc($sqlR)) { ?>
        <tr>
            <td><?php echo $tab['Nom']?></td>
            <td><?php echo $tab['Desription_t']?></td>
            <td><a href="../inc/t_tache.php?idTache=<?php echo $tab['idTask'] ?>">Delete</a></td>
        </tr>
            <?php  } ?>
    </table></center>
    <?php } ?></div>
</div>
        <?php if(mysqli_num_rows($sqlR)==0) { ?>
             <center><h1 style="margin-top:10cm;">No Task added </h></center>
        <?php } ?>
</body>
</html>