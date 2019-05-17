<?php // content="text/plain; charset=utf-8"
require_once ('.\src\jpgraph.php');
require_once ('.\src\jpgraph_line.php');

/**************** Réccupération des valeurs dans la base de données **********************/
/*try{
    include("includes/conecte_db.php");
}
catch(Exception $e){
	$tableauDedistance = array();
	$req = "SELECT distance FROM distancem";
	foreach  ($db->query($req) as $row) {
		$tableauDedistance[] = $row['distance'];
	}
}*/
                 
//$distance = $tableauDedistance[];
$distance=array(119,119,119,120,119,111,61,1873,199,852,857,1374,1046,1050,1055,1969,1970,1966,1971,2251,2267);
// Setup the graph
$graph = new Graph(600,500); //taille graph largeur hauteur
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Graph-Distance Evolution | Delay: 1000 | (mm/s)');//titre
$graph->SetBox(false);

$graph->SetMargin(40,20,36,63);//marges

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array(1,2,3,4,5,6,7,8,9,10)); //temps
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($distance);
$graph->Add($p1);
$p1->SetColor("#FFA500");

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>

