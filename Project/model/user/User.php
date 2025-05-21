<?php
class User
{
    protected $loginID;
    protected $password;
    protected $email;
    protected $userAccountID;
    protected $loginBy;
    protected $isActive;
    protected $role;

    public function __construct($loginID, $password, $email, $userAccountID, $loginBy, $isActive, $role)
    {
        $this->loginID       = $loginID;
        $this->password      = $password;
        $this->email         = $email;
        $this->userAccountID = $userAccountID;
        $this->loginBy       = $loginBy;
        $this->isActive      = $isActive;
        $this->role          = $role;
    }

    public function getLoginID()
    {
        return $this->loginID;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUserAccountID()
    {
        return $this->userAccountID;
    }

    public function getLoginBy()
    {
        return $this->loginBy;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setUserAccountID($userAccountID)
    {
        $this->userAccountID = $userAccountID;
        return $this;
    }

    public function setLoginBy($loginBy)
    {
        $this->loginBy = $loginBy;
        return $this;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getUserAccount()
    {
        $repo = new UserAccountRepository();
        return $repo->find($this->userAccountID);
    }
}
