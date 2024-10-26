<?php 
    /**
     * @Acctions - Obtenim tots els articles de la base de dades i els guardem a una array.
     * 
     * 
     * @connexio - La conexio amb la base de dades
     * @inici - El inici del registre d'on agaferem els articles
     * @articlesPerPagines - son la quantitat de registres que agaferem a aprtir de l'inici
     * 
     * @return - Retorna una array amb tots els registres de articles de la base de dades o "null" si hi ha algun porblema.
     */
    function selectModel(PDO $connexio, int $inici, int $champsPerPagines) {
        
        try {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM campeones	LIMIT $inici, $champsPerPagines";
            $campeons = $connexio->prepare($sql);

            $campeons->execute();

            $champs = $campeons->fetchAll();
            return $champs;

        } catch(PDOException $e) {
            return null;
        }
    }

    /**
     * @Acctions - Obtenim tots els articles de la base de dades i els guardem a una array.
     * 
     * 
     * @connexio - La conexio amb la base de dades
     * @inici - El inici del registre d'on agaferem els articles
     * @articlesPerPagines - son la quantitat de registres que agaferem a aprtir de l'inici
     * 
     * @return - Retorna una array amb tots els registres de articles de la base de dades o "null" si hi ha algun porblema.
     */
    function contarChampionsModel(PDO $connexio) :int{
        try {
            $sql = "SELECT FOUND_ROWS() as total";
            $totalCampeons = $connexio->prepare($sql);
            $totalCampeons->execute();

            $totalCampeons = $totalCampeons->fetch()['total'];
                
            return $totalCampeons;

        } catch(PDOException $e) {
            return 0;
        }
    }

    /**
     * @Acctions - Obtenim tots els articles de la base de dades i els guardem a una array.
     * 
     * 
     * @connexio - La conexio amb la base de dades
     * @inici - El inici del registre d'on agaferem els articles
     * @articlesPerPagines - son la quantitat de registres que agaferem a aprtir de l'inici
     * 
     * @return - Retorna una array amb tots els registres de articles de la base de dades o "null" si hi ha algun porblema.
     */
    function selectUsuariLogiModel(PDO $connexio, int $inici, int $articlesPerPagines, string $usuari) {
        
        try {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM campeones WHERE creator = :usuari	LIMIT $inici, $articlesPerPagines";
            $campeons = $connexio->prepare($sql);

            $campeons->execute(
                array(
                    ":usuari" => $usuari
                )
            );

            $champs = $campeons->fetchAll();
            return $champs;

        } catch(PDOException $e) {
            return null;
        }
    }

    /**
     * @Acctions - Obtenim tots els articles de la base de dades i els guardem a una array.
     * 
     * 
     * @connexio - La conexio amb la base de dades
     * @inici - El inici del registre d'on agaferem els articles
     * @articlesPerPagines - son la quantitat de registres que agaferem a aprtir de l'inici
     * 
     * @return - Retorna una array amb tots els registres de articles de la base de dades o "null" si hi ha algun porblema.
     */
    function contarChampionsUsuariLoginModel(PDO $connexio, string $usuari) :int{
        try {
            $sql = "SELECT FOUND_ROWS() as total";
            $totalCampeons = $connexio->prepare($sql);
            $totalCampeons->execute( );

            $totalCampeons = $totalCampeons->fetch()['total'];
                
            return $totalCampeons;

        } catch(PDOException $e) {
            return 0;
        }
    }

?>