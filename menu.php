<?php
include_once __DIR__ . '/includes/header.php';
$menu = include __DIR__ . '/includes/menu.php';
?>

    <section id="menu-list" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Notre Carte</h1>
                    <p class="header-p">Restaurant japonais traditionnel - サクラ ブレンド</p>
                </div>

                <div class="col-md-12 text-center" id="menu-filters">
                    <ul>
                        <li><a class="filter active" data-filter=".entrees">Entrées</a></li>
                        <li><a class="filter" data-filter=".plats">Plats</a></li>
                        <li><a class="filter" data-filter=".sushis">sushis</a></li>
                        <li><a class="filter" data-filter=".desserts">Desserts</a></li>
                        <li><a class="filter" data-filter=".thes">Thés</a></li>
                        <li><a class="filter" data-filter=".boissons">Boissons</a></li>
                        <li><a class="filter" data-filter=".menu-restaurant">Tout voir</a></li>
                    </ul>
                </div>

                <div id="menu-wrapper">
                    <!-- Entrées -->
                    <?php foreach($menu['entrees'] as $item): ?>
                        <div class="entrees menu-restaurant">
                            <div class="menu-item-header">

                                <img src="./assets/images/Menus/Entrée/<?php echo $item['image']; ?>"
                                     alt="<?php echo $item['nom']; ?>"
                                     class="menu-item-image">

                                <div class="menu-item-content">
                                    <span class="clearfix">
                                        <a class="menu-title" href="#"><?php echo $item['nom']; ?></a>
                                        <span class="menu-line"></span>
                                        <span class="menu-price"><?php echo number_format($item['prix'], 2); ?>€</span>
                                    </span>
                                        <span class="menu-subtitle">
                                        <?php echo $item['description']; ?>
                                        <?php if(isset($item['vegetarien']) && $item['vegetarien']): ?>
                                            <i class="fa-solid fa-leaf" title="Végétarien"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Plats -->
                    <?php foreach($menu['plats'] as $item): ?>
                        <div class="plats menu-restaurant">
                            <div class="menu-item-header">

                                <img src="./assets/images/Menus/Plats/<?php echo $item['image']; ?>"
                                     alt="<?php echo $item['nom']; ?>"
                                     class="menu-item-image">

                                <div class="menu-item-content">
                                    <span class="clearfix">
                                        <a class="menu-title" href="#"><?php echo $item['nom']; ?></a>
                                        <span class="menu-line"></span>
                                        <span class="menu-price"><?php echo number_format($item['prix'], 2); ?>€</span>
                                    </span>
                                    <span class="menu-subtitle">
                                        <?php echo $item['description']; ?>
                                        <?php if(isset($item['vegetarien']) && $item['vegetarien']): ?>
                                            <i class="fa-solid fa-leaf" title="Végétarien"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Sushis -->
                    <?php foreach($menu['sushis'] as $item): ?>
                        <div class="sushis menu-restaurant">
                            <div class="menu-item-header">

                                <img src="./assets/images/Menus/Sushis/<?php echo $item['image']; ?>"
                                     alt="<?php echo $item['nom']; ?>"
                                     class="menu-item-image">

                                <div class="menu-item-content">
                                    <span class="clearfix">
                                        <a class="menu-title" href="#"><?php echo $item['nom']; ?></a>
                                        <span class="menu-line"></span>
                                        <span class="menu-price"><?php echo number_format($item['prix'], 2); ?>€</span>
                                    </span>
                                    <span class="menu-subtitle">
                                        <?php echo $item['description']; ?>
                                        <?php if(isset($item['vegetarien']) && $item['vegetarien']): ?>
                                            <i class="fa-solid fa-leaf" title="Végétarien"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Desserts -->
                    <?php foreach($menu['desserts'] as $item): ?>
                        <div class="desserts menu-restaurant">
                            <div class="menu-item-header">

                                <img src="./assets/images/Menus/Desserts/<?php echo $item['image']; ?>"
                                     alt="<?php echo $item['nom']; ?>"
                                     class="menu-item-image">

                                <div class="menu-item-content">
                                    <span class="clearfix">
                                        <a class="menu-title" href="#"><?php echo $item['nom']; ?></a>
                                        <span class="menu-line"></span>
                                        <span class="menu-price"><?php echo number_format($item['prix'], 2); ?>€</span>
                                    </span>
                                    <span class="menu-subtitle">
                                        <?php echo $item['description']; ?>
                                        <?php if(isset($item['vegetarien']) && $item['vegetarien']): ?>
                                            <i class="fa-solid fa-leaf" title="Végétarien"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                    <!-- Thés -->
                    <?php foreach($menu['thes'] as $item): ?>
                        <div class="thes menu-restaurant">
                            <div class="menu-item-header">

                                <img src="./assets/images/Menus/Tea/<?php echo $item['image']; ?>"
                                     alt="<?php echo $item['nom']; ?>"
                                     class="menu-item-image">

                                <div class="menu-item-content">
                                    <span class="clearfix">
                                        <a class="menu-title" href="#"><?php echo $item['nom']; ?></a>
                                        <span class="menu-line"></span>
                                        <span class="menu-price"><?php echo number_format($item['prix'], 2); ?>€</span>
                                    </span>
                                    <span class="menu-subtitle">
                                        <?php echo $item['description']; ?>
                                        <?php if(isset($item['vegetarien']) && $item['vegetarien']): ?>
                                            <i class="fa-solid fa-leaf" title="Végétarien"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Boissons -->
                    <?php foreach($menu['boissons'] as $item): ?>
                        <div class="boissons menu-restaurant">
                            <div class="menu-item-header">

                                <img src="./assets/images/Menus/Boissons/<?php echo $item['image']; ?>"
                                     alt="<?php echo $item['nom']; ?>"
                                     class="menu-item-image">

                                <div class="menu-item-content">
                                    <span class="clearfix">
                                        <a class="menu-title" href="#"><?php echo $item['nom']; ?></a>
                                        <span class="menu-line"></span>
                                        <span class="menu-price"><?php echo number_format($item['prix'], 2); ?>€</span>
                                    </span>
                                    <span class="menu-subtitle">
                                        <?php echo $item['description']; ?>
                                        <?php if(isset($item['vegetarien']) && $item['vegetarien']): ?>
                                            <i class="fa-solid fa-leaf" title="Végétarien"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>