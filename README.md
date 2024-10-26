# Inici-usuaris-i-registre-de-sessions

## Objectiu

- En obrir el web sortiran tots els articles de forma pública sense excepció i sense opció d’inserir, editar o eliminar articles.
- A la mateixa pàgina principal trobarem una opció per a logar-se o enregistrar-se.
- Crear un formulari de inici de sessió i registre d’usuaris en una base de dades i posteriorment verificar quan inicien sessió els usuaris de la base de dades i llavors permetre’ls editar el contingut (els post de la paginació) si no iniciem sessió (usuari anònim) permetrem només veure els articles. Mireu com ho faríeu tenint en compte que el tractament de les dades que hi ha a la paginació no serà el mateix si ens validem que si no estem validats.
- S’haurà de comprovar si l’usuari ja existeix en qualsevol dels dos casos (inici sessió o registrar-se) i validar la contrasenya demanant-la dues vegades (registrar-se).
- S'ha de tenir en compte la fortalessa de la contrasenya, a més aquesta s'haurà de guardar encriptada.
- Si l’usuari comet un error a l’hora d’enregistrar-se, s’hauran de mantenir les dades al formulari actual.
- Una vegada validat, s’ha de mantenir la sessió de l’usuari almenys 40min activa.
- Cal treballar amb sessions i cookies. Valoreu en quins casos cal treballar amb sessions i quan amb cookies

# Projecte: PAU_MUNOZ_PT04

Aquest projecte és una aplicació web estructurada en amb MVC (Model-Vista-Controlador) utilitzant PHP. L'objectiu del projecte és gestionar usuaris i en el meu cas he escollir campions del lol, incloent-hi funcionalitats de registre, inici de sessió, edició i eliminació de registres (campions).

## Estructura del Projecte

### 1. Controlador
La carpeta `Controlador` conté els fitxers que gestionen la lògica de l'aplicació i fent de intermediari entre el model i la vista.

- **controladorAfegirChamp.php**: Controlador per afegir nous campions.
- **controladorEditar.php**: Controlador per editar la informació de campions.
- **controladorEliminar.php**: Controlador per eliminar campions i comprovar que el id del camp l'hagi creat l'Usuari amb el que estem logeats.
- **controladorLogOut.php**: Controlador per tancar la sessió de l'usuari.
- **controladorUsuaris.php**: Controlador per gestionar tot el tema d'usuari, com el registrese, l'inici de sessió i el canvi de contrasenya. En cada un comprovem tots els camp que no estiguin buits i qeu compleixin alguns requisits que hem ficat (la contrasenya).

### 2. Model
La carpeta `Model` conté els fitxers que tenen la interacció amb la base de dades.

- **modelChampions.php**: Model per gestionar les dades relacionades amb els campions.
- **modelEditarChampions.php**: Model per actualitzar les dades dels campions.
- **modelUsuaris.php**: Model per gestionar les dades dels usuaris, com el registre i l'autenticació.

### 3. Vista
La carpeta `Vista` conté les plantilles de visualització que renderitzen la interfície d'usuari.

- **afegir.vista.php**: Vista per a la pàgina d'afegir campions.
- **canviarContrasenya.vista.php**: Vista per canviar la contrasenya de l'usuari.
- **index.vista.php**: Vista principal de l'aplicació.
- **login.php**: Vista per a la pàgina d'inici de sessió.
- **signUp.php**: Vista per a la pàgina de registre.
- **update.vista.php**: Vista per actualitzar la informació de campions o usuaris.

### 4. Style
La carpeta `Style` conté els fitxers CSS per a l'aplicació.

- **index.css**: Estils generals per a la pàgina principal.
- **login.css**: Estils específics per a la pàgina d'inici de sessió.
- **signUp.css**: Estils específics per a la pàgina de registre d'usuaris.

### 5. Base de Dades
- **pt04_pau_munoz.sql**: Fitxer SQL que conté l'estructura i les dades de la base de dades necessària per a l'aplicació.

### 6. Altres Fitxers
- **README.md**: Document de referència que descriu el projecte.
- **index.php**: Fitxer principal que serveix com a punt d'entrada per a l'aplicació.

## Configuració

1. Clona aquest repositori al teu entorn local.
2. Importa el fitxer `pt04_pau_munoz.sql` al teu sistema de gestió de bases de dades (com MySQL) per configurar la base de dades.
3. Configura la connexió a la base de dades en els models segons sigui necessari.
4. Executa l'aplicació en un servidor compatible amb PHP, com XAMPP o WAMP.

## Funcionalitats

- **Registre d'Usuaris**: Els usuaris es poden registrar a la plataforma.
- **Inici de Sessió**: Els usuaris poden iniciar sessió i accedir a la plataforma.
- **Gestió de Campions**: Els usuaris poden afegir, editar i eliminar campions.
- **Canvi de Contrasenya**: Els usuaris poden actualitzar la seva contrasenya.
- **Tancar Sessió**: Els usuaris poden tancar sessió de manera segura.

## Tecnologies Utilitzades

- **PHP**: Llenguatge de programació per a la lògica del servidor.
- **MySQL**: Sistema de gestió de bases de dades.
- **HTML i CSS**: Per a l'estructura i el disseny de la interfície d'usuari.

## Autor

- **Nom**: Pau Muñoz

## Llicència

Aquest projecte està llicenciat sota [la teva llicència preferida, per exemple, MIT License].
