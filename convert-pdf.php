<?php
require_once("fpdf.php");


#recieving the form data
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$birthplace = $_POST['birthplace'];
// $situation = $_POST['situation'];
$husband = $_POST['husband'];

// $child = $_POST['child'];
$sons = $_POST['son'];
// $administrator = $_POST['admin'];
// $tuteurs = $_POST['tuteur'];
$tuteurD = $_POST['tuteurD'];

// $testaments = $_POST['testament'];
// $Ntestaments = $_POST['nTestament'];
// $donations = $_POST['donation'];
$nameNotaire = $_POST['nameNotaire'];
$lieuNotaire = $_POST['lieuNotaire'];
$dateNotation = $_POST['dateNotation'];

//$executeurs = $_POST['executeur'];

//var_dump($name);

//print_r($situation);
// foreach ($situation as $s) {
//     echo "$s <br>";
//   }
//echo $situation[];

//Tranformer le array en string
// $s = implode(",", $situation);

// $c = implode(",", $child);
// $son = implode(",", $sons);
// $admin = implode(",", $administrator);
// $tuteur = implode(",", $tuteurs);

// $testament = implode(",", $testaments);
// $Ntestament = implode(",", $Ntestaments);
// $donation = implode(",", $donations);

$pdf = new FPDF();
$pdf->AddPage();
 
$pdf->SetFont('arial','',30);
$pdf->Cell(30,5,"BASE : ",0,10);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"Ceci est mon testament",0,10);
// $pdf->Write(5,'Ceci est mon testament Je, soussigné(e) né(e) le … à … étant en pleine possession de mes 
// facultés mentales, déclare établir mes dispositions de dernières volontés ainsi qu’il suit : 
//  ');
/*
foreach ($_POST as $key => $value) {
  if (is_array($_POST[$key])) {
    $value = implode(",", $value);
  } 
  if (strpos($key, 'label') !== false) {
    $pdf->Cell(100, 10, $value, 0, 0);
  } else {
    $pdf->Cell(10, 10, $value, 0, 1);
    $pdf->Ln();
  }
}
*/
$pdf->SetFont('arial','',12);
$pdf->Ln();
$pdf->Cell(30,5,"Je soussigné(e) ". $name ." ". $lastname. " né(e) le " .$birthday . " à " .$birthplace. "",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"étant en pleine possession de mes facultés mentales, déclare établir mes dispositions de dernières ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"volontés ainsi qu’il suit : ",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Ce testament révoque toutes dispositions antérieures que j’aurai pu prendre par testament.",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"Je prive les personnes suivantes de tout droit dans ma succession : ",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Aux personnes suivantes : ",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Je lègue … % de mon patrimoine, en ce compris les biens suivants :",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Je me permets à mon partenaire de solliciter l’attribution préférentielle de notre logement et du mobilier",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"qui s’y trouve dont nous sommes propriétaire indivis.",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"En cas de prédécès de l’autre parent, ou si nous décédons au cours ou des conséquences d’un même,",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"événement je lègue l’ensemble de mes biens à mes enfants et je désigne comme administrateur des",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"biens de mes enfants.",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Je désigne … comme exécuteur testamentaire, afin de veiller à la bonne exécution de mes ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"dernières volontés prises ci-dessus.",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Fait à … le …",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Signature",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Fait à … le …",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Signature",0,10);
$pdf->Ln();
$pdf->SetFont('arial','',30);
$pdf->Cell(30,5,"Etape 2 - Enfants :",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"Décés d’un parent et administrateur des biens :",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"'Si je décède avant l’autre parent, je souhaite que les biens que mes enfants recevront ",0,0);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"dans ma succession soient administrés par ... L’administrateur est né le … à ..'",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"Décès de deux parents et administrateur des biens : ",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"'En cas de prédécès de l’autre parent ou si nous décédons au cours des conséquences ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"d’un même événement, je désigne … … comme administrateur des biens de mes enfants.",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"L’administrateur est né le …. À ….'",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Tuteur des enfants :",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"'Je désigne .. comme tuteur de mes enfants encore mineurs à mon décès.'",0,10);
$pdf->Ln();
$pdf->SetFont('arial','',30);
$pdf->Cell(30,5,"Etape 3 - Révocation testament : ",0,10);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"En cas de réponse OUI à la question “avez vous déjà un testament ?“ ",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Non pour l’existence d’un testament antérieur / OUI pour révoquer : “ ",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Alors supprimer la phrase “Ce testament révoque toute dispositions antérieures que ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"j’aurais pu prendre par testament.”",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"Si révocation donation notaire : alors ajouter",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"“Ce testament révoque toutes dispositions antérieures que j’aurai pu prendre par ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"testament notamment la donation consentie à mon épouse par-devant Maître ... notaire à  ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"… le … ”",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',30);
$pdf->Cell(30,5,"Etape 4 - Exécuteur testamentaire : ",0,10);
$pdf->Ln();
$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"> OUI pour désigner exécuteur testamentaire ",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"“Je désigne …( et …) comme exécuteur testamentaire afin de veiller à la bonne exécution ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"de mes dernières volontés prises ci-dessus.”",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"> OUI pour désigner exécuteur testamentaire alternatif : ",0,1);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"“Dans le cas où la personne désignée ci-dessus décède, je désigne .. comme exécuteur ",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"testamentaire alternatif afin de veiller à la bonne exécution de mes dernières volontés",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"prises ci-dessus.”",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',30);
$pdf->Cell(30,5,"Etape 5 - Dispositions ",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',20);
$pdf->Cell(30,5,">Legs :",0,1);
$pdf->Ln();

$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"> Si aucun leg:",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"supprimer la phrase je lègue...",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"Si leg %:",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"“A …. je lègue … % de mon patrimoine” ou de mon patrimoine si bien mobilier.:”",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"Si leg mobilier",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"“A …. je lègue … de mon patrimoine”",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"> Si réponse marié / uni / pacs questionnaire etape 1 : alors
",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"“Je souhaite que mon conjoint …  … résidant à … hérite les biens que vous avez laissé sans ",0,0);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"en avoir disposé ou à l’égard desquels les dispositions sont privées” ",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',30);
$pdf->Cell(30,5,">Déshériter :",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',14);
$pdf->Cell(30,5,"> Si oui ajouter la phrase : ",0,10);
$pdf->Ln();

$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"“Je prive les personnes suivantes de tout droit dans ma succession : ",0,0);
$pdf->Ln();
$pdf->SetFont('arial','',12);
$pdf->Cell(30,5,"prénom / nom / date et lieu naissance”",0,10);
$pdf->Ln();




//>Legs :
//de mes dernières volontés prises ci-dessus.”
// OUI pour désigner exécuteur testamentaire 

/*
if ($s != "Celibataire") {
    $pdf->Cell(30,10,"S. familiale ",0,0);
    $pdf->Cell(30,10,$s,0,1);

    $pdf->Cell(40,10,"Votre conjoint ",0,0);
    $pdf->Cell(40,10,$husband,0,1);
}
*/

// $pdf->Cell(50,10,"Avez vous un enfant ?",0,0);
/*
$pdf->Cell(40,10,$c,0,1);
if ($c != "Non") {
$pdf->Cell(60,10,"Nom prenom de votre enfant ?",0,0);
// $pdf->Cell(50,10,$son,0,1);
}

// $pdf->Cell(90,10,"Souhaitez-vous nommer un administrateur ?",0,0);
// $pdf->Cell(30,10,$admin,0,1);

// $pdf->Cell(90,10,"Souhaitez-vous nommer un Tuteur ?",0,0);
$pdf->Cell(30,10,$tuteur,0,1);

if ($c != "Non") {
// $pdf->Cell(90,10,"Nom et prenom du tuteur ?",0,0);
$pdf->Cell(30,10,$tuteurD,0,1);
}
// $pdf->Cell(90,10,"Avez-vous deja redige un testament ?",0,0);
$pdf->Cell(30,10,$testament,0,1);

// $pdf->Cell(170,10,"Souhaitez-vous que ce nouveau testament revoque ce que vous avez deja prevu ?",0,0);
$pdf->Cell(30,10,$Ntestament,0,1);

// $pdf->Cell(110,10,"Avez-vous deja consenti une donation entre epoux ?",0,0);
$pdf->Cell(30,10,$donation,0,1);

// $pdf->Cell(80,10,"Nom et prenom du notaire ?",0,0);
$pdf->Cell(30,10,$nameNotaire,0,1);

// $pdf->Cell(80,10,"Lieu d exercice du notaire ?",0,0);
$pdf->Cell(30,10,$lieuNotaire,0,1);

// $pdf->Cell(80,10,"Date de la donation ?",0,0);
$pdf->Cell(30,10,$dateNotation,0,1);
*/

$file = time().'.pdf';
$pdf->output($file,'D');



?>
