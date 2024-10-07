# Inici-usuaris-i-registre-de-sessions

### Objectiu

- En obrir el web sortiran tots els articles de forma pública sense excepció i sense opció d’inserir, editar o eliminar articles.
- A la mateixa pàgina principal trobarem una opció per a logar-se o enregistrar-se.
- Crear un formulari de inici de sessió i registre d’usuaris en una base de dades i posteriorment verificar quan inicien sessió els usuaris de la base de dades i llavors permetre’ls editar el contingut (els post de la paginació) si no iniciem sessió (usuari anònim) permetrem només veure els articles. Mireu com ho faríeu tenint en compte que el tractament de les dades que hi ha a la paginació no serà el mateix si ens validem que si no estem validats.
- S’haurà de comprovar si l’usuari ja existeix en qualsevol dels dos casos (inici sessió o registrar-se) i validar la contrasenya demanant-la dues vegades (registrar-se).
- S'ha de tenir en compte la fortalessa de la contrasenya, a més aquesta s'haurà de guardar encriptada.
- Si l’usuari comet un error a l’hora d’enregistrar-se, s’hauran de mantenir les dades al formulari actual.
- Una vegada validat, s’ha de mantenir la sessió de l’usuari almenys 40min activa.
- Cal treballar amb sessions i cookies. Valoreu en quins casos cal treballar amb sessions i quan amb cookies
