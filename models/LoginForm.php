<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $email;
public $password;

private $_pessoa = false;

public function rules()
{
    return [
        [['email', 'password'], 'required'],
        ['email', 'email'],
        ['password', 'validatePassword'],
    ];
}

public function validatePassword($attribute, $params)
{
    if (!$this->hasErrors()) {
        $pessoa = $this->getPessoa();

        if (!$pessoa || !$pessoa->validatePassword($this->password)) {
            $this->addError($attribute, 'Email ou senha inválidos.');
        }
    }
}

public function getPessoa()
{
    if ($this->_pessoa === false) {
        $this->_pessoa = Pessoa::findOne(['email' => $this->email]);
    }

    return $this->_pessoa;
}

}
