<?php
require_once("fpdf.php");

#recieving the form data
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$birthplace = $_POST['birthplace'];
$situations = $_POST['situation'];
$conjoint = $_POST['conjoint'];

$childs = $_POST['child'];
$son = $_POST['son'];
$admins = $_POST['admin'];
$tuteurs = $_POST['tuteur'];
$tuteurN = $_POST['tuteurName'];

$testaments = $_POST['testament'];
$Ntestaments = $_POST['nTestament'];
$donations = $_POST['donation'];
$nameNotaire = $_POST['nameNotaire'];
$lieuNotaire = $_POST['lieuNotaire'];
$dateNotation = $_POST['dateNotation'];

$executeurs = $_POST['executeur'];
$nameExecuteur = $_POST['nameExecuteur'];
$lieuExecuteur = $_POST['lieuExecuteur'];

$executeurAlternatifs = $_POST['executeurAlternatif'];

$executAltern = $_POST['executAltern'];
$villeExecuteurAlternatif = $_POST['executeurAlternatif'];


$legsParticuliers = $_POST['legsParticulier'];
$legsOrganismes = $_POST['legsOrganisme'];
$conjointHerites = $_POST['conjointHerite'];
$desheriterQuelquns = $_POST['desheriterQuelqun'];

$descriptionLeg = $_POST['descriptionLeg'];

$legsOrganismeBienfaisances = $_POST['legsOrganismeBienfaisance'];
$denominationName = $_POST['denominationName'];
$denominationNumber = $_POST['denominationNumber'];
$denominationDescription = $_POST['denominationDescription'];
$denominationVille = $_POST['denominationVille'];
$conjointHeritierBiens = $_POST['conjointHeritierBiens'];

$denominationHeritier = $_POST['denominationHeritier'];
$denominationVilleHeritier = $_POST['denominationVilleHeritier'];
var_dump($denominationVilleHeritier);
die();
$desheriterQuelqunB = $_POST['desheriterQuelqunB'];
$desheriterName = $_POST['desheriterName'];

$lieuSignature = $_POST['lieuSignature'];
$dateSignature = $_POST['dateSignature'];


//desheriterQuelqun
//denominationVilleHeritier
//denominationVille
//denominationDescription

//denominationNumber
//legDesignation

//Tranformer le array en string
 $situation = implode(",", $situations);
// var_dump($situation);
// die();
$child = implode(",", $childs);
$admin = implode(",", $admins);
$tuteur = implode(",", $tuteurs);
$testament = implode(",", $testaments);
$Ntestament = implode(",", $Ntestaments);
$donation = implode(",", $donations);
$executeur = implode(",", $executeurs);
$executeurAlternatif = implode(",", $executeurAlternatifs);

$legsParticulier = implode(",", $legsParticuliers);
$legsOrganisme = implode(",", $legsOrganismes);
$conjointHerite = implode(",", $conjointHerites);
$desheriterQuelqun = implode(",", $desheriterQuelquns);
$legsOrganismeBienfaisance = implode(",", $legsOrganismeBienfaisances);
$conjointHeritierBien = implode(",", $conjointHeritierBiens);
//$denominationVilleHeritier = implode(",", $denominationVilleHeritierS);
$desheriterQuelqun = implode(",", $desheriterQuelqunB);


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
$pdf->Cell(30,5,"Je soussigné(e) ". $name ." ". $lastname. " né(e) le " .$birthday . " à " .$birthplace. "",0,1);
$pdf->Ln();
$pdf->Cell(30,5,"MOTS :".$situation."_".$conjoint."_".$child."_".$son."_".$tuteur."_".$admin."_".$tuteurN."_",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"MOTS :".$testament."_".$Ntestament."_".$donation."_".$nameNotaire."_".$lieuNotaire."_".$dateNotation."_",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"MOTS :".$executeur."_".$nameExecuteur."_".$lieuExecuteur."_".$executeurAlternatif."_".$executAltern."_",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"MOTS :".$villeExecuteurAlternatif."_".$legsParticulier."_".$dispositionTestament."_".$legsOrganisme."_".$conjointHerite."_",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"MOTS :".$desheriterQuelqun."_".$descriptionLeg."_".$legsOrganismeBienfaisances."_",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"MOTS :".$denominationName."_".$denominationNumber."_".$denominationDescription."_".$denominationVille."_".$conjointHeritierBien."_",0,0);
$pdf->Ln();
$pdf->Cell(30,5,"MOTS :".$denominationHeritier."_".$denominationVilleHeritier."_".$desheriterQuelqunB."_".$desheriterName."_".$lieuSignature."_".$dateSignature."",0,0);
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


$file = time().'.pdf';
$pdf->output($file,'D');

?>
