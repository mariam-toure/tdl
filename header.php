<!DOCTYPE html>
<html lang="en">
<head>
<title>index</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style the body */
body {
  font-family: Arial;
  margin: 0;
}

/* Header/Logo Title */
.header {
  padding: 10px;
  text-align: center;
  background:darkslategray ;
  color: white;
  font-size: 20px;
  display: flex;
  flex-direction: row;
  justify-items: center;
  align-items: center;
    
}
  
ul {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    list-style: none;
    align-items: center;
    
}

ul a {
    text-decoration: none;
    color: white;
    margin-left:241px;

} 
/* Page Content */
.content {padding:20px;}
</style>
</head>
<body>

<div class="header">
      

<?php if (isset($_SESSION['id'])) : ?>

<ul>
  
  <li><a href="index.php">Accueil</a></li>
  <li><a href="profil.php">Profil</a></li>
  <li><a href="todolist.php">todolist</a></li>
  <li><a href="connexion.php?deco">Se deconnecter</a></li>

</ul>

<?php else : ?>

<!--<nav class="head-menu"-->
<ul>
  
  <li><a href="index.php">Accueil</a></li>
  <li><a href="inscription.php">Inscription</a></li>
  <li><a href="connexion.php">Se connecter</a></li>

</ul>

<?php endif; ?>
</div>

</header>
</body>
</html>  