<?php

require_once "DatabaseElement.php";
require_once "ErrorAPI.php";

require_once dirname(__DIR__)."/php/get.php";
require_once dirname(__DIR__)."/php/update.php";
require_once dirname(__DIR__)."/php/add.php";
require_once dirname(__DIR__)."/php/delete.php";
require_once dirname(__DIR__)."/php/database.php";

class User extends DatabaseElement {
    protected static string $functionGet = 'dbGetuser';
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $birthdate;
    protected string $password;
    public int $favoriteId;

    /**
     * @throws ErrorAPI
     */
    private function checkFields($userData=null): void {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new ErrorAPI("Incorrect email", 400);
        }
        if (!isAvailableEmail(self::$db, $this->email) and (!$userData or $userData['email'] != $this->email)) {
            throw new ErrorAPI("Email unavailable", 400);
        }
        if (strtotime($this->birthdate) > strtotime('now')) {
            throw new ErrorAPI("Invalid birthdate", 400);
        }
    }

    public static function fromArray(array $data, int $page=0): static {
        $user = new static($data['id_user'], $page);
        $user->firstName = $data['first_name'];
        $user->lastName = $data['name'];
        $user->email = $data['email'];
        $user->birthdate = $data['birth_date'];
        $user->password = $data['password'];
        $user->favoriteId = $data['id_playlist_favorite'];
        return $user;
    }

    public static function fromPUT(array& $data, int $page=0): static {
        $user = new static($data['userId'] ?? null, $page);
        $user->firstName = $data['firstName'];
        $user->lastName = $data['lastName'];
        $user->email = $data['email'];
        $user->birthdate = $data['birthdate'];
        $user->password = $data['password'];
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
        $this->birthdate = $data['birth_date'];
        $this->password = $data['password'];
        $this->favoriteId = $data['id_playlist_favorite'];
        return $this;
    }

    /**
     * @throws ErrorAPI
     */
    function add(): static {
        $this->checkFields();

        $this->password = crypt($this->password, '$5$rounds=5000$gnsltinfgwlqpazm$');

        $success = dbAddUser(self::$db, $this->firstName, $this->lastName, $this->birthdate, $this->email, $this->password);
        if ($success) {
            return $this;
        }
        throw new ErrorAPI("Invalid fields", 400);
    }

    /**
     * @throws ErrorAPI
     */
    public function update(): static {
        $userData = dbGetUser(self::$db, $this->id);
        $this->checkFields($userData);

        if ($this->password) {
            $this->password = crypt($this->password, '$5$rounds=5000$gnsltinfgwlqpazm$');
        } else {
            $this->password = $userData['password'];
        }

        $success = dbUpdateUser(self::$db, $this->id, $this->firstName, $this->lastName, $this->email, $this->birthdate, $this->password);
        if ($success) {
            return $this;
        }
        throw new ErrorAPI("Invalid fields", 400);
    }

    function addToHistory(int $trackId): bool {
        return dbAddTrackToHistory(self::$db, $this->id, $trackId);
    }

    function getFavorites(): false|array {
        return dbGetFavoriteByUser(self::$db, $this->id);
    }

    function addToFavorites(int $trackId): bool {
        return dbAddTrackToFavorites(self::$db, $trackId, $this->id);
    }

    function removeFromFavorites(int $trackId): bool {
        return dbDeleteTrackFromFavorites(self::$db, $trackId, $this->id);
    }
}