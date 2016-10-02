<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<div class="password-reset">
    <p>Message from <?= Html::encode($contact->name) ?></p>

    <p>
    <table>
        
        <tr><th>Subject</th><td>: <?=  Html::encode($contact->subject) ?></td></tr>
        <tr><th>Body</th><td>: <?=  Html::encode($contact->body) ?></td></tr>
    </table>
</p>

</div>
