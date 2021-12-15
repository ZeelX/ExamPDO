<?php
include 'Connexion.php';
class Getter extends Connexion
{

    public function addArtist($name, $age)
    {
        $pdo = $this->connexion();
        $query = 'INSERT INTO artist(`name`,`age`) VALUES (:name,:age)';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':name' => $name,
            ':age' => $age
        ]);
    }

    public function modifyArtist($name, $age, $id)
    {
        $pdo = $this->connexion();
        $query = 'UPDATE `artist` SET name = :name,
                   age = :age WHERE  id = :id';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':name' => $name,
            ':age' => $age,
            ':id' => $id
        ]);
    }

    public function getAllArtist(): array
    {
        $pdo = $this->connexion();
        $query = 'SELECT * FROM `artist`';
        $resultats = $pdo->prepare($query);
        $resultats->execute();
        return $rows = $resultats->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getOneartist(int $id): array
    {
        $pdo = $this->connexion();
        $query = 'SELECT artist.name, artist.age FROM `artist`  WHERE id= :id';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':id' => $id]
        );
        return $rows = $resultats->fetch(PDO::FETCH_ASSOC);

    }
    public function getSongOfArtist(int $id): array
    {
        $pdo = $this->connexion();
        $query = 'SELECT * FROM `song` WHERE artist_id= :id';
        $resultats = $pdo->prepare($query);
        $resultats->execute([':id' => $id]);
        return $rows = $resultats->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addSong($artist_id, $title, $time, $published_at)
    {
        $pdo = $this->connexion();
        $query = 'INSERT INTO song(`artist_id`,`title`,`time`,`published_at`) VALUES (:artist_id,:title, :time,:published_at)';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':artist_id' => $artist_id,
            ':title' => $title,
            ':time' => $time,
            ':published_at' => $published_at
        ]);

    }

    public function modifySong($artist_id, $title, $time, $published_at, $id)
    {
        $pdo = $this->connexion();
        $query = 'UPDATE `song` SET artist_id = :artist_id,title= :title,
            time =:time, published_at =:published_at
                WHERE  id = :id';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':artist_id' => $artist_id,
            ':title' => $title,
            ':time' => $time,
            ':published_at' => $published_at,
            ':id' => $id
        ]);
    }

    public function getAllSong(): array
    {
        $pdo = $this->connexion();
        $query = 'SELECT * FROM `song` join artist ON artist_id=artist.id ';
        $resultats = $pdo->prepare($query);
        $resultats->execute();
        return $rows = $resultats->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getSearchedSong($name): array
    {
        $pdo = $this->connexion();
        $query = 'SELECT * FROM `song` join artist ON artist_id=artist.id WHERE title LIKE :name ';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':name' => '%'.$name.'%'
        ]);
        return $rows = $resultats->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete($table, $id)
    {
        try {

            $pdo = $this->connexion();
            $query = 'DELETE FROM :table WHERE id=:id';
            $resultats = $pdo->prepare($query);
            $resultats->execute(
                [
                    ':table' => $table,
                    ':id' => intval($id)
                ]
            );

        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }
}
