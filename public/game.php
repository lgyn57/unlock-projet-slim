<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jeu Unlock!</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php function affichageCartes($id) {
    foreach ($id as $card) {
        ?>
                <img src="img/<?php echo $card?>.png" alt="image de la carte" id="photo">
            <?php
    }
}

    ?>
<div class="carte">
<?php  affichageCartes(['11', '37', 'F121']); ?>
</div>
<form action="game.php" method="post">
<label for="number">Numéro de carte</label>     
<input type="text" id="input_card" name="id_card" required
minlength="1" maxlength="5" size="10">
<input type="submit" value="Valider">
</form>
<form action="game.php" method="post">
<label for="defausse">Défausse</label>
<input type="text" id="input_dafausse" name="id_defausse" required
minlength="1" maxlength="5" size="10">
<input type="submit" value="Confirmer défausse">
</form>

<form action="combiner.php" method="post">
    <h3>Combiner 2 cartes</h3>
    <label for="cards1">Carte 1</label> 
    <input type="text" id="input_combi" name="cards1" required
minlength="1" maxlength="5" size="10">
    <label for="cards2">Carte 2</label> 
    <input type="text" id="input_combi" name="cards2" required
    minlength="1" maxlength="5" size="10">
<input type="submit" value="OK">
</form>
</body>

</html>