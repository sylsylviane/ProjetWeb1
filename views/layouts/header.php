<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page web d'enchère de timbres de Lord Reginald Stampee III">
    <title>Maquette 03 - Accueil - Sylviane Paré - 2495559</title>
    <link rel="stylesheet" href="{{ asset ~ 'css/main.css' }}">
    <link rel="preload" href="https://use.typekit.net/jqs4wrb.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" as="style">
    <link rel="stylesheet" href="https://use.typekit.net/jqs4wrb.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <script type="module" src="{{ asset ~ 'js/pages/index.js' }}"></script>
    <script>
        const assetPath = "{{ asset }}";
    </script>
</head>

<body class="flex">
    <div class="top-banniere">
        {% if guest is empty %}
        <p> Bienvenue {{ session.user_name }}</p>
        <a href="{{base}}/membre/profil?id={{session.user_id}}"><i class="ri-user-3-line"></i></a>
        <a href="{{base}}/timbre">Vendre</a>
        <a href="{{base}}/timbre/show">Voir mes timbres</a>
        {% endif %}

        <form class="champ-input">
            <label class="champ-input__recherche" aria-label="recherche">
                <input type="search" placeholder="Écrivez votre recherche...">
                <i class="ri-search-line"></i>
            </label>
        </form>
        <form>
            <label aria-label="langue">
                <select>
                    <option value="option1">Fr</option>
                    <option value="option2">En</option>
                    <option value="option3">漢字</option>
                </select>
            </label>
        </form>
        <div>
            <i class="ri-moon-line"></i>
            <i class="ri-sun-line"></i>
        </div>
    </div>

    <header>
        <h1><a href="{{base}}/accueil"><img src="{{asset}}/img/logo-2-alt.png" alt="Logo Stampee" class="logo"></a></h1>
        <nav class="nav-princ">
            <input type="checkbox" id="menu-toggle" class="menu-toggle">
            <label
                for="menu-toggle"
                class="menu-bouton-conteneur"
                aria-label="menu-toggle">
                <span><i class="ri-menu-line"></i></span>
            </label>
            <ul>
                <li><a href="{{base}}/portail-encheres">Portail d'enchères</a></li>
                <li class="menu-deroulant">
                    <a href="">À propos de Lord Stampee III<i class="ri-arrow-down-s-fill"></i></a>
                    <ul>
                        <li><a href="">La philatélie, c'est la vie</a></li>
                        <li><a href="">Biographie du Lord</a></li>
                        <li><a href="">Historique familial</a></li>
                    </ul>
                </li>
                {% if guest %}
                <li class="opacite"><a href="{{base}}/membre/inscription">Devenir membre</a></li>
                <li class="opacite"><a href="{{base}}/login">Se connecter</a></li>
                {% else %}
                <li class="opacite"><a href="{{base}}/timbre">Vendre</a></li>
                <li class="opacite"><a href="{{base}}/membre/profil?id={{session.user_id}}">Mon profil</a></li>
                <li class="opacite"><a href="{{base}}/logout">Se déconnecter</a></li>
                {% endif %}

            </ul>
            {% if guest %}
            <div class="bouton bouton-or"><a href="{{base}}/membre/inscription">Devenir membre</a></div>
            <div class="bouton"><a href="{{base}}/login">Se connecter</a></div>
            {% else %}
            <div class="bouton"><a href="{{base}}/logout">Se déconnecter</a></div>
            {% endif %}
        </nav>
    </header>

    <main id="region-main">