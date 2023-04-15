<?php
?>
<div class="axil-mainmenu aside-category-menu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-nav-department">
                        <aside class="header-department">
                            <button class="header-department-text department-title " style="background-color:#f15f79">
                                <span class="icon"><i class="fal fa-bars"></i></span>
                                <span class="text">Categories</span>
                            </button>
                            <nav class="department-nav-menu">
                                <button class="sidebar-close"><i class="fas fa-times"></i></button>
                                <ul class="nav-menu-list">
                                    <?php foreach ($allCategories as $val) { ?>
                                        <?php $imagesN = $db->getAllRecords('images_category', 'id,name', 'AND category_id="' . $val['id'] . '"', '', '') ?>
                                        <li>
                                            <a href="shop.php?categories=<?php echo $val['id'] ?>" class="nav-link">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <span class="menu-icon"><img style="border:1px solid #f15f79;border-radius:5px;width:50px;height:50px" src="backoffice/images/categories/<?php echo $imagesN[0]['name'] ?>" alt="Categories Images"></span>

                                                    </div>
                                                    <div class="col-7">
                                                        <span class="menu-text allcategorie" style="color:black!important " ><?php echo ucfirst(strtolower($val['name'])) ?></span>

                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </aside>
                    </div>