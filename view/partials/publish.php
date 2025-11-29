<form action="publier.php" method="POST" enctype="multipart/form-data">
    <div>
        <input type="hidden" name="csrf-token" value ="<?php echo $_SESSION['csrf_token']; ?>">
    </div>
    <div>
        <label for="title">Titre :</label>
        <input type="text" name ="title" id="title" required >
    </div>
    <div>
        <label for="picture">Image</label>
        <input type="file" name="picture" id="picture" required >
    </div>
    <div>
        <label for="description">Description :</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <button type= "submit" name="submit"> Publier</button>
    </div>
</form>