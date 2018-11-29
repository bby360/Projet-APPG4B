<!DOCTYPE html>

<html>
<head>
   <meta charset="utf-8" />
   <title>Inscription</title>
   <link rel="stylesheet" type="text/css" href="inscription.css" /> 
</head>
<body>

    <header>
        <h1>VOTRE MAISON A PORTEE DE MAIN</h1>
    </header>

    <section>
        <form method="POST" action="./views/model.php">

            <table align="center">
                <tr>
                    <td>
                       <label>Nom :</label> 
                   </td>
                   <td>
                       <input type="text" name="name" id="name"autofocus>
                   </td>
               </tr>
               <tr>
                <td>
                   <label>Prenom : </label>
               </td>
               <td>
                   <input type="text" name="firstName" id="firstName" required>
               </td>
           </tr>
           <tr>
            <td>
              <label>Pseudo : </label>
          </td>
          <td>
              <input type="text" name="login" required>
          </td>
      </tr>
      <tr>
        <td>
           <label>Mail : </label>
       </td>
       <td>
           <input type="email" name="email" placeholder="Ex: jean.dupont@gmail.com" id="email" required>
       </td>
   </tr>
   <tr>
    <td>
       <label>Mot de passe : </label>
   </td>
   <td>
       <input type="password" name="password" required>
   </td>
</tr>
<tr>
    <td>
       <label>Confirmation mot de passe : </label>
   </td>
   <td>
       <input type="password" name="confirm_password" required>
   </td>
</br>

</table>

<p>
    <input type="submit" value="Retour">
    <input type="reset" value="Suivant">
</p>

</form>
</section>
<footer>
  <div id="triangle"></div>
  <p>Copyright - Tous droits réservés<br/>
  </footer>
</body>
</html>