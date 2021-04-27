<?php


namespace Kata\Repository;


class PhotoRepository {

    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function storePhoto(Photo $photo, User $user)
    {
        $sql = 'INSERT INTO Photo(user_id, url_photo) VALUES (:user_id, :url_photo)';
        $stm = $this->db->prepare($sql);
        $stm->execute(array(':user_id' => $user->id, ':url_photo' => $photo->url_photo));
        $photoId = $this->db->lastInsertId();
        if (!$photoId) {
            throw new Exception('Photo not saved');
        }
        $photo->id = $photoId;

        return $photo;
    }
}