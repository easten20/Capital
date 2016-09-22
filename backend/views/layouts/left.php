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
                    ['label' => 'Product', 'icon' => 'fa fa-circle-o',  'url' => ['/product/index']],        
                    ['label' => 'Brand', 'icon' => 'fa fa-circle-o',  'url' => ['/brandtype/index']],
                    ['label' => 'Portfolio', 'icon' => 'fa fa-circle-o',  'url' => ['/portfolio/index']],
                    ['label' => 'Page', 'icon' => 'fa fa-circle-o', 'url' => ['/page/index']],
                    ['label' => 'Contact', 'icon' => 'fa fa-circle-o', 'url' => ['/contact/index']],
                    ['label' => 'Category', 'icon' => 'fa fa-circle-o', 'url' => ['/category/index']],
                    ['label' => 'Cofounder', 'icon' => 'fa fa-circle-o', 'url' => ['/cofounder/index']],
                    ['label' => 'ChangePassword', 'icon' => 'fa fa-circle-o', 'url' => ['/site/change-password']],
                ];
                $menuItems[] = [
                    //'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    //'url' => ['/site/logout'],
                    //'linkOptions' => ['data-method' => 'post']
                ];
            }

         ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems                
            ]
        ) ?>

    </section>

</aside>
