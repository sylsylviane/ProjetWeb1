{{include('layouts/header.php', {title: 'Accueil'})}}

<div class="fil-ariane">
    <a href="index.html"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
</div>

<div class="carrousel" data-carrousel>
    <div class="carrousel__conteneur-image-principale">
        <img
            class="image-principale fade-in"
            src="{{asset}}/img/carrousel.webp"
            alt="Image 1 du carrousel">
    </div>
    <img
        src="{{asset}}/img/fleche-droite.webp"
        alt="bouton flèché"
        class="carrousel__bouton boutonAvancer droit">
    <img
        src="{{asset}}/img/fleche-droite.webp"
        alt="bouton flèché"
        class="carrousel__bouton boutonReculer gauche">
</div>

<section>
    <header>
        <h2>Découvrez toutes nos enchères</h2>
    </header>
    <div class="flex wrap">
        <article class="carte-image-texte">
            <h6 class="visually-hidden">Article</h6>
            <picture>
                <img src="{{asset}}/img/enchere.webp" alt="Image d'enchère'">
            </picture>
            <section>
                <header>
                    <h2>Enchères en cours</h2>
                </header>
            </section>
            <div>
                <i class="ri-arrow-right-circle-fill flex"></i><small>Découvrir</small>
            </div>
        </article>

        <article class="carte-image-texte">
            <h6 class="visually-hidden">Article</h6>
            <picture>
                <img src="{{asset}}/img/calendrier.webp" alt="Image d'un calendrier">
            </picture>
            <section>
                <header>
                    <h2>Enchères à venir</h2>
                </header>
            </section>
            <div>
                <i class="ri-arrow-right-circle-fill flex"></i><small>Découvrir</small>
            </div>
        </article>

        <article class="carte-image-texte">
            <h6 class="visually-hidden">Article</h6>
            <picture>
                <img src="{{asset}}/img/contrat.webp" alt="Image d'enchère'">
            </picture>
            <section>
                <header>
                    <h2>Enchères passées</h2>
                </header>
            </section>

            <div>
                <i class="ri-arrow-right-circle-fill flex"></i><small>Découvrir</small>
            </div>
        </article>
    </div>
</section>

<section>
    <header>
        <h2>En vedette</h2>
    </header>
    <div class="grille petite">
        <article class="carte petite conteneur-carte">
            <picture>
                <img src="{{asset}}/img/timbre-10.webp" alt="Image de timbre 10">
            </picture>
            <h2>Australia #25a - Roi George V (1923)</h2>
            <div class="conteneur-flex">
                <div>
                    <h3>Offre actuelle</h3>
                    <h4>150$</h4>
                </div>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte petite conteneur-carte">
            <picture>
                <img src="{{asset}}/img/timbre-2.webp" alt="Image de timbre 2">
            </picture>
            <h2>Reine Elizabeth II - 4 cents 1953</h2>
            <div class="conteneur-flex">
                <div>
                    <h3>Offre actuelle</h3>
                    <h4>150$</h4>
                </div>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte petite conteneur-carte">
            <picture>
                <img src="{{asset}}/img/timbre-3.webp" alt="Image de timbre 3">
            </picture>
            <h2>Timbre Marianne de l’avenir - Lettre verte</h2>
            <div class="conteneur-flex">
                <div>
                    <h3>Offre actuelle</h3>
                    <h4>150$</h4>
                </div>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte petite conteneur-carte">
            <picture>
                <img src="{{asset}}/img/timbre-5.webp" alt="Image de timbre 5">
            </picture>
            <h2>Timbre tricentenaire de l’académie française</h2>
            <div class="conteneur-flex">
                <div>
                    <h3>Offre actuelle</h3>
                    <h4>150$</h4>
                </div>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte petite conteneur-carte">
            <picture>
                <img src="{{asset}}/img/timbre-4.webp" alt="Image de timbre 4">
            </picture>
            <h2>USA Statue de la liberté 3 cents « Violet oblitéré - 1954</h2>
            <div class="conteneur-flex">
                <div>
                    <h3>Offre actuelle</h3>
                    <h4>150$</h4>
                </div>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte petite conteneur-carte">
            <picture>
                <img src="{{asset}}/img/timbre-9.webp" alt="Image de timbre 9">
            </picture>
            <h2>Sabine de Gandon - France 5€</h2>
            <div class="conteneur-flex">
                <div>
                    <h3>Offre actuelle</h3>
                    <h4>20$</h4>
                </div>
                <i class="ri-heart-line"></i>
            </div>
        </article>
    </div>
</section>

<section class="appel-a-action">
    <header>
        <h2>Rejoignez-nous !</h2>
    </header>
    <h3>
        Découvrez une interface conviviale, des fonctionnalités innovantes et
        une communauté de passionnés qui partagent votre amour pour les
        timbres.
    </h3>
    <p>
        Inscrivez-vous dès maintenant pour ne pas manquer les prochaines
        enchères et plongez dans l'univers fascinant de la philatélie avec
        Lord Reginald Stampee.
    </p>
    <a href="" class="bouton bouton-or-plein">S'inscrire</a>
</section>

<div class="texte-image">
    <div>
        <img src="{{asset}}/img/lord-reginald.webp" alt="Image de Lord Reginald Stampee III">
        <section class="flex flex-colonne">
            <header>
                <h2>Lord Reginald Stampee III</h2>
            </header>
            <h3>Une passion philatélique légendaire</h3>
            <p>
                Depuis sa tendre enfance au milieu des années cinquante,
                <strong>Lord Reginald Stampee</strong>, duc de Worcessteshear,
                nourrit une passion inébranlable pour la philatélie. Ce noble
                passe-temps a été le fil conducteur de sa vie, le menant à devenir
                <strong>l'un des collectionneurs de timbres les plus respectés et
                    influents au monde.</strong>
            </p>
            <p>
                <strong>Depuis plusieurs décennies,</strong> les enchères de
                timbres organisées par Lord Stampee sont
                <strong>renommées</strong> dans tout le Royaume-Uni et au-delà.
                Ces événements prestigieux attirent les plus grands philatélistes
                du monde, désireux d'ajouter à leurs collections les
                <strong>pièces rares et uniques</strong> mises en vente. Chaque
                enchère est une célébration de l'histoire postale, de l'art et de
                la culture.
            </p>
            <a href="#" class="bouton bouton-or">En savoir plus</a>
        </section>
    </div>
</div>

<section>
    <header>
        <h2>Actualités</h2>
    </header>
    <div class="flex wrap">
        <article class="carte-image-texte">
            <h6 class="visually-hidden">Article</h6>
            <picture>
                <img src="{{asset}}/img/timbres.webp" alt="Image de timbre 6">
            </picture>
            <section>
                <header>
                    <h3>Nouvel événement le 13 décembre</h3>
                </header>
                <p>
                    Le succès des trois derniers événemnts organisés par Stampee ont
                    marqués le marché des enchères de timbres durant la dernière
                    année, confirmant l'intérêt de la clientèle internationale.
                </p>
            </section>
            <div>
                <i class="ri-arrow-right-circle-fill flex"></i><small>En lire plus</small>
            </div>
        </article>

        <article class="carte-image-texte">
            <h6 class="visually-hidden">Article</h6>
            <picture>
                <img src="{{asset}}/img/actualite-2.webp" alt="Image d'un homme lisant le journal">
            </picture>
            <section>
                <header>
                    <h3>La presse parle de Stampee</h3>
                </header>
                <p>
                    Découvrez tous les événements et nouveautés de l'année chez
                    Stampee racontés par la presse.
                </p>
            </section>
            <div>
                <i class="ri-arrow-right-circle-fill flex"></i><small>En lire plus</small>
            </div>
        </article>

        <article class="carte-image-texte">
            <h6 class="visually-hidden">Article</h6>
            <picture>
                <img src="{{asset}}/img/timbres-2.webp" alt="Image de timbre 3">
            </picture>
            <section>
                <header>
                    <h3>Étude sur le marché de la collection</h3>
                </header>
                <p>
                    Entre nostalgie et durabilité, les Français redéfinissent l’art
                    de collectionner les timbres.
                </p>
            </section>

            <div>
                <i class="ri-arrow-right-circle-fill flex"></i><small>En lire plus</small>
            </div>
        </article>

        <article class="carte-image-texte">
            <h6 class="visually-hidden">Article</h6>
            <picture>
                <img src="{{asset}}/img/architecte.webp" alt="Image de Oğuz Orbey">
            </picture>
            <section>
                <header>
                    <h3>La Collection de Madame Orbey</h3>
                </header>
                <p>
                    Stampee est heureux de présenter une collection remarquable
                    assemblée par l'architecte turc Oğuz Orbey, qui a vécu à Paris,
                    notamment dans le quartier de Montparnasse, durant les années
                    1970 et 1980.
                </p>
            </section>
            <div>
                <i class="ri-arrow-right-circle-fill flex"></i><small>En lire plus</small>
            </div>
        </article>
    </div>
</section>

<section class="appel-a-action">
    <header>
        <h2>Découvrez les trésors philatéliques !</h2>
    </header>
    <h3>
        Ne manquez plus jamais une enchère exclusive, des offres spéciales et
        les dernières nouvelles du monde des timbres.
    </h3>
    <p>
        Abonnez-vous dès maintenant à l'infolettre Stampee et restez informé
        de toutes les nouveautés.
    </p>
    <a href="" class="bouton bouton-or-plein">S'abonner</a>
</section>

{{include('layouts/footer.php')}}