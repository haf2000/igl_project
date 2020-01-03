<h1>TP igl laravel/VueJS</h1>
<h3>1- Introduction à l'application :  </h3>
<p>Pour la réalisation, nous avons opté pour la programmation des sept fonctionnalités suivantes : </p>
<ul>
 <li>Ajouter Etudiant</li>
 <li>Modifier Etudiant</li>
 <li>Supprimer Etudiant</li>
 <li>Ajoute Enseignant</li>
 <li>ModifierEnseignant</li>
 <li>SupprimerEnseignant</li>
 <li>Visualiser Livres et leurs disponibilités</li>
</ul> 
<p>Pour ce faire, nous avons opté pour vueJs en frontend plus précisément Vuetify. Pour le Backend, nous avons choisi le framework Laravel.</p>
<hr>
<h3>2- Versions :  </h3>
 <p> D'abord , veuillez executer les commandes suivantes pour vérifier les versions actuelles des logiciels utilisés : <p>
<div class="highlight highlight-source-shell">
<pre>php --version
git --version
composer --version
laravel --version</pre></div>
 <p>Pour la version de MySQL , vous pouvez la visualiser quand vous démarrer le Control panel de Xampp à coté du titre , sinon executer cette commande dans MySQL Command Line Client :</p>
 <div class="highlight highlight-source-shell">
<pre>select version() ;</pre></div>
</ul>
<hr>
<h3>3- Lancer l'application localement (en utilisant Xampp) :</h3>
<ol start="1"> 
 <li>Clone le repository en exécutant : </li>
</ol>
<div class="highlight highlight-source-shell">
<pre>git clone https://github.com/haf2000/igl_project.git</pre></div>
<ol start="2"> 
 <li>Démarrer le CMD et allez vers le répertoire du projet en executant : </li>
</ol>
<div class="highlight highlight-source-shell">
 <pre><span class="pl-smi">cd</span> <span class="pl-k">CheminVersProjet</span></pre></div>
 <ol start="3"> 
 <li>Installer les dépendances du Composer : </li>
</ol>
<div class="highlight highlight-source-shell">
 <pre>composer install</pre></div>
 <ol start="4"> 
 <li>Créez une copie de votre fichier .env : </li>
</ol>
<div class="highlight highlight-source-shell">
 <pre>cp .env.example .env</pre></div>
<p>Remarque : Si ça marche pas veuillez executer :</p> 
<div class="highlight highlight-source-shell">
 <pre>copy .env.example .env</pre></div>
<ol start="5"> 
 <li>Générer une clé de chiffrement d'application : </li>
</ol> 
<div class="highlight highlight-source-shell">
 <pre>php artisan key:generate</pre></div>
<ol start="6"> 
 <li>Créer une base de donnée nommée : <strong>igl_project</strong>, ou bien nommer la bdd de votre choix en modifiant les configurations de votre fichier .env </li>
</ol> 
<ol start="7"> 
 <li>Migrer la bdd et la remplir avec des données aléatoires : </li>
</ol> 
<div class="highlight highlight-source-shell">
 <pre>php artisan migrate
php artisan db:seed</pre></div>
<ol start="8"> 
 <li>Enfin , démarrer l'application en exécutant : </li>
</ol> 
<div class="highlight highlight-source-shell">
 <pre>php artisan serve</pre></div>
<hr>
<h3>3- Lancer l'application en utilisant Docker : </h3>
<h4>3.1- Pourquoi Docker ?</h4>
<p>Docker est un outil qui peut empaqueter une application et ses dépendances dans un conteneur isolé, qui pourra être exécuté sur n'importe quel serveur ». Il ne s'agit pas de virtualisation, mais de la conteneurisation.</p>
<h4>3.2- Conditions préalables</h4>
<ul>
 <li>Veuillez installer Docker , Virtual Box et Docker ToolBox.</li>
</ul>
<h4>3.3- Lancement de l'application : </h4>
<ol start="1"> 
 <li>Clone le repository en exécutant : </li>
</ol>
<div class="highlight highlight-source-shell">
<pre>git clone https://github.com/haf2000/igl_project.git</pre></div>
<ol start="2"> 
 <li>Ouvrir Docker Quickstart Terminal.</li>
</ol>
<ol start="3"> 
 <li>Construiser un environnement docker en éxecutant : </li>
</ol>
<div class="highlight highlight-source-shell">
<pre>docker-compose up -d --build database && docker-compose up -d --build app && docker-compose up -d --build web</pre></div>
<span>Si vous rencontrez cette erreur : <strong>SSL error: [SSL: TLSV1_ALERT_PROTOCOL_VERSION] tlsv1 alert protocol version (_ssl.c:661)</strong> , Veuillez executer la commande suivante : </span>
<div class="highlight highlight-source-shell">
<pre>export COMPOSE_TLS_VERSION=TLSv1_2</pre></div>
<ol start="3"> 
 <li>Aprés avoir construire nos 3 conteneurs, on doit executer quelque commandes dans le conteneur pour régler les problèmes de droits d'access et permissions aux différents repertoires en éxecutant ceci :</li>
</ol>
<div class="highlight highlight-source-shell">
<pre>docker exec -it app_esi bash</pre></div>
<p>Ensuite veuillez éxecuter ces commandes par séquences: </p>
<div class="highlight highlight-source-shell">
<pre>php artisan key:generate
php artisan config:cache
php artisan route:cache 
cd storage 
mkdir framework
cd framework
mkdir sessions cache views
cd ../../
chmod -R 777 storage
cd storage 
chown -R www-data:www-data framework
cd ../
php artisan config:cache
</pre></div>
<ol start="4"> 
 <li>Aprés avoir éxecuter les commandes précédentes , ouvrir un deuxième CMD dans le projet laravel et exécuter la commmande suivante :</li>
</ol>
<div class="highlight highlight-source-shell">
<pre>docker-compose up</pre></div>
<ol start="5"> 
 <li>Revenir au CMD précédent et lancer la commande suivante pour migrer la bdd et l'initialiser:</li>
</ol>
<div class="highlight highlight-source-shell">
<pre>php artisan migrate:fresh --seed
exit</pre></div>
<ol start="6"> 
 <li>Enfin visiter le site dans : IP_de_votre_machine:8000</li>
</ol>
<p>pour obtenir l'ip de la machine exécuter : <pre>docker-machine ip</pre></p>
<p>Comme ça notre application a été deployé en utilisant Docker avec success</p>
<hr>
<h3>4- Les tests unitaires : </h3>
<p>On a tester les requêtes en utilisant <strong>phpunit</strong>, on a choisis de tester que 3 fonctionnalités de ce qu'on a fait : </p>
<ol start="1">
 <li>Ajouter étudiant : tester le POST request, format json et le status code en retour : 201.</li>
 <li>Afficher étudiant : tester le GET request , format json et le status code en retour : 200.</li>
 <li>Supprimer étudiant :  tester le DELETE request ,tester le GET request de l'étudiant supprimé en retournant un status code : 404 not found pour vérifier sa supression totale.</li>
</ol>
<p>Pour éxecuter les tests faits veuillez executer la commande suivante : </p>
<div class="highlight highlight-source-shell">
 <pre>vendor/bin/phpunit</pre></div>
<hr>
<h3>5- Les tests en utilisant Selenium : </h3>
<ol start="1">
<li> Aller vers : <a href="https://chrome.google.com/webstore/detail/selenium-ide/mooikfkahbdckldjjndioackbalphokd">Selenium IDE</a></li>
 <li> Cliquer sur :<br><br> <img src ="https://github.com/haf2000/igl_livrabes/blob/master/img/AjouterEx.PNG"/></li>
 <li> Utiliser cette extension en cliquant sur : <br><img src="https://github.com/haf2000/igl_livrabes/blob/master/img/SE.PNG"/></li>
 <li> Cette fenêtre apparait , veuillez choisir : Open an existing project <br><br><img src="https://github.com/haf2000/igl_livrabes/blob/master/img/SE_fenetre.PNG"/></li>
 <li>Chosir le fichier dont le chemin dans notre projet : ./Selenium/App_ESI_Test.side</li>
 <li>Cliquer sur le bouton dont la flèche est verte si vous voulez executer tous les tests qui existent , sinon sélectionner le test voulu et cliquer sur le bouton dont la flèche est rouge <br><br><img src="https://github.com/haf2000/igl_livrabes/blob/master/img/fenetre.PNG"/></li>
 <li>Visualiser les résultats des tests.</li>
</ol>
<hr>
<h3>6- Documentation automatique des APIs : </h3>
<hr>
<h3>7- Nos livrables : </h3>
<p>voici notre diagramme de notre architecture SOA : <a href="https://github.com/haf2000/igl_livrabes/blob/master/Architecture%20de%20l'application.pdf">Diagramme SOA</a> </p>
<hr>











