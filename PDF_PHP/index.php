<?php

// CLIQUE SUR BOUTON CERTIFICATION
// AJOUTE EN BASE LE FAIT QUE UN INSCRIT A EU UNE CERTIFICATION SUR UNE FORMATION



// CREER PDF AVEC NOM PRENOM ET NOM DE LA FORMATION
// VALEUR RECU PAR POST nom , prenom , nom formation
$formation="La meilleure formation";
$nom="goudal";
$prenom="mathys";

require('fpdf.php');

class PDF extends FPDF
{
    // En-tête
    function Header()
    {
        // Logo
        //$this->Image('./logo2.png',55,12,100);
        // Saut de ligne
        $this->Ln(30);
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 10
        $this->SetFont('Times','I',10);
        // Numéro de page
        $this->Cell(0,10,'FORMAFLIX - 2021 - BG \'s Coorporate TM',0,0,'C');
    }
}

// Instanciation du PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();

// Saut de lignes
$pdf->Ln(25);

// TITRE 
$pdf->SetFont('Times','',32);
$pdf->SetFillColor(255,255,255);
$titre = "CERTIFICATION";
$titre = utf8_decode($titre);
$pdf->Multicell(190,10,$titre,0,'C', TRUE);

// TITRE 
$pdf->SetFont('Times','',32);
$pdf->SetFillColor(255,255,255);
$personne = "Décerné à : ".strtoupper($nom)." ".strtoupper($prenom)."\nEn date du ".date("j F Y");
$personne = utf8_decode($personne);
$pdf->Multicell(190,10,$personne,0,'C', TRUE);
// Saut de lignes
$pdf->Ln(10);

// Bloc 1
$pdf->SetFont('Times','',18);
$pdf->SetFillColor(255,255,255);
$txt1 = "Vous avez obtenu une certification pour avoir suivis la formation :\n";
$txt1 = utf8_decode($txt1.$formation);
$pdf->Multicell(190,10,$txt1,0,'C', TRUE);



// Création du PDF
$fichier ="certification_".$nom."_".$prenom."_".$formation.".pdf";
$pdf->Output($fichier,'F');

// Redirection vers le PDF
header('location: '.$fichier);
?> 