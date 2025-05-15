<?php

namespace frontend\models;

use common\models\Participant;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $name;
    public $password = 'password';
    public $device_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message' => 'Толтырыңыз!'],
            ['username', 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'match', 'pattern' => '/^\+\d{11,15}$/', 'message' => 'Мысалы: +77478725287'],

            ['name', 'required', 'message' => 'Толтырыңыз!'],
            ['name', 'trim'],
            ['name', 'string', 'max' => 255],
            ['name', 'match', 'pattern' => '/^[А-ЯЁӘІҢҒҮҰҚӨҺа-яёәіңғүұқөһ\-]+\s+[А-ЯЁӘІҢҒҮҰҚӨҺа-яёәіңғүұқөһ\-\s]+$/u',
                'message' => 'Мысалы: Мухаммедьяров Бейбарыс'],

            ['device_id', 'required'],
            ['device_id', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->device_id = $this->device_id;
        $user->save(false);

        $participant  = new Participant();
        $participant->user_id = $user->id;
        $participant->name = $this->name;
        $participant->save(false);

        return true;
    }
}
