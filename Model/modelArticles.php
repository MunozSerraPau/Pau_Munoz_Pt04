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
    function selectModel(PDO $connexio, int $inici, int $articlesPerPagines) {
        try {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM articles	LIMIT $inici, $articlesPerPagines";
            $articles = $connexio->prepare($sql);

            $articles->execute();

            $articles = $articles->fetchAll();
            return $articles;

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
    function contarArticlesModel(PDO $connexio) :int{
        try {
            $sql = "SELECT FOUND_ROWS() as total";
            $totalArticles = $connexio->prepare($sql);

            $totalArticles->execute();

            $totalArticles = $totalArticles->fetch()['total'];
                
            return $totalArticles;

        } catch(PDOException $e) {
            return 0;
        }
    }



?>