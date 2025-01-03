# Sakura Blend

Site web codé en PHP, JS et HTML/CSS d'un restaurant Japonais Traditionnel.

Dans la page d'accueil, nous retrouvons la présentation du restaurant avec ses plats phares ainsi qu'un carrousel de témoignages.

Grâce à la barre de navigation, on peut se diriger vers la page de la carte avec un affichage dynamique du menu et ses différentes sections (entrées, plats, desserts...).
Les données des formulaires de contact et de réservation sont envoyées vers des fichiers CSV. Ces données sont ensuite récupérées grâce à PHP pour être affichées dans la session administrateur.
Celui-ci aura la possibilité de vérifier les nouvelles réservations et d'accéder aux informations de contact. L'administrateur/administratrice pourra aussi archiver les messages et réservations pour une vue plus claire.

Pour accéder à la partie administrateur, il faut cliquer sur l'icône de cadenas située tout en bas de la page. Vous serez redirigé vers un formulaire de connexion (identifiants disponibles dans *includes/admin-config*). Une fois connecté, vous aurez accès aux fonctionnalités.

![logo du restaurant](https://res.cloudinary.com/dhqh98spd/image/upload/v1735055320/green-cropped_rprufm_c_pad_w_200_h_200_ydgw1r.png)


## Fonctionnalités :

- Formulaire de contact
- Formulaire pour réserver une table
- Envoi des formulaires dans un fichier CSV
- Interface administrateur pour afficher et archiver les réservations et messages


## Demo
Site déployé via InfinityFree : 

[Live-Demo du site](http://souleimane-z.wuaze.com/)

## Tech Stack

**Client :** HTML, CSS, JS

**Server :** PHP


## Usage/Examples

#### Les fichiers CSS sont séparés par page ou fonctionnalité pour une lecture plus claire du code. Ils sont tous importés dans le style.css

```css
@import "variables.css"; // les couleurs
@import "reset.css"; // règles générales
@import "typography.css"; // importation des polices
@import "navigation.css";
@import "footer.css";
@import "layout.css";
@import "header.css";
@import "menu.css";
```

#### Les headers et nav sont importés via des includes

```php
include_once __DIR__ . '/includes/header.php';
```

#### Les métadonnées [title, descriptions...] sont gérées via des fonctions
'*includes/header.php*'

```php
function getPageMetas($current_page) {
    return [
        'index.php' => [
            'title' => 'Accueil - Sakura Blend - サクラ ブレンド - Restaurant Japonais',
            'description' => 'Sakura Blend - Restaurant japonais authentique à Lille. Découvrez notre cuisine raffinée et halal dans une ambiance zen et élégante.',
            'keywords' => 'restaurant japonais, cuisine japonaise, halal, ramen, Lille, Sakura Blend'
        ],
        ....
}

    <title><?php echo $currentMeta['title']; ?></title>
```
## Auteur

Retrouvez toutes mes réalisations sur [mon portfolio](https://www.souleimane-z.com)
