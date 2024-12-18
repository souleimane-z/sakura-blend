document.addEventListener('DOMContentLoaded', function() {
    // Menu mobile
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');

    if(mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            navLinks.classList.toggle('active');
        });
    }

    // Gestion des créneaux de réservation (si on est sur la page réservation)
    const dateInput = document.getElementById('date');
    if(dateInput) {
        dateInput.addEventListener('change', updateCreneaux);
    }

    // Filtrage du menu (si on est sur la page menu)
    const menuFilters = document.querySelectorAll("#menu-filters li a");
    if(menuFilters.length > 0) {
        menuFilters.forEach(filter => {
            filter.addEventListener('click', function(e) {
                e.preventDefault();

                menuFilters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');

                const selectedFilter = this.getAttribute("data-filter");
                const menuItems = document.querySelectorAll(".menu-restaurant");

                menuItems.forEach(item => {
                    item.style.opacity = "0";
                    item.style.transform = "translateY(20px)";

                    setTimeout(() => {
                        if (selectedFilter === '.menu-restaurant' || item.classList.contains(selectedFilter.substring(1))) {
                            item.style.display = "block";
                            setTimeout(() => {
                                item.style.opacity = "1";
                                item.style.transform = "translateY(0)";
                            }, 50);
                        } else {
                            item.style.display = "none";
                        }
                    }, 300);
                });
            });
        });
    }
});

// Fonction de mise à jour des créneaux pour la réservation
async function updateCreneaux() {
    const dateInput = document.getElementById('date');
    const heureSelect = document.getElementById('heure');

    if(dateInput && heureSelect && dateInput.value) {
        try {
            const response = await fetch(`reservation.php?getCreneaux=true&date=${dateInput.value}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const creneaux = await response.json();

            heureSelect.innerHTML = '';

            if(creneaux.length === 0) {
                heureSelect.innerHTML = '<option value="">Fermé ce jour</option>';
                return;
            }

            creneaux.forEach(creneau => {
                const option = document.createElement('option');
                option.value = creneau;
                option.textContent = creneau;
                heureSelect.appendChild(option);
            });
        } catch(error) {
            console.error('Erreur détaillée:', error);
            heureSelect.innerHTML = '<option value="">Erreur de chargement</option>';
        }
    }
}