<?php
namespace backend\models;

use common\models\User;
use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class PasswordForm extends Model
{
    public $oldpass;
    public $newpass;
    public $repeatnewpass;        
    //public $password;

    /**
     * @var \common\models\User
     */
    private $_user;

    public function rules(){
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
       
        public function findPasswords($attribute, $params){
            $user =  User::findByUsername(Yii::$app->user->identity->username);            
            if (!$user->validatePassword($this->oldpass)) {
                $this->addError($attribute, 'Old password is incorrect.');
            }            
        }
       
        public function attributeLabels(){
            return [
                'oldpass'=>'Old Password',
                'newpass'=>'New Password',
                'repeatnewpass'=>'Repeat New Password',
            ];
        }
  

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}
