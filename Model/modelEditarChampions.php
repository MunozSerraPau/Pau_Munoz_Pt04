<?php 
function modelAfegirCampio(PDO $connexio, string $nom, string $descripcio, string $recurs, string $rol) {
    echo "Estic al INSERT de Champ";
    try {
        $sql = "INSERT INTO campeones (name, description, resource, role, creator) VALUES (:name, :description, :resource, :role, :creator)";
        $statement = $connexio->prepare($sql);
        echo "Apunt del INSERT";

    } catch(PDOException $e) {
        echo $e;
        return "NoCreat";
    }



}

?>