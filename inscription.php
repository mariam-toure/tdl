<?php

try {
   
   $conn = mysqli_connect("localhost","root","", "todolist");

} catch (Exception $e) {
   echo $e->getMessage();
}
// var_dump($conn);
$message = "test";


// Interagir avec les données récupérées

if(isset($_POST["submit"])) {
    if (isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password1']) && isset($_POST['password2'])) {

         $search_sql = "SELECT * FROM `utilisateurs` WHERE login = 'login'";
         $result = mysqli_query($conn, $search_sql);

         $rowcount = mysqli_num_rows($result);


         if ($rowcount == 0) {
            // Attribuer des variables aux valeurs des champs du formulaire
            $login=htmlspecialchars($_POST["login"]);
            $prenom=htmlspecialchars($_POST["prenom"]) ;
            $nom=htmlspecialchars($_POST["nom"]) ; 
            $password1=htmlspecialchars($_POST["password1"]);
            $password2=htmlspecialchars($_POST["password2"]);


            // echo "connecting::: p1 = $password1 + p2 = $password2";

            // Tester si le password et sa confirmation sont indentiques
            if($password1 === $password2){
               $insert_sql = "INSERT INTO `utilisateurs` (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password1')";

               if (mysqli_query($conn, $insert_sql) === TRUE) {
                  echo "nouvel utilisateur: $login !!!";
               } else {
                  echo "error: " . $insert_sql . "<br>" . $conn->error;
               }

            }
         }             

       // si oui : je check ensuite en bdd si le login n'est pas déjà pris 
       $loginok = false;
      }   
   }   

   mysqli_close($conn);

   ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="x-UA-comptable" content="IE=edge">
      <meta name="viemport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="index.css"> 
      <title>Inscription</title>

      <style>
      body {
  font-family: Arial;
  margin: 0;
} 
  .myform{
    padding-bottom:10px;
    margin-left: 500px;
    background-color:silver;
    width:27%;
    height:400px;
    text-align: center;
    padding: 57px;
    border-radius: 45px;

}
input{
  padding: 5px;
}
</style>  
        
  </head>

  <body>
     

      <?php include "header.php";?>
      
      <main>
         <h1>Inscription</h1>
         <p class="erreurs"><?php echo $message; ?></p>

         <div class="container">
               <form method="post" class="myform">
                  
                  <label for="login">Login</label><br>
                     <input type="text" id="login" name="login"><br>

                  <label for="prenom">Prenom</label><br>
                     <input type="text" id="prenom" name="prenom"><br>

                  <label for="nom">Nom</label><br>
                     <input type="text" id="nom" name="nom"><br>

                  <label for="password1">Password</label><br>
                     <input type="password" id="password1" name="password1"><br>

                  <label for="password2">Confirmation du password</label><br>
                     <input type="password" id="password2" name="password2"><br>

                  <input type="submit" name="submit" value="Envoyer">
               </form>
         </div>

      </main> 
      

      
   </body>

</html>