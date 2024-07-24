<?php
include("../inc/fonction.php");
$result=Verify_tabTask();
//Listes Taches;
$sqlR=lister_tache();
//listes taches dejas fait;
$sqlR1=aff_lisD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>#To do list</h1>
                <form action="../inc/t_tache.php" method="get">
                    <div class="mb-2">
                       <p> <label for="tache" class="form-label">Ajouter une Tache:</label>
                        <input type="text" name="tache"  id="tache">
                        <button type="submit" class="btn btn-primary">Ajouter</button></p>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description:</label>
                        <textarea style="width:11cm;" id="description" name="description" rows="2" class="form-control" placeholder="Entrez votre description ici..." required></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <select name="activite" class="form-select" required>
                            <option value="">Activité</option>
                            <option value="Travaille">Travaille</option>
                            <option value="Personnel">Personnel</option>
                            <option value="Autre">Autre</option>
                        </select>
                    <span style="margin-left:30px">
                        <select name="importance" class="form-select" required>
                            <option value="">Priorité</option>
                            <option value="1">Important</option>
                            <option value="2">Normal</option>
                        </select>
                             </span>
                    </div>
                </form>
                <div class="Activite">
                    <table style="margin-top:80px;">
                    <tr style="background-color:azure;"><th><p class="btn btn-outline-secondary">Activite</p>
                    </th></tr>
                    <tr ><td><a href="t_travaille.php" class="btn btn-outline-secondary">Travaille</a></td><tr>
                    <tr><td><a href="t_personnel.php" class="btn btn-outline-secondary">Personnel</a></td></tr>
                    <tr><td><a href="t_autre.php" class="btn btn-outline-secondary">Autre</a></td></tr>
                    </tr></table>
                </div>
    </div>
                <?php if(mysqli_num_rows($result) > 0) { ?>
                     <div class="col-md-5">
                    <h1>Listes taches</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Activité</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($tab = mysqli_fetch_assoc($sqlR)) { ?>
                                <tr>
                                    <td><?php echo $tab['Nom']; ?></td>
                                    <td><?php echo $tab['Desription_t']; ?></td>
                                    <td><?php echo $tab['activite']; ?></td>
                                    <td style="width: 200px;"  ><a href="../inc/t_tache.php?idTache=<?php echo $tab['idTask']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a><span style="margin-left:10px"><a  href="../inc/t_tache.php?idTache=<?php echo $tab['idTask']; ?>&&Achieved=<?php echo $tab['Nom']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon" aria-hidden="true">Achieved</span></a></span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
</div>
    <div class="row">
            <?php if(mysqli_num_rows($sqlR1) > 0) { ?>
                <div id="menulist_D" class="col-md-5">
                    <h1>List Task Achieved</h1>
                    <table  style="filter: blur(1px);" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($tab = mysqli_fetch_assoc($sqlR1)) { ?>
                                <tr>
                                    <td><span style="color:rgb(0, 213, 14);margin-right:3px;" class="glyphicon glyphicon-ok" aria-hidden="true"></span><?php echo $tab['NomList']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a id="btn" href="../inc/t_tache.php?drop" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Remove all</a>
            </div>
            <?php } ?>
</div>
    </div>
    
</body>
</html>