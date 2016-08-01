<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\models\Contact */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;
use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

//seo meta tags
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Capital - Specialist in Architectural Lighting ',
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Address, Lighting, Downlight, Indonesia, Architectural, Design',
]);

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'index,follow',
]);

?>
<!-- <script type="text/javascript" src="<?=Url::to('@web/js/jquery.gmap.js', true);?>"></script>  -->
<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>  -->
<!-- <script src="http://maps.googleapis.com/maps/api/js"></script> -->

                <div id="google-map5" style="margin-top:-80px; height: 400px; margin-bottom: 20px;" class="gmap"></div>
<?= Alert::widget() ?>
<div class="site-contact container clearfix topmargin">    
    <div class="row">
        <div class="postcontent nobottommargin">
        <h3><?= Html::encode($this->title) ?></h3>
    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group col_full">
                    <?= Html::submitButton('Send Message', ['class' => 'button button-3d nomargin', 'name' => 'contact-button']) ?>
                </div>                
            <?php ActiveForm::end(); ?>        
        </div>        
<div class="sidebar col_last nobottommargin">

                        <h3>Stores</h3>
                        <address>
                            <strong>Jakarta Barat</strong><br>
                            Ruko Greenlake City<br>
                            Cluster Sentra Niaga no B15<br>                            
                        </address>
                        <address>
                            <strong>Jakarta Pusat</strong><br>
                            Jalan Kramat Raya 101<br>
                            Plaza Kenari Mas LG B33<br>
                            (021) 3984-1954<br>
                        </address>
                        <address>
                            <strong>Jakarta Selatan</strong><br>
                            Jalan RS Fatmawati No. 3D<br>                            
                            (021) 739-2743 / (021) 2905-4728<br>
                        </address>  
                        <address>
                            <strong>Tangerang</strong><br>
                            Ruko Palmyra Kav 25A No. 29<br>                            
                            Alam Sutera<br>
                        </address>                                                        
                        <abbr title="Email Address"><strong>Email:</strong></abbr> info@capitalelectric.co.id
                        </div>

</div>

<script src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(-6.18390, 106.70639);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:11,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("google-map5"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"<strong>Jakarta Barat</strong><br>Ruko Greenlake City<br>Cluster Sentra Niaga no B15<br>"
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
