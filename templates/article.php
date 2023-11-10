<main>
    <form class="m-5" action="#" method="get">
        <div class="mb-3">
        <h1>Article</h1>
            <br>
            <label for="titre" class="form_label">Titre</label>
            <br>
            <input type="text" class="form-input" name="titre"> 
            <br>
            <label for="auteur" class="form_label">Auteur</label>
            <br>
            <input type="text" class="form-input" name="auteur">
            <br>
            <label for="contenu" class="form_label">Votre message</label>
            <br>
            <textarea class="form-input" name="contenu"></textarea>
            <br>
            <?php
                // Définir le nouveau fuseau horaire
                date_default_timezone_set('Europe/Paris');
                $date = date('d-m-y h:i:s');
                echo $date;
            ?>
            <br>
            <button type="submit" class="btn">Envoyer</button>
        </div>
    </form>


<?php
    $erreur=[];
    $message=[];

    if($erreur==[]){
    require("./inc/db.php");

    $request=$pdo->prepare("INSERT INTO article (titre, auteur, contenu, date) VALUES (?, ?, ?, ?);");
    $request->execute([$_GET['titre'], $_GET['auteur'], $_GET['contenu'], $date]);
    }
?>
    <ul>
        <?php
        foreach($message as $value){
            echo "<li>".$value."</li>";
        }
        ?>
    </ul>
    <ul>
        <?php
        foreach($erreur as $item){
            echo "<li>".$item."</li>";
        }
        ?>
    </ul>
</main>