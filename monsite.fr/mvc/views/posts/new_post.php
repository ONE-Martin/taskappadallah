<h1> nouveau post </h1>
<form action="val_new_post" method="post">
    <div>
        <label for="id">ID :</label><br>
        <input type="number" name="id" required
            placeholder="Un numéro"><br>
        <label for="author">Auteur :</label><br>
        <input type="text" name="author" required
            placeholder="Votre nom"><br>
        <label for="content">Contenu :</label><br>
        <textarea name="content"
            rows="10" cols="50">Le texte de votre article.</textarea>
    </div>
    <div>
        <input type="submit">
        <!-- <button>Envoyer</button> -->
    </div>
</form>