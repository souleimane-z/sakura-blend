<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sakura Blend - サクラ ブレンド - Restaurant Japonais</title>

    <meta name="description" content="Sakura Blend - Restaurant japonais authentique à Lille. Découvrez notre cuisine raffinée dans une ambiance zen et élégante.">
    <meta name="keywords" content="restaurant japonais, cuisine japonaise, sushi, ramen, Lille, Sakura Blend">
    <meta name="author" content="Sakura Blend">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Sakura Blend - Restaurant Japonais Authentique">
    <meta property="og:description" content="Découvrez une expérience culinaire japonaise unique à Lille">
    <meta property="og:image" content="/assets/images/og-image.png">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Sakura Blend - Restaurant Japonais">
    <meta property="twitter:description" content="Découvrez une expérience culinaire japonaise unique à Lille">
    <meta property="twitter:image" content="/assets/images/og-image.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicons/favicon.ico">
    <link rel="manifest" href="/assets/images/favicons/site.webmanifest">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicons/favicon.ico">
    <meta name="theme-color" content="#013984">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="./assets/js/main.js" defer></script>
</head>
<body>
<?php
function getActivePage() {
    $currentFile = $_SERVER['PHP_SELF'];
    return basename($currentFile, '.php');
}

function getMenuItems() {
    $activePage = getActivePage();

    return [
        'index' => [
            'title' => '<i class="fa-solid fa-house"></i>',
            'url' => './'
        ],
        'menu' => [
            'title' => 'Notre Carte',
            'url' => './menu.php'
        ],
        'reservation' => [
            'title' => 'Réserver une table',
            'url' => './reservation.php'
        ],
        'contact' => [
            'title' => '<i class="fa-solid fa-envelope"></i>',
            'url' => './contact.php'
        ]
    ];
}
?>

<nav class="main-nav">
    <div class="nav-brand">
        <a href="/">
            <span class="logo-text">Sakura Blend</span>
            <span class="logo-jp">サクラ ブレンド</span>
        </a>
    </div>
    <ul class="nav-links">
        <?php
        $menuItems = getMenuItems();
        $currentPage = getActivePage();

        foreach($menuItems as $page => $item):
            $isActive = ($currentPage === $page);
            ?>
            <li class="<?php echo $isActive ? 'active' : ''; ?>">
                <a href="<?php echo $item['url']; ?>">
                    <?php echo $item['title']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <button class="mobile-menu-btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>
<main>