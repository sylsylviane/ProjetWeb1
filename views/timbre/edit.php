{{include('layouts/header.php', {title: 'Modifier timbre'})}}

<div class="fil-ariane">
    <a href="{{base}}/accueil"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href=""><small>Modifier mon profil</small></a>
</div>
<div>
    <h2>Modifier mon timbre</h2>
    <form method="post" class="formulaire">

        <label class="champ-input">Nom du timbre
            <input type="text" name="nom" value="{{ inputs.nom }}">
        </label>
        {% if errors.nom is defined %}
        <span class="error">{{ errors.nom }}</span>
        {% endif %}

        <label class="champ-input">Année de création
            <input type="text" name="date" value="{{ inputs.date }}">
        </label>
        {% if errors.date is defined %}
        <span class="error">{{ errors.date }}</span>
        {% endif %}

        <label class="champ-input">Tirage
            <input type="text" name="tirage" value="{{ inputs.tirage }}">
        </label>
        {% if errors.tirage is defined %}
        <span class="error">{{ errors.tirage }}</span>
        {% endif %}

        <label class="champ-input">Dimension
            <input type="text" name="dimension" value="{{ inputs.dimension }}">
        </label>
        {% if errors.dimension is defined %}
        <span class="error">{{ errors.dimension }}</span>
        {% endif %}

        <label class="champ-input">Certification
            <input type="text" name="certification" value="{{ inputs.certification }}">
        </label>
        {% if errors.certification is defined %}
        <span class="error">{{ errors.certification }}</span>
        {% endif %}

        <label class="champ-input">Description
            <textarea name="description" placeholder="Écrire une description...">{{ inputs.description }}</textarea>
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
                <option value="">Selectionner</option>
                {% for pays in pays %}
                <option value="{{pays.id}}" {% if(pays.id == inputs.pays_id) %} selected {%endif%}>{{ pays.nom}}</option>
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

        <input type="submit" class="bouton" value="Sauvegarder">
    </form>


</div>
{{include('layouts/footer.php')}}