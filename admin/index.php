<?php
session_start();

if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

function getMessages($archived = false) {
    $filename = $archived ? "../admin/data/messages_archives.csv" : "../admin/data/messages.csv";
    $messages = [];
    if(($handle = fopen($filename, "r")) !== FALSE) {
        while(($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $messages[] = [
                'date' => $data[0],
                'nom' => $data[1],
                'email' => $data[2],
                'sujet' => $data[3],
                'message' => $data[4],
                'date_archivage' => isset($data[5]) ? $data[5] : null
            ];
        }
        fclose($handle);
    }
    return array_reverse($messages);
}

function getReservations($validated = false) {
    $filename = $validated ? "../admin/data/reservations_validees.csv" : "../admin/data/reservations.csv";
    $reservations = [];
    if(($handle = fopen($filename, "r")) !== FALSE) {
        while(($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $reservations[] = [
                'date_creation' => $data[0],
                'nom' => $data[1],
                'email' => $data[2],
                'telephone' => $data[3],
                'date_reservation' => $data[4],
                'heure' => $data[5],
                'personnes' => $data[6],
                'date_validation' => isset($data[7]) ? $data[7] : null
            ];
        }
        fclose($handle);
    }
    return array_reverse($reservations);
}

function archiveMessage($message) {
    $file = fopen("../admin/data/messages_archives.csv", "a");
    fputcsv($file, [
        $message['date'],
        $message['nom'],
        $message['email'],
        $message['sujet'],
        $message['message'],
        date('Y-m-d H:i:s')
    ], ';');
    fclose($file);

    $messages = getMessages();
    $messages = array_filter($messages, function($m) use ($message) {
        return !($m['date'] === $message['date'] &&
            $m['email'] === $message['email'] &&
            $m['message'] === $message['message']);
    });

    $file = fopen("../admin/data/messages.csv", "w");
    foreach($messages as $m) {
        fputcsv($file, [$m['date'], $m['nom'], $m['email'], $m['sujet'], $m['message']], ';');
    }
    fclose($file);
}

function validerReservation($reservation) {
    $file = fopen("../admin/data/reservations_validees.csv", "a");
    fputcsv($file, [
        $reservation['date_creation'],
        $reservation['nom'],
        $reservation['email'],
        $reservation['telephone'],
        $reservation['date_reservation'],
        $reservation['heure'],
        $reservation['personnes'],
        date('Y-m-d H:i:s')
    ], ';');
    fclose($file);

    $reservations = getReservations();
    $reservations = array_filter($reservations, function($r) use ($reservation) {
        return !($r['date_creation'] === $reservation['date_creation'] &&
            $r['email'] === $reservation['email']);
    });

    $file = fopen("../admin/data/reservations.csv", "w");
    foreach($reservations as $r) {
        fputcsv($file, [
            $r['date_creation'],
            $r['nom'],
            $r['email'],
            $r['telephone'],
            $r['date_reservation'],
            $r['heure'],
            $r['personnes']
        ], ';');
    }
    fclose($file);
}

if(isset($_POST['archive_message'])) {
    archiveMessage(json_decode($_POST['message_data'], true));
    header('Location: index.php?page=messages&message_type=' .
        (isset($_GET['message_type']) ? $_GET['message_type'] : 'nouveaux'));
    exit;
}

if(isset($_POST['valider_reservation'])) {
    validerReservation(json_decode($_POST['reservation_data'], true));
    header('Location: index.php?page=reservations&reservation_type=' .
        (isset($_GET['reservation_type']) ? $_GET['reservation_type'] : 'en_attente'));
    exit;
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 'messages';
$messageType = isset($_GET['message_type']) ? $_GET['message_type'] : 'nouveaux';
$reservationType = isset($_GET['reservation_type']) ? $_GET['reservation_type'] : 'en_attente';

$messages = getMessages($messageType === 'archives');
$reservations = getReservations($reservationType === 'validees');

$selectedDate = isset($_GET['date']) ? $_GET['date'] : '';
$displayedReservations = $selectedDate ?
    array_filter($reservations, function($reservation) use ($selectedDate) {
        return $reservation['date_reservation'] === $selectedDate;
    }) :
    $reservations;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="https://res.cloudinary.com/dhqh98spd/image/upload/v1734951822/apple-touch-icon_ltss3m.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://res.cloudinary.com/dhqh98spd/image/upload/v1734951822/favicon-32x32_sljde7.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://res.cloudinary.com/dhqh98spd/image/upload/v1734951822/favicon-16x16_tid9pb.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://res.cloudinary.com/dhqh98spd/image/upload/v1734951821/favicon_otfclr.ico">
    <link rel="manifest" href="/assets/site.webmanifest">
    <meta name="theme-color" content="#013984">

    <title>Administration - Sakura Blend</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="admin-body">
<nav class="admin-nav">
    <button class="admin-sidebar-toggle" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="admin-logo">
        <span>Sakura Blend</span>
        <span class="japanese-text">サクラ ブレンド</span>
    </div>

    <div class="admin-logo-image">
        <img src="https://res.cloudinary.com/dhqh98spd/image/upload/v1734952043/admin-svgrepo-com_y2u0s1.svg" alt="Admin Logo">
    </div>

    <div class="admin-nav-right">
        <a href="../index.php" class="nav-link" title="Voir le site">
            <i class="fa-solid fa-eye"></i>
        </a>
        <a href="logout.php" class="nav-link" title="Déconnexion">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>
</nav>

<div class="admin-container">
    <div class="admin-sidebar">
        <div class="sidebar-header">
            <span class="admin-title">Dashboard</span>
        </div>
        <ul class="sidebar-menu">
            <li class="<?php echo $currentPage === 'messages' ? 'active' : ''; ?>">
                <a href="?page=messages">
                    <i class="fa-solid fa-envelope"></i>
                    Messages
                    <?php if($messageType === 'nouveaux' && count($messages) > 0): ?>
                        <span class="badge"><?php echo count($messages); ?></span>
                    <?php endif; ?>
                </a>
                <?php if($currentPage === 'messages'): ?>
                    <ul class="submenu">
                        <li class="<?php echo $messageType === 'nouveaux' ? 'active' : ''; ?>">
                            <a href="?page=messages&message_type=nouveaux">Nouveaux</a>
                        </li>
                        <li class="<?php echo $messageType === 'archives' ? 'active' : ''; ?>">
                            <a href="?page=messages&message_type=archives">Archives</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </li>
            <li class="<?php echo $currentPage === 'reservations' ? 'active' : ''; ?>">
                <a href="?page=reservations">
                    <i class="fa-solid fa-calendar-check"></i>
                    Réservations
                    <?php if($reservationType === 'en_attente' && count($reservations) > 0): ?>
                        <span class="badge"><?php echo count($reservations); ?></span>
                    <?php endif; ?>
                </a>
                <?php if($currentPage === 'reservations'): ?>
                    <ul class="submenu">
                        <li class="<?php echo $reservationType === 'en_attente' ? 'active' : ''; ?>">
                            <a href="?page=reservations&reservation_type=en_attente">En attente</a>
                        </li>
                        <li class="<?php echo $reservationType === 'validees' ? 'active' : ''; ?>">
                            <a href="?page=reservations&reservation_type=validees">Validées</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </li>
        </ul>
    </div>

    <main class="admin-main">
        <?php if($currentPage === 'messages'): ?>
            <div class="admin-header">
                <h1><?php echo $messageType === 'archives' ? 'Messages archivés' : 'Nouveaux messages'; ?></h1>
            </div>

            <div class="messages-grid">
                <?php if(empty($messages)): ?>
                    <div class="empty-state">
                        <i class="fa-solid fa-inbox"></i>
                        <p>Aucun message <?php echo $messageType === 'archives' ? 'archivé' : ''; ?></p>
                    </div>
                <?php else: ?>
                    <?php foreach($messages as $message): ?>
                        <div class="message-card">
                            <div class="message-header">
                                <div class="message-info">
                                    <h3><?php echo htmlspecialchars($message['nom']); ?></h3>
                                    <span class="message-date"><?php echo $message['date']; ?></span>
                                </div>
                                <span class="message-subject"><?php echo htmlspecialchars($message['sujet']); ?></span>
                            </div>
                            <div class="message-content">
                                <p><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                            </div>
                            <div class="message-footer">
                                <?php if($messageType === 'nouveaux'): ?>
                                    <form method="post">
                                        <input type="hidden" name="message_data"
                                               value="<?php echo htmlspecialchars(json_encode($message)); ?>">
                                        <button type="submit" name="archive_message" class="archive-btn">
                                            <i class="fa-solid fa-check"></i> Marquer comme lu
                                        </button>
                                    </form>
                                <?php endif; ?>
                                <a href="mailto:<?php echo $message['email']; ?>" class="reply-btn">
                                    <i class="fa-solid fa-reply"></i> Répondre
                                </a>
                            </div>
                            <?php if(isset($message['date_archivage'])): ?>
                                <div class="archive-info">
                                    Archivé le <?php echo date('d/m/Y H:i', strtotime($message['date_archivage'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        <?php elseif($currentPage === 'reservations'): ?>
        <div class="admin-header">
            <h1><?php echo $reservationType === 'validees' ? 'Réservations validées' : 'Réservations en attente'; ?></h1>
            <div class="date-filter">
                <form action="" method="get">
                    <input type="hidden" name="page" value="reservations">
                    <input type="hidden" name="reservation_type" value="<?php echo $reservationType; ?>">
                    <input type="date"
                           name="date"
                           value="<?php echo $selectedDate; ?>"
                           onchange="this.form.submit()"
                           min="<?php echo date('Y-m-d'); ?>"
                           max="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
                    <?php if($selectedDate): ?>
                        <a href="?page=reservations&reservation_type=<?php echo $reservationType; ?>"
                           class="reset-filter">
                            Voir toutes les réservations
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="reservations-grid">
            <?php if(empty($displayedReservations)): ?>
                <div class="empty-state">
                    <i class="fa-solid fa-calendar"></i>
                    <p>Aucune réservation <?php echo $selectedDate ? 'pour cette date' : ''; ?></p>
                </div>
            <?php else: ?>
            <?php foreach($displayedReservations as $reservation): ?>
            <div class="reservation-card">
                <div class="reservation-time">
                    <?php echo date('d/m/Y', strtotime($reservation['date_reservation'])); ?>
                    à <?php echo $reservation['heure']; ?>
                </div>
                <div class="reservation-details">
                    <h3><?php echo htmlspecialchars($reservation['nom']); ?></h3>
                    <p>
                        <i class="fa-solid fa-users"></i>
                        <?php echo $reservation['personnes']; ?> personne(s)
                    </p>
                    <p>
                        <i class="fa-solid fa-phone"></i>
                        <?php echo htmlspecialchars($reservation['telephone']); ?>
                    </p>
                    <p>
                        <i class="fa-solid fa-envelope"></i>
                        <?php echo htmlspecialchars($reservation['email']); ?>
                    </p>
                    <p class="reservation-created">
                        <i class="fa-solid fa-clock"></i>
                        Réservé le <?php echo date('d/m/Y H:i', strtotime($reservation['date_creation'])); ?>
                    </p>
                </div>
                <?php if($reservationType === 'en_attente'): ?>
                <div class="reservation-footer">
                    <form method="post">
                        <input type="hidden" name="reservation_data"
                               value="<?php echo htmlspecialchars(json_encode($reservation)); ?>">
                        <button type="submit" name="valider_reservation" class="validate-btn">
                            <i class="fa-solid fa-check"></i> Valider
                        </button>
                    </form>
                </div>
                <?php endif; ?>
                <?php if(isset($reservation['date_validation'])): ?>
                    <div class="validation-info">
                        Validée le <?php echo date('d/m/Y H:i', strtotime($reservation['date_validation'])); ?>
                    </div>
                <?php endif; ?>
            </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>