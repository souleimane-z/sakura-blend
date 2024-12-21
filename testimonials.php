<section class="testimonials">
    <h2>Ce que pensent nos clients</h2>
    <p class="japanese-text">お客様の声</p>
    <div class="testimonials-container">
        <div class="testimonials-track">
            <?php
            $testimonials = include __DIR__ . '/includes/testimonials.php';
            foreach($testimonials as $testimonial):
                ?>
                <div class="testimonial-card">
                    <div class="client-image">
                        <img src="<?php echo $testimonial['image']; ?>"
                             alt="Photo de <?php echo $testimonial['nom']; ?>">
                    </div>
                    <div class="rating">
                        <?php
                        $note = $testimonial['note'];
                        $fullStars = floor($note);
                        $hasHalfStar = ($note - $fullStars) >= 0.5;

                        for($i = 0; $i < $fullStars; $i++): ?>
                            <i class="fa-solid fa-star"></i>
                        <?php endfor;

                        if($hasHalfStar): ?>
                            <i class="fa-solid fa-star-half"></i>
                        <?php endif; ?>
                    </div>
                    <p class="testimonial-text">"<?php echo $testimonial['texte']; ?>"</p>
                    <p class="client-name"><?php echo $testimonial['nom']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>