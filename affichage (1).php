<?php

try{
$db = new PDO( 'mysql:host=localhost;dbname=locationvoiture;charset=utf8', 'root','');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

$sqlQuery = 'SELECT * FROM voiture';

$requete = $db->prepare($sqlQuery);
$requete->execute();
$result = $requete->fetchAll();




?>
<html>
 <head>
<style>
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #5469d4;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}
.button {
  transition-duration: 0.4s;
  background-color:#5469d4;
  color: white;
  border: 2px solid #167F92;

  padding: 4px 10px;
  text-align: center;
  font-family:sans-serif;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button:hover {
  background-color: BLACK; /* Green */
  color: white;
}
</style>




</head>

<body translate="no" >
  <h1>Les voitures disponible : </h1>

<table class="responstable">
  
  <tr>
  <th data-th="Driver details"><span>MATRICULE</span></th>

   
    <th>MARQUE</th>
    <th>COULEUR</th>
    <th>CARBURANT</th>
    <th>MODELE</th>
    <th>PRIX</th>
    <th>SUPPRIMER</th>
    <th>MODIFIER </th>
  </tr>

 
  <tr>
  <?php foreach ($result as $et):?>
  <td> <?=  $et['matricule'] ?></td>
  <td> <?=  $et['marque'] ?></td>
  <td> <?=  $et['couleur'] ?></td>
  <td> <?=  $et['carburant'] ?></td>
  <td> <?=  $et['modele'] ?></td>
  <td> <?=  $et['prix'] ?></td>

  
		
	  <td><a href="supprimer.php?matricule=<?=  $et['matricule'] ?>"><input class="button" type="submit" name="supprimer" value="supprimer"></a>
</td>
	
	


  <td>
  <a href="modifier.php?matricule=<?=  $et['matricule'] ?>"><input class="button" type="submit" name="modifier" value="modifier"></a> 

     </td>
</tr>
<?php endforeach; ?>



    
  
     
 
  
 
  
</table>
<footer>
  <a href="inserer.php"> Retour </a>
</footer>
</html>
