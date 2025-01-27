{{include('layouts/header.php', {title: 'Mot de passe oublié'})}}
<div>
    <h2>Mot de passe oublié</h2>
    <form method="post" class="formulaire">
        {% if errors is defined %}
        {% for error in errors %}
        <span>{{ error }}</span>
        {% endfor %}
        {% endif %}
        {% if message is defined %}
        <span>{{ message }}</span>
        {% endif %}
        <label class="champ-input">Adresse courriel
            <input type="email" name="email">
        </label>
        <input type="submit" class="bouton" value="Envoyer le lien de réinitialisation">
    </form>
</div>
{{include('layouts/footer.php')}}