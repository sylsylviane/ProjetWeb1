{{include('layouts/header.php', {title: 'Portail enchères'})}}

<div class="fil-ariane">
    <a href="index.html"><small>Accueil</small></a>
    <i class="ri-arrow-right-s-line"></i>
    <a href="portail-enchere.html"><small>Portail d'enchères</small></a>
</div>
<!-- <div class="tri">
    <form>
        <div>
            <p>Affichage</p>
            <i class="ri-layout-grid-line"></i>
            <i class="ri-list-check"></i>
        </div>
        <div>
            <label aria-label="trier">
                <select>
                    <option value="">Trier par</option>
                    <option value="option1">Ordre croissant</option>
                    <option value="option2">Ordre décroissant</option>
                    <option value="option3">Prix croissant</option>
                    <option value="option3">Prix décroissant</option>
                </select>
            </label>
        </div>
        <div class="pagination">
            <a href="">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">7</a><a href="">8</a><a href="">9</a><a href="">10</a><a href="">Suivant</a>
        </div>
    </form>
</div>

<div class="flex">
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
                    name="recherche_accordeon"
                    id="rechercher"
                    class="accordeon__input">
                <label for="rechercher" class="accordeon__label accordeon__fleche accordeon__label-visible">Rechercher des archives</label>
                <div class="accordeon__contenu accordeon__contenu-visible">
                    <div>
                        <fieldset>
                            <legend>
                                Enchères
                            </legend>
                            <label for="encheres-en-cours">
                                <input
                                    type="checkbox"
                                    name="archives"
                                    id="encheres-en-cours">Enchères en cours</label>
                            <label for="encheres-futures">
                                <input
                                    type="checkbox"
                                    name="archives"
                                    id="encheres-futures">Enchères à venir</label>
                            <label for="encheres-passees">
                                <input
                                    type="checkbox"
                                    name="archives"
                                    id="encheres-passees">Enchères passées</label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div>
                <input
                    type="checkbox"
                    name="couleur_accordeon"
                    id="filtre-couleur"
                    class="accordeon__input">
                <label
                    for="filtre-couleur"
                    class="accordeon__label accordeon__fleche">Filtrer par couleur</label>
                <div class="accordeon__contenu">
                    <div>
                        <fieldset>
                            <legend>Couleurs</legend>
                            <label for="couleur1">
                                <input
                                    type="checkbox"
                                    name="couleur"
                                    id="couleur1">Rouge</label>

                            <label for="couleur2">
                                <input
                                    type="checkbox"
                                    name="couleur"
                                    id="couleur2">Bleu</label>

                            <label for="couleur3">
                                <input
                                    type="checkbox"
                                    name="couleur"
                                    id="couleur3">Mauve</label>

                            <label for="couleur4">
                                <input
                                    type="checkbox"
                                    name="couleur"
                                    id="couleur4">Vert</label>

                            <label for="couleur5">
                                <input
                                    type="checkbox"
                                    name="couelur"
                                    id="couleur5">Orange</label>

                            <label for="couleur6">
                                <input
                                    type="checkbox"
                                    name="couleur"
                                    id="couleur6">Autres</label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div>
                <input
                    type="checkbox"
                    name="pays_accordeon"
                    id="filtre-pays"
                    class="accordeon__input">
                <label
                    for="filtre-pays"
                    class="accordeon__label accordeon__fleche">Filtrer par pays</label>
                <div class="accordeon__contenu">
                    <div>
                        <fieldset>
                            <legend>Pays</legend>
                            <label for="pays1">
                                <input
                                    type="checkbox"
                                    name="pays"
                                    id="pays1">Canada</label>
                            <label for="pays2">
                                <input
                                    type="checkbox"
                                    name="pays"
                                    id="pays2">États-Unis</label>
                            <label for="pays3">
                                <input
                                    type="checkbox"
                                    name="pays"
                                    id="pays3">Mexique</label>
                            <label for="pays4">
                                <input
                                    type="checkbox"
                                    name="pays"
                                    id="pays4">Royaume-Uni</label>
                            <label for="pays5">
                                <input
                                    type="checkbox"
                                    name="pays"
                                    id="pays5">France</label>
                            <label for="pays6">
                                <input
                                    type="checkbox"
                                    name="pays"
                                    id="pays6">Autres</label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div>
                <input
                    type="checkbox"
                    name="condition_accordeon"
                    id="filtre-condition"
                    class="accordeon__input">
                <label
                    for="filtre-condition"
                    class="accordeon__label accordeon__fleche">Filtrer par condition</label>
                <div class="accordeon__contenu">
                    <div>
                        <fieldset>
                            <legend>Condition</legend>
                            <label for="condition1">
                                <input
                                    type="checkbox"
                                    name="condition"
                                    id="condition1">Parfaite</label>
                            <label for="condition2">
                                <input
                                    type="checkbox"
                                    name="condition"
                                    id="condition2">Excellente</label>
                            <label for="condition3">
                                <input
                                    type="checkbox"
                                    name="condition"
                                    id="condition3">Bonne</label>
                            <label for="condition4">
                                <input
                                    type="checkbox"
                                    name="condition"
                                    id="condition4">Moyenne</label>
                            <label for="condition5">
                                <input
                                    type="checkbox"
                                    name="condition"
                                    id="condition5">Endommagée</label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div>
                <input
                    type="checkbox"
                    name="annee-publication_accordeon"
                    id="filtre-annee-publication"
                    class="accordeon__input">
                <label
                    for="filtre-annee-publication"
                    class="accordeon__label accordeon__fleche">Filtrer par année</label>
                <div class="accordeon__contenu">
                    <div>
                        <fieldset>
                            <legend>Année</legend>
                            <label for="annee-publication1">
                                <input
                                    type="checkbox"
                                    name="annee-publication"
                                    id="annee-publication1">1900-1920</label>
                            <label for="annee-publication2">
                                <input
                                    type="checkbox"
                                    name="annee-publication"
                                    id="annee-publication2">1921-1940</label>
                            <label for="annee-publication3">
                                <input
                                    type="checkbox"
                                    name="annee-publication"
                                    id="annee-publication3">1941-1960</label>
                            <label for="annee-publication4">
                                <input
                                    type="checkbox"
                                    name="annee-publication"
                                    id="annee-publication4">1961-1980</label>
                            <label for="annee-publication5">
                                <input
                                    type="checkbox"
                                    name="annee-publication"
                                    id="annee-publication5">1981-2000</label>
                            <label for="annee-publication6">
                                <input
                                    type="checkbox"
                                    name="annee-publication"
                                    id="annee-publication6">2001-2020</label>
                            <label for="annee-publication7">
                                <input
                                    type="checkbox"
                                    name="annee-publication"
                                    id="annee-publication7">2021 à aujourd'hui</label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div>
                <input
                    type="checkbox"
                    name="prix_accordeon"
                    id="filtre-prix"
                    class="accordeon__input">
                <label
                    for="filtre-prix"
                    class="accordeon__label accordeon__fleche">Filtrer par prix</label>
                <div class="accordeon__contenu">
                    <div>
                        <fieldset>
                            <legend>Prix</legend>
                            <label for="prix1">
                                <input type="checkbox" name="archives" id="prix1">Moins de
                                100$$</label>
                            <label for="prix2">
                                <input type="checkbox" name="archives" id="prix2">Entre
                                101$ et 200$</label>
                            <label for="prix3">
                                <input type="checkbox" name="archives" id="prix3">Entre
                                201$ et 300$</label>
                            <label for="prix4">
                                <input type="checkbox" name="archives" id="prix4">Entre
                                301$ et 400$</label>
                            <label for="prix5">
                                <input type="checkbox" name="archives" id="prix5">Entre
                                401$ et 500$</label>
                            <label for="prix6">
                                <input type="checkbox" name="archives" id="prix6">Entre
                                501$ et 600$</label>
                            <label for="prix7">
                                <input type="checkbox" name="archives" id="prix7">Entre
                                601$ et 700$</label>
                            <label for="prix8">
                                <input type="checkbox" name="archives" id="prix8">Entre
                                701$ et 800$</label>
                            <label for="prix9">
                                <input type="checkbox" name="archives" id="prix9">Entre
                                801$ et 900$</label>
                            <label for="prix10">
                                <input type="checkbox" name="archives" id="prix10">Entre
                                901$ et 1000$</label>
                            <label for="prix11">
                                <input type="checkbox" name="archives" id="prix11">Plus de
                                1001$</label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <div class="grille">
        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-6.webp" alt="Image de timbre 6">
            </picture>
            <h2>Emperor Napoleon III 20c blue on greenish</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>250$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Bonne</p>
                <p><span>Certifié:</span> Oui</p>
            </div>
            <div class="conteneur-flex">
                <a href="produit.html" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-1.webp" alt="Image de timbre 1">
            </picture>
            <h2>Emperor Napoleon III 20c blue on greenish</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>55$</h4>
            </div>
            <div>
                <p>
                    <span><span>Date de début:</span></span> 31/10/2024
                </p>
                <p>
                    <span><span>Date de fin:</span></span> 5/11/2024
                </p>
            </div>
            <div>
                <p>
                    <span><span>Condition:</span></span> Excellente
                </p>
                <p>
                    <span><span>Certifié:</span></span> Oui
                </p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-2.webp" alt="Image de timbre 2">
            </picture>
            <h2>Reine Elizabeth II - 4 cents 1953</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>102$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Bonne</p>
                <p><span>Certifié:</span> Oui</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-3.webp" alt="Image de timbre 3">
            </picture>
            <h2>Timbre Marianne de l’avenir - Lettre verte</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>300$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Parfaite</p>
                <p><span>Certifié:</span> Non</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-4.webp" alt="Image de timbre 4">
            </picture>
            <h2>USA Statue de la liberté 3 cents « Violet oblitéré - 1954</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>415$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Parfaite</p>
                <p><span>Certifié:</span> Oui</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-5.webp" alt="Image de timbre 5">
            </picture>
            <h2>Timbre tricentenaire de l’académie française</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>160$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Bonne</p>
                <p><span>Certifié:</span> Oui</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-8.webp" alt="Image de timbre 8">
            </picture>
            <h2>Abraham Lincoln Timbre de 4 cents violet</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>75$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Excellente</p>
                <p><span>Certifié:</span> Oui</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-9.webp" alt="Image de timbre 9">
            </picture>
            <h2>Sabine de Gandon - France 5€</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>20$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Parfaite</p>
                <p><span>Certifié:</span> Oui</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-10.webp" alt="Image de timbre 10">
            </picture>
            <h2>Australia #25a - Roi George V (1923)</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>150$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Endommagée</p>
                <p><span>Certifié:</span> Non</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>

        <article class="carte conteneur-carte">
            <picture>
                <img src="img/timbre-11.webp" alt="Image de timbre 11">
            </picture>
            <h2>Timbre Bahamas #20 - Reine Victoria (1882) 1p</h2>
            <div>
                <h3>Offre actuelle</h3>
                <h4>205$</h4>
            </div>
            <div>
                <p><span>Date de début:</span> 31/10/2024</p>
                <p><span>Date de fin:</span> 5/11/2024</p>
            </div>
            <div>
                <p><span>Condition:</span> Moyenne</p>
                <p><span>Certifié:</span> Non</p>
            </div>
            <div class="conteneur-flex">
                <a href="" class="bouton">Enchérir</a>
                <i class="ri-heart-line"></i>
            </div>
        </article>
    </div>
</div> -->

{{include('layouts/footer.php')}}