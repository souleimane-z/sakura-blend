# Architecture du Projet Sakura Blend

## Structure des Dossiers

```
sakura-blend/
│
├── assets/                 # Ressources statiques
│   ├── css/
│   │   └── footer.css      
│   │   ├── header.css
│   │   ├── layout.css
│   │   ├── navigation.css
│   │   ├── reset.css
│   │   ├── style.css           # Styles du site + import des autres fichiers css
│   │   ├── typography.css
│   │   ├── variables.css
│   │   └── components/   
│   │   │   ├── footer.php   
│   │   │   ├── forms.css
│   │       └── buttons.css
│   │
│   ├── js/
│   │   └── main.js        # JavaScript (menu mobile, validations)
│   └── images/
│       └── logo.png
│
├── includes/              # Fichiers inclus
│   ├── header.php        # En-tête + menu de navigation
│   ├── footer.php        # Pied de page
│   └── menu.php          # Données du menu restaurant
│
├── admin/                # Administration
│   ├── data/
│   │   └── messages.csv  # Stockage des messages de contact
│   ├── index.php        # Dashboard admin (liste messages)
│   ├── login.php        # Page de connexion
│   └── logout.php       # Déconnexion
│
├── index.php            # Page d'accueil
├── menu.php            # Page du menu
└── contact.php         # Formulaire de contact
```
