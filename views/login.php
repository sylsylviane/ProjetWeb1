{{include('layouts/header.php', {title: 'Connexion'})}}
<div>
    <h2>Connexion</h2>
    <form method="post" class="formulaire">

        {% if errors is defined %}

        {% for error in errors %}
        <span>{{ error }}</span>
        {% endfor %}

        {% endif %}
        <label class="champ-input">Nom d'utilisateur
            <input type="email" name="nom_utilisateur" value="{{ inputs.nom_utilisateur }}">
        </label>

        <label class="champ-input">Mot de passe
            <input type="password" name="mdp">
        </label>


        <a href="{{base}}/resetpwd/forgot-password">Mot de passe oublié ?</a>
        <input type="submit" class="bouton" value="Accéder à mon profil">
    </form>
</div>
{{include('layouts/footer.php')}}

<!-- https://www.youtube.com/watch?v=NlAy5K-txQs&list=PLi_8oNFfVFrzROlhqbUdI0uCugO55RMkz&index=31 -->