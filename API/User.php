<?php

require_once "DatabaseElement.php";

require_once "php/get.php";

class User extends DatabaseElement {
    protected static string $functionGet = 'dbGetuser';
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $birthDate;
    protected string $password;
    public int $favoriteId;

    public static function fromArray(array $data, int $page=0): static {
        $user = new static($data['id_user'], $page);
        $user->firstName = $data['first_name'];
        $user->lastName = $data['name'];
        $user->email = $data['email'];
        $user->birthDate = $data['birth_date'];
        $user->password = $data['password'];
        $user->favoriteId = $data['id_playlist_favorite'];
        return $user;
    }

    public function get(): false|static {
        $data = parent::get();
        if (!$data) {
            return false;
        }
        $this->firstName = $data['first_name'];
        $this->lastName = $data['name'];
        $this->email = $data['email'];
        $this->birthDate = $data['birth_date'];
        $this->password = $data['password'];
        $this->favoriteId = $data['id_playlist_favorite'];
        return $this;
    }

    function add(): void {
        // TODO: Implement void() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }
}