<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    private $_user;
    public $device_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required', 'message' => 'Толтырыңыз!'],
            ['username', 'match', 'pattern' => '/^(admin|\+\d{11,15})$/', 'message' => 'Мысалы: +77478725287'],

            ['password', 'safe'],

            ['device_id', 'required'],
            ['device_id', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();

            if(!$user){
                $this->addError('username', 'Телефон нөмірі тіркелмеген!');
                return false;
            }

            if ($user->username === 'admin') {
                if (empty($this->password)) {
                    $this->addError('username', 'Құпия сөз жазыңыз!');
                    return false;  // Stop login if password is empty
                }

                if (!$user->validatePassword($this->password)) {
                    $this->addError('username', 'Құпия сөз қате!');
                    return false;  // Password validation failed for admin
                }
                return Yii::$app->user->login($user);
            }

            if ($user->device_id === $this->device_id) {
                return Yii::$app->user->login($user);
            } else {
                $this->addError('username', 'Құрылғы дұрыс емес!');
            }
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
