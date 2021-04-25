# Etapes à suivre : 
(note : Le site a été réalisé avec Laragon comme serveur local et PHPMyAdmin comme gestionnaire de base de données. Les étapes d'execution du site ont été rédigées en suposant que l'utilisateur possède ces deux outils.)

1) Effectuez un clone du repository dans le dossier 'www' de votre répertoire Laragon.
2) Le dossier 'www' contient par défault un fichier 'index.php'. Si ce n'est pas déjà fait, supprimez ou renommez ce fichierr afin d'avoir l'accès au répertoire du site. 
3) Exécutez Laragon.exe. Lorsque Laragon est ouvert, cliquer sur 'Démarrer' puis sur 'Base de données'.
4) Une page de navigateur s'ouvre, et demande la connexion à PHPMyAdmin. L'identifiant par défault est 'root' sans mot de passe. Si vous utilisez d'autres identifiants, il faudra les  écrire dans le code du fichier 'connect-db.php' dans le répertoire du site. 
5) Une fois connecté à PHPMyAdmin sur votre navigateur, cliquez sur 'Nouvelle base de données', donnez lui le nom 'utilisateurs_test', puis validez.
6) Dans le répertoire du site, récupérez le fichier 'utilisateurs_test.sql' du dossier 'Base de données', et glissez le dans la base de données vierge tout juste créée. Appuyez sur exéctuer.
7) A ce stade le site devrait fonctionner. Ouvrez un nouvel onglet de votre navigateur et tapez 'localhost'. Vous devriez voir apparaître le nom du répertoire du site, cliquez dessus et le site s'éxecute.
