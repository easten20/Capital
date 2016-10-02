<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    <?= Html::a('<span class="logo-mini">Cptl</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <?php
            $contact = new common\models\Contact;            
            $countUnread = $contact->find()
                    ->where(['is_readed' => '0'])
                    ->count();            
            $getUnread = $contact->find()
                    ->where(['is_readed' => '0'])
                    ->all();
            ?>
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>                                 
                        <span class="label label-warning text-count-notif"><?php echo $countUnread; ?></span>                                
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        if ($countUnread > 0):
                            ?>    
                            <li class="header">
                                Anda memiliki <span class="text-count-notif"><?= $countUnread ?></span> pesan baru
                            </li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php foreach ( $getUnread as $message ):      ?>                         
                                    <li class="open-notification" data-id="<?= $message->id ?>">                                       
                                        <?= Html::a('<i class="fa fa-envelope-o text-danger"></i>  '.$message->subject , ['/contact/view', 'id' => $message->id], ['class' => '']) ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li class="header" >
                                Tidak ada pesan baru
                            </li>
                        <?php endif; ?>
                        <li class="footer" style="padding-top: 0px; height: auto;">
                            <?=
                            Html::a('Lihat Semua Pesan', ['/contact'])
                            ?>

                        </li>  
                    </ul>

                </li>
                <li class="dropdown notifications-menu user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-gear"></i>
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?php echo Yii::$app->user->identity->username; ?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>    
                                    <?=
                                    Html::a('<i class="fa fa-lock"></i> Change Password', ['/site/change-password'])
                                    ?>
                                </li>
                                <li>                                    
                                    <?=
                                    Html::a('<i class="fa fa-power-off text-red"></i>Sign out', ['/site/logout'], ['data-method' => 'post'])
                                    ?>  
                                </li>
                            </ul>
                    </ul>
                </li>	

                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li>
                     <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                 </li> -->
            </ul>
        </div>
    </nav>
</header>
