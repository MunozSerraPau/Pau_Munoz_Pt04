<?php 
function modelAfegirCampio(PDO $connexio, string $nom, string $descripcio, string $recurs, string $rol, string $nickname) {
    try {
        $sql = "INSERT INTO campeones (name, description, resource, role, creator) VALUES (:namee, :descriptionn, :resourcee, :rolee, :creatorr)";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
            array(
            ':namee' => $nom, 
            ':descriptionn' => $descripcio,
            ':resourcee' => $recurs,
            ':rolee' => $rol,
            ':creatorr' => $nickname
            )
        );
        return "SiCreat";


    } catch(PDOException $e) {
        return "NoCreat";
    }

}

function modelComprovarNom (PDO $connexio, string $nom) {
    try {
        $sql = "SELECT * FROM campeones WHERE name = :nomChamp";
            $statement = $connexio->prepare($sql);
            $statement->execute( 
                array(
                ':nomChamp' => $nom)
            );

            if ($statement->rowCount() > 0){
                return "ChampDuplicat";
            } else {
                return "ChampNoDuplicat";
            }
    } catch(PDOException $e) {
        return "ChampDuplicat";
    }
}

function modelEliminarCampion(PDO $connexio, string $id) {
    try {
        $sql = "DELETE FROM campeones WHERE id = :idChamp";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
            array(
            ':idChamp' => $id
            )
        );

        return "ELIMINAT";
            
    } catch(PDOException $e) {
        return "NoELIMINAT";
    }
}

function modelModificarCampion(PDO $connexio, string $nom, string $descripcio, string $recurs, string $rol, string $id) {
    try {
        $sql = "UPDATE campeones SET name = :namee, description = :descriptionn, resource = :resourcee, role = :rolee WHERE id = :id";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
            array(
            ':namee' => $nom, 
            ':descriptionn' => $descripcio,
            ':resourcee' => $recurs,
            ':rolee' => $rol,
            ':id' => $id
            )
        );
        return "Actualitzat";


    } catch(PDOException $e) {
        return "NoActualitzat";
    }
}

function modelComprovarUsuariId (PDO $connexio, string $nom, string $id) {
    try {
        $sql = "SELECT * FROM campeones WHERE id = :idChamp AND creator = :nomCreator";
            $statement = $connexio->prepare($sql);
            $statement->execute( 
                array(
                ':idChamp' => $id,
                ':nomCreator' => $nom
                
                )
            );

            if ($statement->rowCount() > 0){
                return "LaCreatEll";
            } else {
                return "NoLaCreatEll";
            }
    } catch(PDOException $e) {
        return "ErrorBD";
    }
}

function modelObtenirDadesChamp (PDO $connexio, string $id) {
    try {
        $sql = "SELECT * FROM campeones WHERE id = :idChamp";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
                array(
                ':idChamp' => $id               
                )
            );

        $champ = $statement->fetch();
        return $champ;

    } catch(PDOException $e) {
        return "ErrorBD";
    }
}

?>