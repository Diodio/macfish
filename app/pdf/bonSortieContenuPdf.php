<?php
$paramsConnexion = parse_ini_file("../../config/parameters.ini");
$hostname = $paramsConnexion['host'];
$database = $paramsConnexion['dbname'];
$username = $paramsConnexion['user'];
$password = $paramsConnexion['password'];
$connexion = mysqli_connect($hostname, $username, $password) or trigger_error(mysqli_error(), E_USER_ERROR);
mysqli_set_charset($connexion, "utf8");
mysqli_select_db($connexion, $database);
$sql = "SELECT * FROM client,bon_sortie WHERE client.id=client_id AND client.id=1";
$Result = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$row = mysqli_fetch_array($Result);
//Cette requete permet de recuperer les produits d'un achat
$bonSortieId=$_GET['bonSortieId'];
$sqlProduit="SELECT p.libelle designation,p.prixUnitaire prixUnitaire,
							bsl.quantite quantite FROM bon_sortie bs, 
							ligne_bonsortie bsl, produit p WHERE
							 bs.id=bsl.bonSortie_id 
							 AND bsl.produit_id=p.id 
							 AND bs.id=" . $bonSortieId;
$ResultProduit = mysqli_query($connexion, $sqlProduit) or die(mysqli_error($connexion))
?>

<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }

-->
</style>
<page backcolor="#FEFEFE" backimg="" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 40%; ">
                <span style="font-size: 20px;color:blue" >MACFISH</span>
                <br>
                 <span style="font-size: 20px;color:blue" >PRODUCTION SUARL</span>
                 <br><br>
                <span >TEL : 338218470 / 338363512</span>
            </td>
            <td style="width: 40%;">
                <span style="margin-left:30px;"></span>
            </td>
            <td style="width: 25%; color: #444444;">
                Dakar, le <?php echo date("d-m-Y");  ;?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:40%;"></td>
            <td style="width:30%; "><span  style="font-size: 25px;" >BON DE SORTIE</span></td>
            <td >Numero: <?php echo $row['numeroBonSortie']; ?></td>
        </tr>
    </table>
    
    <table cellspacing="0" style="color:#444444";width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td >
                Mareyeur: <?php echo $row['nom']; ?>
            </td>
        </tr>
        <tr>
        <td >
                Origine: <?php echo $row['adresse']; ?>
        </td>
        </tr>
        <tr>
        <td >
                Chauffeur: <?php echo $row['nomChauffeur']; ?>
        </td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="color:#444444;width: 100%; text-align: left; font-size: 14px">
        <tr>
        <td >
                Chauffeur: <?php echo $row['nomChauffeur']; ?>
        </td>
        </tr>
        <tr>
        <td >
                Numero Container: <?php echo $row['numeroContainer']; ?>
        </td>
        </tr>
        <tr>
        <td >
                Numero Plomb: <?php echo $row['numeroPlomb']; ?>
        </td>
        </tr>
    </table>
       
    
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 35%">Désignation</th>
            <th style="width: 35%; text-align: right">Prix Unitaire</th>
            <th style="width: 30%; text-align: right;">Quantité(kg)</th>
        </tr>
    </table>
    
<?php
    $total =0;
    $totalPrix=0;
   while ($rowProduit = mysqli_fetch_array($ResultProduit)) {
       $total =$total+ $rowProduit['quantite'];
       $totalPrix =$totalPrix+ $rowProduit['prixUnitaire'];
?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: left; font-size: 10pt;">
        <tr>
            <td style="width: 35%; text-align: left"><?php echo $rowProduit['designation']; ?></td>
            <td style="width: 35%; text-align: right"><?php echo $rowProduit['prixUnitaire']; ?></td>
            <td style="width: 30%; text-align: right;"><?php echo $rowProduit['quantite']; ?> </td>
        </tr>
    </table>
<?php
    }
?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <th style="width: 20%; text-align: left;">Total : </th>
            <th style="width: 50%; text-align: right;"><?php echo number_format($totalPrix, 2, ',', ' '); ?> </th>
            <th style="width: 30%; text-align: right;"><?php echo number_format($total); ?> kg</th>
        </tr>
    </table>
    <br>
    
    <nobreak>
        <br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:25%;">Le Peseur</td>
                <td style="width:25%"></td>
                <td style="width:38%"></td>
                <td style="width:25%"> Le Mareyeur</td>
            </tr>
        </table>
    </nobreak>
</page>
