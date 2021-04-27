<?php
declare(strict_types=1);

namespace Kata\Entity;


class User {
    public $id;
    public $username;
    public $email;
    public $photos = Array();

    public function __construct(string $username,string $email)
    {
        $this->username = $username;
        $this->email= $email;
    }




    public function getPhotos() {
        return $this->photos;
    }
    public function addPhoto(Photo $photo) {
        $this->photos[] = $photo;
    }
    public function addPhotos(array $photos) {
        $this->photos = array_merge($this->photos, $photos);
    }
}

