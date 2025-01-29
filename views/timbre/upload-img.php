{{include('layouts/header.php', {title: 'Load image'})}}

<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="portail-enchere.html"><small>Vendre</small></a>
</div>
<section>
    <header>
        <h1>Vos images</h1>
    </header>
    {% for image in images %}
    <p>{{image.image_url}}</p>
    <img src="{{asset}}/uploads/{{image.image_url}}" alt="Image du timbre" width="200">
    {% endfor %}
</section>


<section>
    <header>
        <h1>Télécharger des images</h1>
    </header>
    <form action="" method="post" enctype="multipart/form-data" class="formulaire">
        <header>
            <h2>Sélectionner une image:</h2>
        </header>
        <h3>{{msg}}</h3>

        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload Image" name="submit" class="bouton bouton-or">
        <a href="{{base}}/timbre/show" class="bouton">Terminer</a>
    </form>
</section>


{{include('layouts/footer.php')}}