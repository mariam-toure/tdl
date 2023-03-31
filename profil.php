<?php
 session_start();

if (!isset($_SESSION['id'])) {
    
}

$id = $_SESSION['id'];

try {
   
   $conn = mysqli_connect("localhost","root","", "todolist");

} catch (Exception $e) {
   echo $e->getMessage();
}
// var_dump($conn);
$message = "test";

$result = mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE id = '$id'");
$user = mysqli_fetch_assoc($result);


// Interagir avec les données récupérées

if(isset($_POST["submit"])) {
    if (isset($_POST['login']) && isset($_POST['password1']) && isset($_POST['password2'])) {
     
        // Attribuer des variables aux valeurs des champs du formulaire
        $login=htmlspecialchars($_POST["login"]);
        $password1=htmlspecialchars($_POST["password1"]);
        $password2=htmlspecialchars($_POST["password2"]);


        // echo "connecting::: p1 = $password1 + p2 = $password2";

        // Tester si le password et sa confirmation sont indentiques
        if($password1 === $password2){
            $update_sql = "UPDATE `utilisateurs` SET login = '$login', password = '$password2' WHERE id = '$id'";

            if (mysqli_query($conn, $update_sql) === TRUE) {
                echo "profile de l'utilisateur a été modifié: $login !!!";
            } else {
                echo "error: " . $insert_sql . "<br>" . $conn->error;
            }

        }

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
      <title>Profil</title>


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
    height:300px;
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
         <h1> Profil</h1>
         <p class="erreurs"><?php echo $message; ?></p>

         <div class="container2">
               <form method="post" class="myform" style="text-align: center";>
                  
               <label for="login">Login</label><br>
                     <input type="text" id="login" name="login" value="<?php if(isset($login)) { echo $login;} else { echo $user['login'];} ?>"><br>
                  
                  <label for="password1">Password</label><br>
                     <input type="password" id="password1" name="password1" placeholder="Nouveau votre mot de passe"><br>

                  <label for="password2">Confirmation du password</label><br>
                     <input type="password" id="password2" name="password2"  value="" placeholder="Confirmer votre mot de passe"><br>
                   <br>
                  <input type="submit" name="submit" value="Modifier">
               </form>
         </div>

      </main>    
   </body>

</html>