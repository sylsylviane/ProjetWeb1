</main>
<div class="nav-sec">
    <a href="index.html"><img src="{{asset}}/img/logo-2-alt.png" alt="Logo Stampee" class="logo"></a>
    <section>
        <header>
            <h4>Fonctionnement de la plateforme</h4>
        </header>
        {% if guest is empty %}
        <a href="{{base}}/membre/profil?id={{session.user_id}}">Profil</a>
        {% endif %}
        <a href="">Comment placer une offre</a>
        <a href="">Suivre une enchère</a>
        <a href="">Trouver l'enchère désirée</a>
        <a href="">Contacter le webmestre</a>
    </section>

    <section>
        <header>
            <h4>Actualités</h4>
        </header>
        <a href="">Timbres</a>
        <a href="">Enchères</a>
        <a href="">Brigde</a>
    </section>

    <section>
        <header>
            <h4>Contactez-nous</h4>
        </header>
        <a href="">Angleterre</a>
        <a href="">Canada</a>
        <a href="">US</a>
        <a href="">Australie</a>
    </section>

    <div>
        <div>
            {% if guest %}
            <div class="bouton bouton-or"><a href="{{base}}/membre/inscription">Devenir membre</a></div>
            <div class="bouton"><a href="{{base}}/login">Se connecter</a></div>
            {% else %}
            <div class="bouton"><a href="{{base}}/logout">Se déconnecter</a></div>
            {% endif %}
        </div>
        <form class="champ-input">
            <label>S'inscrire à l'infolettre
                <input type="email" placeholder="exemple@hotmail.com">
            </label>
        </form>
    </div>

    <div>
        <div>
            <form>
                <label aria-label="langue">
                    <select>
                        <option value="option1">Fr</option>
                        <option value="option2">En</option>
                        <option value="option3">漢字</option>
                    </select>
                </label>
            </form>
            <i class="ri-moon-line"></i>
            <i class="ri-sun-line"></i>
        </div>
    </div>
</div>

<footer class="pied-de-site">
    <a href="">Termes et conditions</a>
    <a href="">Politique et confidentialité</a>
    <p>&copy; Tous droits réservés - Stampee</p>
</footer>
</body>

</html>