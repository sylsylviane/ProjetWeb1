{{include('layouts/header.php', {title: 'Réinitialiser le mot de passe'})}}
<div>
    <h2>Réinitialiser le mot de passe</h2>
    <form method="post" class="formulaire">
        {% if errors is defined %}
        {% for error in errors %}
        <span>{{ error }}</span>
        {% endfor %}
        {% endif %}
        <input type="hidden" name="token" value="{{ token }}">
        <label class="champ-input">Nouveau mot de passe
            <input type="password" name="newPassword" required>
        </label>
        <input type="submit" class="bouton" value="Réinitialiser le mot de passe">
    </form>
</div>
{{include('layouts/footer.php')}}
