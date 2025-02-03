
{{include('layouts/header.php', {title:'Mise acceptee'})}}
<div class="conteneur-carte carte-detaillee_texte"">
    <header>
        <h2>Important</h2>
    </header>
    <div>
        <div>
            <p>{{msg}}</p>

        </div>
    </div>
    <div class="conteneur-flex">
        <a href="{{base}}/portail-encheres" class="bouton">Portail d'enchères</a>
        <a href="{{base}}/enchere?id={{id}}" class="bouton bouton-or-plein">Retour</a>
    </div>

</div>
{{include('layouts/footer.php')}}