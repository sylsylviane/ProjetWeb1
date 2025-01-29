{{include('layouts/header.php', {title: 'Timbre show'})}}
<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/timbre/show"><small>Mes timbres</small></a>
</div>
<header>
    <h1>Voyez tous vos timbres</h1>
</header>

<section>
    <header>
        <h2 class="visually-hidden">Titre de section</h2>
    </header>
    <p>{{msg}}</p>
    <div class="grille">

        {% for timbre in timbres %}
        <article class="carte conteneur-carte">
            {% for image in images %}
            {% if timbre.id == image.timbre_id %}
            <img src="{{asset}}/uploads/{{image.image_url}}" alt="">
            {% endif %}
            {% endfor %}
            <h2><strong>Nom: </strong>{{ timbre.nom }}</h2>
            <div>
                <p><strong>Pays: </strong>
                    {% for pays in pays %}
                    {% if pays.id == timbre.pays_id %}
                    {{pays.nom}}
                    {% endif %}
                    {% endfor %}
                </p>
                <p>
                    <strong>Année de création: </strong>{{ timbre.date }}
                </p>
                <p>
                    <strong>Tirage: </strong>{{ timbre.tirage }}
                </p>
                <p>
                    <strong>Dimension: </strong>{{ timbre.dimension }}
                </p>
            </div>
            <div>
                <p><strong>Description: </strong>{{ timbre.description }}</p>
            </div>
            <div>
                <p>
                    <strong>Condition: </strong>
                    {% for condition in conditions %}
                    {% if condition.id == timbre.condition_id %}
                    {{condition.nom}}
                    {% endif %}
                    {% endfor %}
                </p>
                <p>
                    <strong>Certification: </strong>{{timbre.certification}}

                </p>
                <p><strong>Couleur: </strong>
                    {% for couleur in couleurs %}
                    {% if couleur.id == timbre.couleur_id %}
                    {{couleur.nom}}
                    {% endif %}
                    {% endfor %}
                </p>
            </div>
            <div class="conteneur-flex">
                <a href="{{base}}/timbre/edit?id={{timbre.id}}" class="bouton">Modifier</a>
            </div>
            <!-- <form action="{{ base }}/timbre/delete" method="post">
                <input type="hidden" name="id" value="{{ timbre.id }}">
                <button type="submit" class="bouton bouton-or">Delete</button>
            </form> -->
        </article>
        {% endfor %}
    </div>
</section>

{{include('layouts/footer.php')}}