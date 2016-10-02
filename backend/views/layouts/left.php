<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>                
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>        

        <?php
        $menuItems = [['label' => 'Home', 'url' => ['/site/index']],
        ];
        if (Yii::$app->user->isGuest) {
            //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems = [
                ['label' => 'Product', 'icon' => 'fa fa-shopping-bag', 'url' => ['/product/index']],
                ['label' => 'Brand', 'icon' => 'fa fa-university', 'url' => ['/brandtype/index']],
                ['label' => 'Category', 'icon' => 'fa fa-gift', 'url' => ['/brandtype/index-category']],
                ['label' => 'Portfolio', 'icon' => 'fa fa-image', 'url' => ['/portfolio/index']],
                ['label' => 'Page', 'icon' => 'fa fa-flag', 'url' => ['/page/index']],
                //   ['label' => 'Contact', 'icon' => 'fa fa-circle-o', 'url' => ['/contact/index']],
                ['label' => 'Cofounder', 'icon' => 'fa fa-user-plus', 'url' => ['/cofounder/index']],
                [
                    'label' => 'Manage',
                    'icon' => 'fa fa-users',
                    'url' => ['user/index'],
                    'options' => ['class' => 'dropdown'],
                    //      'template' => '<a href="{url}" class="href_class">{label}</a>',
                    'items' => [
                        ['label' => 'Admin', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/admin']],
                        [
                            'label' => 'User',
                            'icon' => 'fa fa-dot-circle-o',
                            'url' => ['/admin/user'],
                            'options' => ['class' => 'dropdown'],
                            'items' => [
                                ['label' => 'All User', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/user']],
                                ['label' => 'Create', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/user/signup']],
                                ]
                        ],
                        // ['label' => 'User', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/user']],
                        ['label' => 'Route', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/admin/route']],
                        ['label' => 'Permission', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/admin/permission']],
                        ['label' => 'Menu', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/admin/menu']],
                        ['label' => 'Roles', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/admin/role']],
                        ['label' => 'Assignment', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/admin/assignment']],
                    ]
                ],
                    // ['label' => 'Change Password', 'icon' => 'fa fa-circle-o', 'url' => ['/site/change-password']],
            ];            
        }
        ?>

        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => $menuItems
                ]
        )
        ?>

    </section>

</aside>
