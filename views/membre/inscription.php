{{include('layouts/header.php', {title: 'Inscription'})}}
<div>
    <h2>Inscription</h2>
    <form method="post" class="formulaire">

        <label class="champ-input">Nom d'utilisateur*
            <input type="email" name="nom_utilisateur" value="{{ inputs.nom_utilisateur }}">
        </label>
        {% if errors.nom_utilisateur is defined %}
        <span class="error">{{ errors.nom_utilisateur }}</span>
        {% endif %}

        <label class="champ-input">Mot de passe*
            <input type="password" name="mdp">
        </label>
        {% if errors.mot_de_passe is defined %}
        <span class="error">{{ errors.mot_de_passe }}</span>
        {% endif %}

        <label class="champ-input">Prénom*
            <input type="text" name="prenom" value="{{ inputs.prenom }}">
        </label>
        {% if errors.prenom is defined %}
        <span class="error">{{ errors.prenom }}</span>
        {% endif %}

        <label class="champ-input">Nom de famille*
            <input type="text" name="nom_famille" value="{{ inputs.nom }}">
        </label>
        {% if errors.nom is defined %}
        <span class="error">{{ errors.nom }}</span>
        {% endif %}

        <label class="champ-input">Adresse
            <input type="text" name="adresse" value="{{ inputs.adresse }}">
        </label>
        {% if errors.adresse is defined %}
        <span class="error">{{ errors.adresse }}</span>
        {% endif %}

        <label class="champ-input">Ville
            <input type="text" name="ville" value="{{ inputs.ville }}">
        </label>
        {% if errors.ville is defined %}
        <span class="error">{{ errors.ville }}</span>
        {% endif %}

        <label class="champ-input">Province ou état
            <input type="text" name="province" value="{{ inputs.province }}">
        </label>
        {% if errors.province is defined %}
        <span class="error">{{ errors.province }}</span>
        {% endif %}

        <label>Pays
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

        <label class="champ-input">Code postal
            <input type="text" name="code_postal" value="{{ inputs.code_postal }}">
        </label>
        {% if errors.code_postal is defined %}
        <span class="error">{{ errors.code_postal }}</span>
        {% endif %}

        <label class="champ-input">Numéro de téléphone
            <input type="text" name="telephone" value="{{ inputs.telephone }}">
        </label>
        {% if errors.telephone is defined %}
        <span class="error">{{ errors.telephone }}</span>
        {% endif %}

        <input type="submit" class="bouton" value="S'inscrire">
    </form>
</div>
{{include('layouts/footer.php')}}