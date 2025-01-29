{{include('layouts/header.php', {title: 'Profil membre'})}}

<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/membre/profil?id={{membre.id}}"><small>Mon profil</small></a>
</div>
<div class="formulaire">
    <h1>Mon profil</h1>
    <p><strong>Prénom: </strong>{{ membre.prenom }}</p>
    <p><strong>Nom: </strong>{{ membre.nom_famille }}</p>
    <p><strong>Adresse: </strong>{{ membre.adresse }}</p>
    <p><strong>Ville: </strong>{{ membre.ville }}</p>
    <p><strong>Province: </strong>{{ membre.province }}</p>
    <p><strong>Pays: </strong>
        {% for pays in pays %}
        {% if pays.id == membre.pays_id %}
        {{pays.nom}}
        {% endif %}
        {% endfor %}
    </p>
    <p><strong>Code postal: </strong>{{ membre.code_postal }}</p>
    <p><strong>Numéro de téléphone: </strong>{{ membre.telephone }}</p>

    <a href="{{ base }}/membre/edit?id={{membre.id}}" class="bouton">Modifier mon profil</a>
    <!-- <form action="{{ base }}/membre/delete" method="post">
        <input type="hidden" name="id" value="{{ membre.id }}">
        <button type="submit" class="bouton">Supprimer mon profil</button>
    </form> -->
</div>
{{include('layouts/footer.php')}}