<?php

class User {
    private $id;
    private $name;
    private $age;

    public function __construct($id, $email, $name, $age) {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->age = $age;
    }

    public function getFullName() {
        return $this->name;
    }

    public static function fromArray(array $data): User {
        return new User(
            $data['id'],
            $data['email'],
            $data['name'],
            $data['age']
        );
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getHashedPassword() {
        return $this->hashedPassword;
    }

    public function setPassword($password) {
        $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }
    public function getName() {
        return $this->name;
    }
    public function getAge() {
        return $this->age;
    }
}
