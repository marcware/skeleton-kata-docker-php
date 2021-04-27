<?php


namespace Kata\Repository;

use Kata\Entity\User;
use PDO;

class UserRepository
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function storeUser(User $user)
    {
        $sql = 'INSERT INTO User(username, email) VALUES (:username, :email)';
        $stm = $this->db->prepare($sql);
        $stm->execute(array(':username' => $user->username, ':email' => $user->email));
        $userId = $this->db->lastInsertId();
        if (!$userId) {
            throw new Exception('User not saved');
        }
        $user->id = $userId;

        if (count($user->getPhotos()>0)) {
            $photoRepository = new PhotoRepository($this->db);
            foreach($user->getPhotos() as $photo) {
                $photoRepository->storePhoto($photo, $user);
            }
        }

        return $user;
    }

    public function removeUser(User $user) {
        $sql = 'DELETE FROM User where id=:id';
        $stm = $this->db->prepare($sql);
        $stm->execute(Array(':id' => $user->id));

    }

    public function getById($id)
    {
        $sql = 'SELECT * FROM User where id = :user_id';
        $stm = $this->db->prepare($sql);
        $stm->execute(array(':user_id' => $id));
        $stm->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stm->fetch();

        $sql = 'SELECT * FROM Photo where user_id = :user_id';
        $stm = $this->db->prepare($sql);
        $stm->execute(array(':user_id' => $id));
        $stm->setFetchMode(PDO::FETCH_CLASS, 'Photo');
        $photos = $stm->fetchAll();
        if(is_array($photos) && count($photos)>0) {
            $user->addPhotos($photos);
        }

        return $user;
    }
}