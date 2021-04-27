<?php

declare(strict_types=1);

namespace Kata\Test;

use Kata\Entity\User;
use Kata\Repository\UserRepository;
use PDO;
use PHPUnit\Framework\TestCase;


class UserRepositoryTest extends TestCase
{

    protected static PDO $pdo;

    /* @var $userRepository UserRepository*/
    protected UserRepository $userRepository;

    protected array $data;

    public static function setUpBeforeClass():void {

       try {
            $host = 'mysql:host=172.25.0.2;dbname=kata_db';
            self::$pdo = new PDO($host, 'root', 'some_palabro');
        } catch (\Exception $e) {
           throw new \Exception ('MySQL conection is not working.');
        }
    }

    public function setUp():void {
        $user = new User('Geeky','info@geekshubs.com');
        $user->addPhotos([
                            ['']
                         ]);
        $this->data['user1'] = new User('Geeky','info@geekshubs.com');
        $this->userRepository = new UserRepository(self::$pdo);
    }

    public function tearDown():void{
        self::$pdo->query("set foreign_key_checks=0");
        self::$pdo->query("TRUNCATE User");
        self::$pdo->query("TRUNCATE Photo");
        self::$pdo->query("set foreign_key_checks=1");
    }

    public function testStoreUser() {
        $user = $this->data['user1'];
        $this->assertNull($user->id);
        $user = $this->userRepository->storeUser($user);
        $this->assertObjectHasAttribute('id', $user);
    }

    public function testStoreUserWithPhotos() {

        $user = $this->data["user1"];
        $this->assertNull($this->data["photo1"]->id);
        $this->assertNull($this->data["photo2"]->id);
        $this->assertNull($this->data["photo3"]->id);
        $user->addPhoto($this->data["photo1"]);
        $user->addPhoto($this->data["photo2"]);
        $user->addPhoto($this->data["photo3"]);

        $user = $this->userRepository->storeUser($this->data['user1']);
        $photos = $user->getPhotos();
        foreach($photos as $photo) {
            $this->assertGreaterThan(0, $photo->id);
        }
    }

    public function testGetUserById(){
        $user = $this->userRepository->storeUser($this->data['user1']);
        unset($user);
        $user = $this->userRepository->getById(1);
        $this->assertEquals($this->data['user1']->username, $user->username);
    }

    public function testGetUserByIdWithPhotos() {
        $user = $this->data["user1"];
        $user->addPhoto($this->data["photo1"]);
        $user->addPhoto($this->data["photo2"]);
        $user->addPhoto($this->data["photo3"]);
        $user = $this->userRepository->storeUser($this->data['user1']);
        unset($user);
        $user = $this->userRepository->getById(1);
        $this->assertEquals($this->data['user1']->username, $user->username);
        $this->assertEquals(3, count($user->getPhotos()));
    }

}
