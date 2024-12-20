<?php

return [
    'entrees' => [
        [
            'nom' => 'Edamame',
            'description' => 'Fèves de soja vapeur, sel de mer',
            'prix' => 6.50,
            'vegetarien' => true,
            'image' => 'Edamame.svg'
        ],
        [
            'nom' => 'Gyoza Végétariens',
            'description' => 'Raviolis japonais aux légumes (6 pièces)',
            'prix' => 8.90,
            'vegetarien' => true,
            'image' => 'Gyoza.svg'
        ],
        [
            'nom' => 'Miso Soup',
            'description' => 'Soupe traditionnelle, tofu, algues wakame',
            'prix' => 5.50,
            'vegetarien' => true,
            'image' => 'Miso-Soup.svg'
        ],
        [
            'nom' => 'Wakame Sarada',
            'description' => 'Salade d\'algues au sésame',
            'prix' => 7.90,
            'vegetarien' => true,
            'image' => 'Seaweed.svg'
        ],
        [
            'nom' => 'Tempura Mix',
            'description' => 'Assortiment de crevettes et légumes en tempura',
            'prix' => 12.90,
            'vegetarien' => false,
            'image' => 'Tempura.svg'
        ]
    ],

    'plats' => [
        [
            'nom' => 'Ramen Miso Végétal',
            'description' => 'Nouilles, bouillon miso, œuf mollet, champignons, légumes',
            'prix' => 18.90,
            'vegetarien' => true,
            'image' => 'Ramen.svg'
        ],
        [
            'nom' => 'Chirashi Salmon',
            'description' => 'Bol de riz vinaigré, saumon frais, avocat, mangue, œufs de poisson',
            'prix' => 22.50,
            'vegetarien' => false,
            'image' => 'CHIRASHI.png'
        ],
        [
            'nom' => 'Wagyu Don',
            'description' => 'Riz, bœuf wagyu grillé, oignon caramélisé, œuf onsen',
            'prix' => 29.90,
            'vegetarien' => false,
            'image' => 'wagyu.svg'
        ],
        [
            'nom' => 'Tempura Udon',
            'description' => 'Nouilles udon chaudes, tempura de crevettes, bouillon dashi',
            'prix' => 19.90,
            'vegetarien' => false,
            'image' => 'tempura-udon.svg'
        ],
        [
            'nom' => 'Teriyaki Poulet',
            'description' => 'Poulet grillé sauce teriyaki, riz, légumes de saison',
            'prix' => 17.90,
            'vegetarien' => false,
            'image' => 'Teriyaki.svg'
        ]
    ],

    'sushis' => [
        [
            'nom' => 'Maguro Nigiri',
            'description' => 'Sushi au thon rouge traditionnel',
            'prix' => 4.90,
            'vegetarien' => false,
            'image' => 'Maguro-Nigiri.webp'
        ],
        [
            'nom' => 'Sake Nigiri',
            'description' => 'Sushi au saumon frais',
            'prix' => 4.50,
            'vegetarien' => false,
            'image' => 'Sake-Nigiri.png'
        ],
        [
            'nom' => 'California Roll',
            'description' => 'Avocat, crabe, concombre et masago (8 pièces)',
            'prix' => 12.90,
            'vegetarien' => false,
            'image' => 'California-Roll.webp'
        ],
        [
            'nom' => 'Inari',
            'description' => 'Tofu frit mariné farci de riz vinaigré',
            'prix' => 3.90,
            'vegetarien' => true,
            'image' => 'Inari.webp'
        ],
        [
            'nom' => 'Tamago Nigiri',
            'description' => 'Sushi à l\'omelette japonaise sucrée',
            'prix' => 3.50,
            'vegetarien' => true,
            'image' => 'Tamago-Nigiri.png'
        ],
        [
            'nom' => 'Rainbow Roll',
            'description' => 'California roll recouvert de poissons variés (8 pièces)',
            'prix' => 15.90,
            'vegetarien' => false,
            'image' => 'Rainbow-Roll.webp'
        ],
        [
            'nom' => 'Spicy Tuna Roll',
            'description' => 'Thon épicé, avocat, sauce pimentée (6 pièces)',
            'prix' => 13.90,
            'vegetarien' => false,
            'image' => 'Spicy-Tuna-Roll.webp'
        ],
        [
            'nom' => 'Avocado Roll',
            'description' => 'Avocat, concombre, carotte (6 pièces)',
            'prix' => 9.90,
            'vegetarien' => true,
            'image' => 'Avocado-Roll.png'
        ],
        [
            'nom' => 'Tempura Roll',
            'description' => 'Crevette tempura, avocat, sauce teriyaki (6 pièces)',
            'prix' => 12.90,
            'vegetarien' => false,
            'image' => 'Tempura-Roll.png'
        ]
    ],

    'desserts' => [
        [
            'nom' => 'Mochi Glacé',
            'description' => 'Assortiment de 3 mochis (thé vert, mangue, sésame noir)',
            'prix' => 8.50,
            'vegetarien' => true,
            'image' => 'frozen-mochi.webp'
        ],
        [
            'nom' => 'Dorayaki',
            'description' => 'Pancakes japonais fourrés à la pâte de haricot rouge',
            'prix' => 7.50,
            'vegetarien' => true,
            'image' => 'dorayaki.png'
        ],
        [
            'nom' => 'Matcha Tiramisu',
            'description' => 'Tiramisu au thé vert matcha',
            'prix' => 8.90,
            'vegetarien' => true,
            'image' => 'matcha_tiramisu.png'
        ],
        [
            'nom' => 'Taiyaki',
            'description' => 'Gaufre en forme de poisson, glace vanille, sauce chocolat',
            'prix' => 8.90,
            'vegetarien' => true,
            'image' => 'Taiyaki.webp'
        ],
        [
            'nom' => 'Cheesecake Yuzu',
            'description' => 'Cheesecake japonais au citron yuzu',
            'prix' => 9.50,
            'vegetarien' => true,
            'image' => 'Cheesecake-yuzu.png'
        ]
    ],

    'thes' => [
        [
            'nom' => 'Sencha',
            'description' => 'Thé vert japonais traditionnel',
            'prix' => 4.50,
            'image' => 'Sencha.webp'
        ],
        [
            'nom' => 'Gyokuro',
            'description' => 'Thé vert premium à l\'umami prononcé',
            'prix' => 6.50,
            'image' => 'Gyokuro.webp'
        ],
        [
            'nom' => 'Hojicha',
            'description' => 'Thé vert torréfié aux notes caramélisées',
            'prix' => 4.90,
            'image' => 'Hojicha.png'
        ],
        [
            'nom' => 'Matcha Cérémoniale',
            'description' => 'Poudre de thé vert finement moulue aux notes herbales',
            'prix' => 9.90,
            'image' => 'Matcha.webp'
        ],
        [
            'nom' => 'Genmaicha',
            'description' => 'Thé vert au riz grillé',
            'prix' => 4.90,
            'image' => 'Genmaicha.png'
        ]
    ],

    'boissons' => [
        [
            'nom' => 'Ramune',
            'description' => 'Limonade japonaise',
            'prix' => 4.50,
            'image' => 'Ramune.webp'
        ],
        [
            'nom' => 'Calpis',
            'description' => 'Boisson lactée japonaise',
            'prix' => 4.50,
            'image' => 'Calpis.png'
        ],
        [
            'nom' => 'Thé Glacé Maison',
            'description' => 'Thé vert glacé au yuzu',
            'prix' => 4.90,
            'image' => 'yuzu-ice-tea.png'
        ],
        [
            'nom' => 'Jus de Fruits',
            'description' => 'Litchi / Mangue / Yuzu',
            'prix' => 4.50,
            'image' => 'fruit-juice.png'
        ]
    ]
];