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

                        <h3>Information</h3>
                        <address>
                            <strong>No. 3 Industrial Zone, Huangchong</strong><br>
                            Zhongtang, Dongguan<br>
                            Guangdong Province, 523221 China<br>                                                   
                        </address>                     

                        <abbr title="Contact"><strong>Contact:</strong></abbr>Mr. Longman Kwong</br>
                        <abbr title="Position"><strong>Position:</strong></abbr>Director of sales division</br></br>                        

                        <abbr title="Email Address"><strong>Email:</strong></abbr>cled@bestcled.com</br>
                        <abbr title="Phone"><strong>Phone:</strong></abbr>0086-769-23076867 &  0086-185 2099 6338</br>
                        <abbr title="Fax"><strong>Fax:</strong></abbr>0086-769-23076156</br>
                              <div class="widget noborder notoppadding">

                              <script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>                              
                            <a href="skype:langmankwong?chat" id = "SkypeButton_Call_langmankwong_1" class="social-icon si-small si-dark si-skype">
                                <i class="icon-skype"></i>
                                <i class="icon-skype"></i>                                
                            </a>
                            </div>
                            <a href="mailto:cled@bestcled.com" class="social-icon si-small si-dark si-mail">
                                <i class="icon-mail"></i>
                                <i class="icon-mail"></i>
                            </a>
                        </div>
                </div>          
        </div>
</div>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARj4PlZLhSWMd4_2I4A2kpoaZKP1X9F18&callback=initialize"
  type="text/javascript"></script>

<script>

/*function initialize()
{
var myCenter=new google.maps.LatLng(23.0873288, 113.687859);
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
  content:"<strong>Dongguan, Guangdong Province</strong><br>Huangchong, Zhongtang<br>No. 3 Industrial Zone<br>523221 China"
  });

infowindow.open(map,marker);
}
*/
//google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=BFc9ae1fb8f5a71ffdb7f361df401fd3"></script>


<script type="text/javascript">
// 百度地图API功能
var map = new BMap.Map("google-map5");
var point = new BMap.Point(113.727343,23.127992);

//动画跳动样式
map.centerAndZoom(point, 15);
var marker = new BMap.Marker(point);  // 创建标注
map.addOverlay(marker);              // 将标注添加到地图中
marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

//比例尺样式
map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
map.enableScrollWheelZoom();                            //启用滚轮放大缩小
map.addControl(new BMap.MapTypeControl());          //添加地图类型控件
map.setCurrentCity("东莞");          // 设置地图显示的城市 此项是必须设置的

//鼠标滚轮缩放样式
map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

//文本信息样式
map.centerAndZoom(point, 15);
var opts = {
  width : 300,     // 信息窗口宽度
  height: 100,     // 信息窗口高度
  title : "<strong>Headquarter</strong>" , // 信息窗口标题
  enableMessage:false,//设置允许信息窗发送短息    
}
var infoWindow = new BMap.InfoWindow("Dongguan, Guangdong Province<br>Huangchong, Zhongtang, No. 3 Industrial Zone, 523221 China", opts);  // 创建信息窗口对象
map.openInfoWindow(infoWindow,point); //开启信息窗口
</script>
