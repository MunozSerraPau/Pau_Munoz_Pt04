<?php 
// Pau Muñoz Serra

function modelUsuariExisteix(PDO $connexio, string $username, string $password) {
    try {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "DELETE FROM articles WHERE nickname = :username";
        $statement = $connexio->prepare($sql);
        
        $statement->execute( 
            array(
            ':username' => $username)
        );
        
        if ($statement->rowCount() > 0) {
            return "eliminat";
        } else {
            return "No s'ha ELIMINAR cap article";
        }
 
    } catch (PDOException $e) {
        $error = "Falla a la connexio a la Base de Dades";
    }
}



?>