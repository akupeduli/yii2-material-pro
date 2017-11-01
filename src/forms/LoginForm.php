<?php

namespace akupeduli\material\forms;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class LoginForm extends Model
{
    const WITH_EMAIL = 'EMAIL';
    const WITH_USERNAME = 'USERNAME';
    
    public $registerUrl = ['auth/register'];
    public $forgotPasswordUrl = ['auth/forgot-password'];
    
    public $enableRememberMe = true;
    public $loginWith = self::WITH_USERNAME;
    
    /* form variable */
    public $email;
    public $username;
    public $password;
    public $rememberMe;
    
    protected $_user;
    protected $_userClass;
    
    public function setUserClass($userClass)
    {
        if (!is_subclass_of($userClass, IdentityInterface::class)) {
            throw new InvalidConfigException("User class must implements IdentityInterface");
        }
        $this->_userClass = $userClass;
    }
    public function getUser()
    {
        if ($this->_userClass === null or !class_exists($this->_userClass)) {
            throw new InvalidConfigException("Please set userClass before doing any login process");
        }
        if ($this->_user === null) {
            $class = $this->_userClass;
            if ($this->loginWith === self::WITH_EMAIL) {
                $this->_user = $class::findOne(['email' => $this->email]);
            } else if ($this->loginWith === self::WITH_USERNAME) {
                $this->_user = $class::findOne(['username' => $this->username]);
            } else {
                throw new InvalidConfigException("Invalid config loginWith");
            }
        }
        return $this->_user;
    }
    public function init()
    {
        parent::init();
        if (is_null($this->_userClass)) {
            throw new InvalidConfigException("userClass is not defined");
        }

        $this->setScenario($this->loginWith);
    }
    public function rules()
    {
        return [
            ['email', 'email'],
            [['email', 'username'], 'trim'],
            [['email', 'username', 'password'], 'required'],
            [['email', 'username'], 'exist', 'targetClass' => $this->_userClass, 'message' => 'User does not exist'],
            ['password', 'validatePassword']
        ];
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!method_exists($this->user, 'validatePassword')) {
                throw new InvalidConfigException("User must have method validatePassword");
            }
            if (!$this->user->validatePassword($this->$attribute)) {
                $loginWith = strtolower($this->loginWith);
                $this->addError($attribute, "Incorrect {$loginWith} or password");
            }
        }
    }
    public function scenarios()
    {
        return ArrayHelper::merge(parent::scenarios(), [
            self::WITH_USERNAME => ['username', 'password', 'rememberMe'],
            self::WITH_EMAIL => ['email', 'password', 'rememberMe']
        ]);
    }
    public function login()
    {
        if ($this->validate()) {
            $rememberMeDuration = ArrayHelper::getValue(\Yii::$app->params, 'user.rememberMeDuration', 0);
            return \Yii::$app->user->login($this->user, $this->rememberMe ? $rememberMeDuration : 0);
        }
        return false;
    }
}