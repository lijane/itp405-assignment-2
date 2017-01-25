<?php

// Query 1 (with orderByTitle)
require 'DvdQuery.php';
use Database\Query\DvdQuery;

echo "<hr><h2>Query 1</h2><hr>";

$dvdQuery = new DvdQuery();
$dvdQuery->titleContains('Die');
$dvdQuery->orderByTitle();
$dvds = $dvdQuery->find();
?>
	<?php foreach ($dvds as $dvd):?>
	<div>
		<h3><?= $dvd->title ?></h3>
		<p>Genre: <?= $dvd->id ?></p>
		<p>Rating: <?= $dvd->rating_name ?></p>
	</div>
	
	<?php endforeach;?>

<?php

echo "<hr><h2> Query 2 </h2><hr>";

// Query 2 (without orderByTitle)
$dvdQuery = new DvdQuery();
$dvdQuery->titleContains('Die');
// $dvdQuery->orderByTitle();
// Because orderByTitle is not called here, the sorting should be the default insertion order
$dvds = $dvdQuery->find();
?>
	<?php foreach ($dvds as $dvd):?>
	<div>
		<h3><?= $dvd->title ?></h3>
		<p>Genre: <?= $dvd->id ?></p>
		<p>Rating: <?= $dvd->rating_name ?></p>
	</div>
	
	<?php endforeach;?>