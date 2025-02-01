{{include('layouts/header.php', {title: 'Créer un timbre'})}}

<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="{{base}}/timbre/create"><small>Vendre</small></a>
</div>

<header>
    <h1>Ajouter un timbre</h1>
</header>
<p>{{ msg }}</p>
<section>
    <form method="post" class="formulaire">
        <input type="hidden" name="id" value="{{ timbre.id }}">

        <label class="champ-input">Nom du timbre
            <input type="text" name="nom" value="{{ inputs.nom }}">
        </label>
        {% if errors.nom is defined %}
        <span class="error">{{ errors.nom }}</span>
        {% endif %}

        <label class="champ-input">Année de création
            <input type="text" name="date">
        </label>
        {% if errors.date is defined %}
        <span class="error">{{ errors.date }}</span>
        {% endif %}

        <label class="champ-input">Tirage
            <input type="number" name="tirage">
        </label>
        {% if errors.tirage is defined %}
        <span class="error">{{ errors.tirage }}</span>
        {% endif %}

        <label class="champ-input">Dimension
            <input type="text" name="dimension">
        </label>
        {% if errors.dimension is defined %}
        <span class="error">{{ errors.dimension }}</span>
        {% endif %}

        <label class="champ-input">Certification
            <select name="certification" id="">
                <option value="">Select</option>
                <option value="Oui">Oui</option>
                <option value="Non">Non</option>
            </select>
        </label>
        {% if errors.certification is defined %}
        <span class="error">{{ errors.certification }}</span>
        {% endif %}

        <label class="champ-input">Description
            <textarea name="description" placeholder="Écrire une description..."></textarea>
        </label>
        {% if errors.description is defined %}
        <span class="error">{{ errors.description }}</span>
        {% endif %}

        <label class="champ-input">Couleur
            <select name="couleur_id">
                <option value="">Select</option>
                {% for couleur in couleurs %}
                <option value="{{couleur.id}}" {% if(couleur.id == inputs.couleur_id) %} selected {%endif%}>{{ couleur.nom }}</option>
                {% endfor %}
            </select>
        </label>
        {% if errors.couleur_id is defined %}
        <span class="error">{{ errors.couleur_id }}</span>
        {% endif %}


        <label class="champ-input">Pays
            <select name="pays_id">
                <option value="">Select</option>
                {% for pays in pays %}
                <option value="{{pays.id}}" {% if(pays.id == inputs.pays_id) %} selected {%endif%}>{{ pays.nom }}</option>
                {% endfor %}
            </select>
        </label>
        {% if errors.pays_id is defined %}
        <span class="error">{{ errors.pays_id }}</span>
        {% endif %}

        <label class="champ-input">Condition
            <select name="condition_id">
                <option value="">Select</option>
                {% for condition in conditions %}
                <option value="{{condition.id}}" {% if(condition.id == inputs.condition_id) %} selected {%endif%}>{{ condition.nom }}</option>
                {% endfor %}
            </select>
        </label>
        {% if errors.condition_id is defined %}
        <span class="error">{{ errors.condition_id }}</span>
        {% endif %}

        <!-- <label>Télécharger une image
            <input type="file" name="fileToUpload" id="fileToUpload">
        </label>

        <input type="submit" value="Upload Image" name="submit" class="bouton bouton-or"> -->
        <input type="submit" class="bouton" value="Suivant">

    </form>
</section>


{{include('layouts/footer.php')}}