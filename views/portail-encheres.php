{{include('layouts/header.php', {title: 'Portail enchères'})}}

<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/portail-encheres"><small>Portail d'enchères</small></a>
</div>
<div class="grille">

    {% for enchere in encheres %}
    <article class="carte conteneur-carte">
        <picture>
            {% for image in images %}
            {% if enchere.timbre_id == image.timbre_id and image.image_princ == 'oui' %}
            <img src="{{asset}}/uploads/{{image.image_url}}" alt="Image de timbre">
            {% endif %}
            {% endfor %}
        </picture>
        {% for timbre in timbres %}
        {% if timbre.id == enchere.timbre_id %}
        <h2>{{timbre.nom}}</h2>
        <div>
            <h3>Prix plancher</h3>
            <h4>{{enchere.prix_plancher}}$</h4>
        </div>
        <div>
            <p><span>Date de début:</span> {{enchere.date_debut}}</p>
            <p><span>Date de fin:</span> {{enchere.date_fin}}</p>
        </div>
        <div>
            {% for condition in conditions %}
            {% if condition.id == timbre.condition_id %}
            <p><span>Condition:</span> {{condition.nom}}</p>
            {% endif %}
            {% endfor %}
            <p><span>Certifié:</span> {{timbre.certification}}</p>

        </div>
        {% endif %}
        {% endfor %}
        <div class="conteneur-flex">
            <a href="{{base}}/enchere?id={{enchere.timbre_id}}" class="bouton">Enchérir</a>
            <i class="ri-heart-line"></i>
        </div>
    </article>
    {% endfor %}
</div>
</div>

{{include('layouts/footer.php')}}