<?php

class User {
    private $id;
    private $name;
    private $age;
    private $registeredAt;
    private $lastLoginAt;

    public function __construct($id, $email, $password, $name, $age, $registeredAt, $lastLoginAt) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->age = $age;
        $this->registeredAt = new DateTime();
        $this->lastLoginAt = null;
    }

    public function getFullName() {
        return $this->name;
    }

    public static function fromArray(array $data): User {
        return new User(
            $data['id'],
            $data['email'],
            $data['password'],
            $data['name'],
            $data['age'],
            new DateTime($data['registeredAt']),
            isset($data['lastLoginAt']) ? new DateTime($data['lastLoginAt']) : null
        );
    }
}
