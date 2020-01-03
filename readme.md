<h1>TP igl laravel/VueJS</h1>
<h3>1- Introduction à l'application :  </h3>

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
<hr>
<h3>4- Les tests unitaires : </h3>
<p>On a tester les requêtes en utilisant <strong>phpunit</strong>, on a choisis de tester que 3 fonctionnalités de ce qu'on a fait : </p>
<ol start="1">
 <li>Ajouter étudiant : tester le POST request, format json et le status code en retour : 201.</li>
 <li>Afficher étudiant : tester le GET request , format json et le status code en retour : 200.</li>
 <li>Supprimer étudiant :  tester le DELETE request ,tester le GET request de l'étudiant supprimé en retournant un status code : 404 not found pour vérifier sa suppression totale.</li>
</ol>
<p>Pour executetr les tests faits veuillez executer la commande suivante : </p>
<div class="highlight highlight-source-shell">
 <pre>vendor/bin/phpunit</pre></div>
<hr>
<h3>5- Les tests en utilisant Selenium : </h3>












