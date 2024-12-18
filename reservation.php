<?php
include_once __DIR__ . '/includes/config.php';

if(isset($_GET['getCreneaux'])) {
    header('Content-Type: application/json');
    $date = $_GET['date'];
    $creneaux = getCreneauxDisponibles($date);
    echo json_encode($creneaux);
    exit();
}

include_once __DIR__ . '/includes/header.php';

$errors = [];
$success = false;

if(isset($_POST['reserver'])) {
    // Validation
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $date = htmlspecialchars(trim($_POST['date']));
    $heure = htmlspecialchars(trim($_POST['heure']));
    $personnes = (int)$_POST['personnes'];

    // Vérifications
    if(empty($nom)) $errors['nom'] = "Le nom est requis";
    if(!$email) $errors['email'] = "Email invalide";
    if(empty($telephone)) $errors['telephone'] = "Le téléphone est requis";
    if(empty($date)) $errors['date'] = "La date est requise";
    if(empty($heure)) $errors['heure'] = "L'heure est requise";

    // Si pas d'erreurs
    if(empty($errors)) {
        $reservation = [
            date('Y-m-d H:i:s'), // Date de la réservation
            $nom,
            $email,
            $telephone,
            $date,
            $heure,
            $personnes
        ];

        $file = fopen('admin/data/reservations.csv', 'a');
        fputcsv($file, $reservation, ';');
        fclose($file);
        $success = true;
    }
}

// Obtenir la date minimum (aujourd'hui) et maximum (dans 30 jours)
$minDate = date('Y-m-d');
$maxDate = date('Y-m-d', strtotime('+30 days'));
?>

    <div class="reservation-form-container">
        <form class="reservation-form" method="post" action="">
            <h2>Réserver une table</h2>

            <?php if($success): ?>
                <div class="success-message">
                    Réservation confirmée ! Nous vous attendons avec impatience.
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="nom">Nom et Prénom*</label>
                <input type="text"
                       id="nom"
                       name="nom"
                       value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>"
                       class="<?php echo isset($errors['nom']) ? 'error' : ''; ?>"
                       required>
                <?php if(isset($errors['nom'])): ?>
                    <span class="error-message"><?php echo $errors['nom']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                       class="<?php echo isset($errors['email']) ? 'error' : ''; ?>"
                       required>
                <?php if(isset($errors['email'])): ?>
                    <span class="error-message"><?php echo $errors['email']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone*</label>
                <input type="tel"
                       id="telephone"
                       name="telephone"
                       value="<?php echo isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : ''; ?>"
                       class="<?php echo isset($errors['telephone']) ? 'error' : ''; ?>"
                       required>
                <?php if(isset($errors['telephone'])): ?>
                    <span class="error-message"><?php echo $errors['telephone']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="date">Date*</label>
                    <input type="date"
                           id="date"
                           name="date"
                           min="<?php echo $minDate; ?>"
                           max="<?php echo $maxDate; ?>"
                           onchange="updateCreneaux()"
                           required>
                </div>

                <div class="form-group">
                    <label for="heure">Heure*</label>
                    <select id="heure" name="heure" required>
                        <option value="">Sélectionnez une date</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="personnes">Personnes*</label>
                    <select id="personnes" name="personnes" required>
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?> personne<?php echo $i > 1 ? 's' : ''; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <button type="submit" name="reserver" class="submit-btn">
                <i class="fa-solid fa-calendar-check"></i> Réserver
            </button>
        </form>
    </div>












<?php
include_once __DIR__ . '/includes/footer.php';
?>