<p> contenu actuel du post </p>
<p><?php echo $post->content; ?> </p>
<form action="val_update" method="post">
    <div>
        <label for="content">Nouveau Contenu :</label><br>
        <textarea name="content"
            rows="10" cols="50">Le nouveau texte de votre article.</textarea>
    </div>
    <div>
        <input type="submit">
    </div>
</form>