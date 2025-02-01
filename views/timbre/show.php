{{include('layouts/header.php', {title: 'Timbre show'})}}
<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/timbre/show"><small>Mes timbres</small></a>
</div>
<!-- <header>
    <h1>Voyez tous vos timbres</h1>
</header> -->
{% for timbre in timbres %}
<div class="carte-detaillee">
    <!-- Images -->
    <div>
        <div>
            <figure>
                {% for image in images %}
                {% if timbre.id == image.timbre_id and image.image_princ == 'non' %}
                <img src="{{asset}}/uploads/{{image.image_url}}" alt="Image de timbre">
                {% endif %}
                {% endfor %}
            </figure>
        </div>
        <figure>
            <!-- <i class="ri-zoom-in-line"></i> -->
            {% for image in images %}
            {% if timbre.id == image.timbre_id and image.image_princ == 'oui' %}
            <img src="{{asset}}/uploads/{{image.image_url}}" alt="Image de timbre" width="300">
            {% endif %}
            {% endfor %}
        </figure>
    </div>

    <article class="conteneur-carte carte-detaillee_texte">
        <header>
            <h2>{{timbre.nom}}</h2>
        </header>
        <div>
            <div>
                <p><span>Date de création: </span> {{timbre.date}}</p>
                <p><span>Certifié: </span> {{timbre.certification}}</p>
                {% for couleur in couleurs %}
                {% if couleur.id == timbre.couleur_id %}
                <p><span>Couleur: </span> {{couleur.nom}}</p>
                {% endif %}
                {% endfor %}
                {% for pays in pays %}
                {% if pays.id == timbre.pays_id %}
                <p><span>Pays d'origine: </span> {{pays.nom}}</p>
                {% endif %}
                {% endfor %}
                {% for condition in conditions %}
                {% if condition.id == timbre.condition_id %}
                <p><span>Condition: </span> {{condition.nom}}</p>
                {% endif %}
                {% endfor %}
                <p><span>Tirage: </span>{{timbre.tirage}}</p>
                <p><span>Dimension: </span> {{timbre.dimension}}</p>
            </div>
        </div>
        <div class="conteneur-flex">
            <a href="{{base}}/timbre/edit?id={{timbre.id}}" class="bouton">Modifier</a>
            <form action="{{ base }}/timbre/delete?id={{timbre.id}}" method="post">
                <input type="hidden" name="id" value="{{ timbre.id }}">
                <button type="submit" class="bouton">Supprimer</button>
            </form>
        </div>
    </article>
</div>
{% endfor %}

{{include('layouts/footer.php')}}