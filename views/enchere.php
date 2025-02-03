{{include('layouts/header.php', {title: 'Enchere'})}}
{% for enchere in encheres %}
<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/portail-encheres"><small>Portail d'enchères</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/enchere"><small>Enchère {{enchere.titre}}</small></a>
</div>
<!-- Fiche produit -->

<div class="carte-detaillee">
    <div class="miniature">
        <figure>
            {% for image in images %}
            {% if enchere.timbre_id == image.timbre_id and (image.image_princ == 'non' or image.image_princ == 'oui')%}
            <img src="{{asset}}/uploads/{{image.image_url}}" alt="Image de timbre 1">
            {% endif %}
            {% endfor %}
        </figure>
    </div>
    <div id="first" class="img-container">
        {% for image in images %}
        {% if enchere.timbre_id == image.timbre_id and image.image_princ == 'oui' %}
        <img id="img" src="{{asset}}/uploads/{{image.image_url}}" alt="Zoom Image" style="width: 100%; height: 100%;">
        <span id="lens"></span>
        {% endif %}
        {% endfor %}
    </div>
    <div id="second" class="img-container"></div>


    <!-- Détails -->
    {% for timbre in timbres %}
    {% if timbre.id == enchere.timbre_id %}
    <article class="conteneur-carte carte-detaillee_texte">
        <header>
            <h2>{{timbre.nom}}</h2>
        </header>
        <div>
            <div>
                <p><span>Date de création: </span> {{timbre.date}}</p>
                <p><span>Description: </span> {{timbre.description}}</p>
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

                {% for enchere in encheres %}
                {% if timbre.id == enchere.timbre_id %}

                <p><span>Date de début: </span> {{enchere.date_debut}}</p>
                <p><span>Date de fin: </span> {{enchere.date_fin}}</p>
                <p><span>Prix plancher: </span> {{enchere.prix_plancher}}</p>
                <!-- <p><span>Quantité de mises:</span> 12</p> -->


            </div>
        </div>
        <!-- Bas de la carte détaillée -->
        <section class="carte-detaillee_texte_info_supp">
            <h2>
                {% if enchere.coup_de_coeur == 'Oui' %}
                <i class="ri-star-fill"><small> Coup de coeur du Lord</small></i>
                {% endif %}
            </h2>
            {% endif %}
            {% endfor %}
            <i class="ri-check-line"><small> Nous vérifions la qualité de tous nos timbres</small></i>
            <i class="ri-check-line"><small>
                    En affaires depuis trois générations. Votre mise est entre bonne
                    main.</small></i>
        </section>
    </article>
    {% endif %}
    {% endfor %}
    <article class="conteneur-carte carte-detaillee_texte module">
        <header>
            <h2>Faire une mise</h2>
        </header>

        <div>
            <header>
                <h2>Offre actuelle</h2>
            </header>
            {% for mise in mises %}
            {% if mise.offre_actuelle == 'oui' and mise.enchere_id == enchere.id %}
            <h3>{{mise.montant}}$</h3>
            {% endif %}
            {% endfor %}
            <!-- <i class="ri-time-line"><small>Il reste 6h</small></i> -->
        </div>

        <div>
            <form method="post">
                <label>Placer une mise
                    <input type="number" placeholder="{{enchere.prix_plancher}}$" required min="{{timbre.prix_plancher}}" name="montant">
                </label>

                <button type="submit" class="bouton bouton-or-plein">Enchérir</button>
            </form>
            {{msg}}
        </div>

        <!-- Bas de la carte détaillée -->
        <div class="carte-detaillee_texte_info_supp">
            <img src="{{asset}}/img/paiement.webp" alt="Icone de paiement">
            <div>
                <i class="ri-truck-line">
                    <small>Livraison gratuite, arrive d'ici mar. 3 déc.</small></i>
                <i class="ri-verified-badge-line"><small>Vendu et expédié par Stampee</small></i>
                <i class="ri-arrow-go-back-fill"><small>Retours gratuits sous 14 jours <a href="">Détails</a></small></i>
            </div>
        </div>
    </article>
</div>
{% endfor %}
{{include('layouts/footer.php')}}