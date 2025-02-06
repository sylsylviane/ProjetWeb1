{{include('layouts/header.php', {title: 'Portail enchères'})}}

<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/portail-encheres"><small>Portail d'enchères</small></a>
</div>

<div class="flex">
    <form method="get">
        <aside class="accordeon">
            <input
                type="checkbox"
                id="accordeon-toggle"
                class="accordeon__input accordeon__toggle">
            <label
                for="accordeon-toggle"
                class="accordeon__label accordeon__fleche accordeon__label-toggle">
                <span>Filtres</span>
            </label>

            <div>
                <div>
                    <input
                        type="checkbox"
                        name=""
                        id="filtre-couleur"
                        class="accordeon__input">
                    <label
                        for="filtre-couleur"
                        class="accordeon__label accordeon__fleche">Filtrer par couleur</label>
                    <div class="accordeon__contenu">
                        <div>
                            <fieldset>
                                <legend>Couleurs</legend>
                                {% for couleur in couleurs %}
                                <label for="{{couleur.nom}}">

                                    <input
                                        type="checkbox"
                                        name="couleur_id[]"
                                        id="{{couleur.nom}}"
                                        value="{{couleur.id}}">{{couleur.nom}}
                                </label>
                                {% endfor %}
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div>
                    <input
                        type="checkbox"
                        name=""
                        id="filtre-pays"
                        class="accordeon__input">
                    <label
                        for="filtre-pays"
                        class="accordeon__label accordeon__fleche">Filtrer par pays</label>
                    <div class="accordeon__contenu">
                        <div>
                            <fieldset>
                                <legend>Pays</legend>
                                {% for pays in pays %}
                                <label for="{{pays.nom}}">
                                    <input
                                        type="checkbox"
                                        name="pays_id[]"
                                        id="{{pays.nom}}"
                                        value="{{pays.id}}">{{pays.nom}}
                                </label>
                                {% endfor %}
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div>
                    <input
                        type="checkbox"
                        name=""
                        id="filtre-condition"
                        class="accordeon__input">
                    <label
                        for="filtre-condition"
                        class="accordeon__label accordeon__fleche">Filtrer par condition</label>
                    <div class="accordeon__contenu">
                        <div>
                            <fieldset>
                                <legend>Condition</legend>
                                {% for condition in conditions %}
                                <label for="{{condition.nom}}">
                                    <input
                                        type="checkbox"
                                        name="condition_id[]"
                                        id="{{condition.nom}}"
                                        value="{{condition.id}}">{{condition.nom}}
                                </label>
                                {% endfor %}
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="conteneur-flex">
            <input type="submit" value="Filtrer" class="bouton bouton-or-plein">
            <a href="{{base}}/portail-encheres" class="bouton bouton-or">Effacer</a>
        </div>
    </form>
    <div class="grille">
        {{message}}
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
                <h3>Offre actuelle</h3>
                {% for mise in mises %}
                {% if mise.offre_actuelle == 'oui' and mise.enchere_id == enchere.id %}
                <h4>{{mise.montant}}$</h4>
                {% endif %}
                {% endfor %}
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
                <a href="{{base}}/enchere?id={{enchere.id}}" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>
        {% endfor %}
    </div>
</div>

{{include('layouts/footer.php')}}