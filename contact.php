<?php
include_once __DIR__ . '/includes/header.php';

// Initialisation des variables
$errors = [];
$success = false;

// Traitement du formulaire
if(isset($_POST['envoyer'])) {
    // Validation des champs
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $sujet = htmlspecialchars(trim($_POST['sujet']));
    $message = htmlspecialchars(trim($_POST['message']));
    $date = date('d/m/Y H:i');

    // Vérification des champs
    if(empty($nom)) {
        $errors['nom'] = "Le nom est requis";
    }
    if(!$email) {
        $errors['email'] = "Email invalide";
    }
    if(empty($message)) {
        $errors['message'] = "Le message est requis";
    }

    // Si pas d'erreurs, enregistrement dans le CSV
    if(empty($errors)) {
        $newMessage = [$date, $nom, $email, $sujet, $message];
        $file = fopen('admin/data/messages.csv', 'a');
        fputcsv($file, $newMessage, ';');
        fclose($file);
        $success = true;
    }
}
?>

    <div class="contact-form-container">
        <form class="contact-form" method="post" action="">
            <h2>Contactez-nous</h2>

            <?php if($success): ?>
                <div class="success-message">
                    Message envoyé avec succès !
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="nom">Nom*</label>
                <input type="text"
                       id="nom"
                       name="nom"
                       value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>"
                       class="<?php echo isset($errors['nom']) ? 'error' : ''; ?>">
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
                       class="<?php echo isset($errors['email']) ? 'error' : ''; ?>">
                <?php if(isset($errors['email'])): ?>
                    <span class="error-message"><?php echo $errors['email']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="sujet">Sujet</label>
                <select id="sujet" name="sujet">
                    <option value="information" <?php echo (isset($_POST['sujet']) && $_POST['sujet'] == 'information') ? 'selected' : ''; ?>>
                        Demande d'information
                    </option>
                    <option value="groupe" <?php echo (isset($_POST['sujet']) && $_POST['sujet'] == 'groupe') ? 'selected' : ''; ?>>
                        Réservation de groupe
                    </option>
                    <option value="autre" <?php echo (isset($_POST['sujet']) && $_POST['sujet'] == 'autre') ? 'selected' : ''; ?>>
                        Autre
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message*</label>
                <textarea id="message"
                          name="message"
                          rows="6"
                          class="<?php echo isset($errors['message']) ? 'error' : ''; ?>"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                <?php if(isset($errors['message'])): ?>
                    <span class="error-message"><?php echo $errors['message']; ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" name="envoyer" class="submit-btn">
                <i class="fa-solid fa-paper-plane"></i> Envoyer
            </button>
        </form>
    </div>

<?php include_once __DIR__ . '/includes/footer.php'; ?>