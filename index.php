<?php
    include_once __DIR__ . '/includes/header.php';
    include_once __DIR__ . '/includes/loader.php';
?>

    <section class="hero">
        <div class="hero-content">
            <h1>Cuisine Japonaise Traditionnelle</h1>
            <p class="japanese-text">伝統的な日本料理</p>
            <p>Découvrez l'authenticité de la cuisine japonaise dans un cadre élégant et zen. Notre restaurant allie traditions culinaires japonaises et considérations modernes, proposant une carte 100% halal.</p>
            <div class="hero-buttons">
                <a href="menu.php" class="btn-outline">Notre Carte</a>
                <a href="reservation.php" class="btn-primary">Réserver une table</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="https://res.cloudinary.com/dhqh98spd/image/upload/v1734784050/green-Sakura_mzkzeq.svg" alt="Intérieur du restaurant Sakura Blend">
        </div>
    </section>

    <section class="special-dishes">
        <h2>Nos Spécialités</h2>
        <p class="subtitle">Une sélection de nos plats les plus appréciés</p>

        <div class="dishes-grid">
            <div class="dish-card">
                <div class="dish-image">
                    <img src="https://res.cloudinary.com/dhqh98spd/image/upload/v1734784055/Vegan-Miso_xegsrm.webp" alt="Ramen Miso Végétal">
                </div>
                <div class="dish-content">
                    <h3>Ramen Miso Végétal</h3>
                    <p>Nouilles, bouillon miso, œuf mollet, champignons, légumes</p>
                </div>
            </div>

            <div class="dish-card">
                <div class="dish-image">
                    <img src="https://res.cloudinary.com/dhqh98spd/image/upload/v1734784058/Soy_Spicy-California-Roll_low-res_rlepoa.webp" alt="California Roll">
                </div>
                <div class="dish-content">
                    <h3>California Roll</h3>
                    <p>Avocat, crabe, concombre et masago (8 pièces)</p>
                </div>
            </div>

            <div class="dish-card">
                <div class="dish-image">
                    <img src="https://res.cloudinary.com/dhqh98spd/image/upload/v1734784054/Vegetable-Gyoza_pjth20.png" alt="Gyoza Végétariens">
                </div>
                <div class="dish-content">
                    <h3>Gyoza Végétariens</h3>
                    <p>Raviolis japonais aux légumes (6 pièces)</p>
                </div>
            </div>

            <div class="dish-card">
                <div class="dish-image">
                    <img src="https://res.cloudinary.com/dhqh98spd/image/upload/v1734784052/matcha_tiramisu-cropped_udjh4h.png" alt="Matcha Tiramisu">
                </div>
                <div class="dish-content">
                    <h3>Matcha Tiramisu</h3>
                    <p>Tiramisu au thé vert matcha</p>
                </div>
            </div>

        </div>
    </section>

    <section class="about-section">
        <div class="about-content">
            <h2>Notre Philosophie</h2>
            <p class="japanese-text">私たちの哲学</p>
            <p>Chez Sakura Blend, nous croyons en une cuisine qui respecte à la fois les traditions japonaises et les besoins de notre clientèle. Notre chef allie techniques ancestrales et touches modernes pour créer une expérience culinaire unique.</p>
            <div class="features">
                <div class="feature">
                    <i class="fa-solid fa-certificate"></i>
                    <span>100% Halal</span>
                </div>
                <div class="feature">
                    <i class="fa-solid fa-leaf"></i>
                    <span>Options Végétariennes</span>
                </div>
                <div class="feature">
                    <i class="fa-solid fa-utensils"></i>
                    <span>Fait Maison</span>
                </div>
            </div>
        </div>
    </section>
    <?php include_once __DIR__ . "/testimonials.php"; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>