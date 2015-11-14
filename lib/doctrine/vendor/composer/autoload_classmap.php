<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname(dirname(dirname($vendorDir))).'/config';

return array(
    'AchatController' => $baseDir . '/../backend/src/bo/achat/AchatController.php',
    'Achat\\Achat' => $baseDir . '/../backend/src/be/Achat.php',
    'Achat\\AchatManager' => $baseDir . '/../backend/src/bo/achat/AchatManager.php',
    'Achat\\AchatPaiement' => $baseDir . '/../backend/src/be/AchatPaiement.php',
    'Achat\\AchatQueries' => $baseDir . '/../backend/src/bo/achat/AchatQueries.php',
    'Achat\\LigneAchat' => $baseDir . '/../backend/src/be/LigneAchat.php',
    'Achat\\LigneAchatManager' => $baseDir . '/../backend/src/bo/achat/LigneAchatManager.php',
    'Achat\\LigneAchatQueries' => $baseDir . '/../backend/src/bo/achat/LigneAchatQueries.php',
    'ArticleController' => $baseDir . '/../backend/src/bo/article/ArticleController.php',
    'Article\\ArticleManager' => $baseDir . '/../backend/src/bo/article/ArticleManager.php',
    'Article\\ArticleQueries' => $baseDir . '/../backend/src/bo/article/ArticleQueries.php',
    'Article\\TypeArticleManager' => $baseDir . '/../backend/src/bo/article/TypeArticleManager.php',
    'Article\\TypeArticleQueries' => $baseDir . '/../backend/src/bo/article/TypeArticleQueries.php',
    'Bo\\BaseAction' => $baseDir . '/../backend/src/bo/BaseAction.php',
    'Bo\\BaseController' => $baseDir . '/../backend/src/bo/BaseController.php',
    'Bo\\BaseManager' => $baseDir . '/../backend/src/bo/BaseManager.php',
    'Bo\\BaseQueries' => $baseDir . '/../backend/src/bo/BaseQueries.php',
    'BonSortieController' => $baseDir . '/../backend/src/bo/bonsortie/BonSortieController.php',
    'BonSortie\\BonSortie' => $baseDir . '/../backend/src/be/BonSortie.php',
    'BonSortie\\BonSortieManager' => $baseDir . '/../backend/src/bo/bonsortie/BonSortieManager.php',
    'BonSortie\\BonSortieQueries' => $baseDir . '/../backend/src/bo/bonsortie/BonSortieQueries.php',
    'BonSortie\\LigneBonSortie' => $baseDir . '/../backend/src/be/LigneBonSortie.php',
    'BonSortie\\LigneBonSortieManager' => $baseDir . '/../backend/src/bo/bonsortie/LigneBonSortieManager.php',
    'BonSortie\\LigneBonSortieQueries' => $baseDir . '/../backend/src/bo/bonsortie/LigneBonSortieQueries.php',
    'ClientController' => $baseDir . '/../backend/src/bo/client/ClientController.php',
    'Client\\Client' => $baseDir . '/../backend/src/be/Client.php',
    'Client\\ClientManager' => $baseDir . '/../backend/src/bo/client/ClientManager.php',
    'Client\\ClientQueries' => $baseDir . '/../backend/src/bo/client/ClientQueries.php',
    'Common\\DoctrineLogger' => $baseDir . '/../backend/src/bo/common/DoctrineLogger.php',
    'DoctrineORM\\Proxies\\__CG__\\Achat\\Achat' => $baseDir . '/../backend/src/bo/achat/lib/__CG__AchatAchat.php',
    'DoctrineORM\\Proxies\\__CG__\\Achat\\AchatPaiement' => $baseDir . '/../backend/src/bo/mareyeur/lib/__CG__AchatAchatPaiement.php',
    'DoctrineORM\\Proxies\\__CG__\\Achat\\LigneAchat' => $baseDir . '/../backend/src/bo/achat/lib/__CG__AchatLigneAchat.php',
    'DoctrineORM\\Proxies\\__CG__\\Client\\Client' => $baseDir . '/../backend/src/bo/achat/lib/__CG__ClientClient.php',
    'DoctrineORM\\Proxies\\__CG__\\Fournisseur\\Fournisseur' => $baseDir . '/../backend/src/bo/achat/lib/__CG__FournisseurFournisseur.php',
    'DoctrineORM\\Proxies\\__CG__\\Mareyeur\\Mareyeur' => $baseDir . '/../backend/src/bo/achat/lib/__CG__MareyeurMareyeur.php',
    'DoctrineORM\\Proxies\\__CG__\\Produit\\FamilleProduit' => $baseDir . '/../backend/src/bo/achat/lib/__CG__ProduitFamilleProduit.php',
    'DoctrineORM\\Proxies\\__CG__\\Produit\\Produit' => $baseDir . '/../backend/src/bo/achat/lib/__CG__ProduitProduit.php',
    'DoctrineORM\\Proxies\\__CG__\\Produit\\Stock' => $baseDir . '/../backend/src/bo/achat/lib/__CG__ProduitStock.php',
    'DoctrineORM\\Proxies\\__CG__\\Usine\\Usine' => $baseDir . '/../backend/src/bo/achat/lib/__CG__UsineUsine.php',
    'DoctrineORM\\Proxies\\__CG__\\Utilisateur\\Profil' => $baseDir . '/../backend/src/bo/achat/lib/__CG__UtilisateurProfil.php',
    'DoctrineORM\\Proxies\\__CG__\\Utilisateur\\Utilisateur' => $baseDir . '/../backend/src/bo/achat/lib/__CG__UtilisateurUtilisateur.php',
    'Facture\\Facture' => $baseDir . '/../backend/src/be/Facture.php',
    'FamilleProduitController' => $baseDir . '/../backend/src/bo/produit/FamilleProduitController.php',
    'FournisseurController' => $baseDir . '/../backend/src/bo/fournisseur/FournisseurController.php',
    'Fournisseur\\Fournisseur' => $baseDir . '/../backend/src/be/Fournisseur.php',
    'Fournisseur\\FournisseurManager' => $baseDir . '/../backend/src/bo/fournisseur/FournisseurManager.php',
    'Fournisseur\\FournisseurQueries' => $baseDir . '/../backend/src/bo/fournisseur/FournisseurQueries.php',
    'Log\\Loggers' => $baseDir . '/Loggers.php',
    'MareyeurController' => $baseDir . '/../backend/src/bo/mareyeur/MareyeurController.php',
    'Mareyeur\\Mareyeur' => $baseDir . '/../backend/src/be/Mareyeur.php',
    'Mareyeur\\MareyeurManager' => $baseDir . '/../backend/src/bo/mareyeur/MareyeurManager.php',
    'Mareyeur\\MareyeurQueries' => $baseDir . '/../backend/src/bo/mareyeur/MareyeurQueries.php',
    'ProduitController' => $baseDir . '/../backend/src/bo/produit/ProduitController.php',
    'Produit\\FamilleProduit' => $baseDir . '/../backend/src/be/FamilleProduit.php',
    'Produit\\FamilleProduitManager' => $baseDir . '/../backend/src/bo/produit/FamilleProduitManager.php',
    'Produit\\FamilleProduitQueries' => $baseDir . '/../backend/src/bo/produit/FamilleProduitQueries.php',
    'Produit\\Produit' => $baseDir . '/../backend/src/be/Produit.php',
    'Produit\\ProduitManager' => $baseDir . '/../backend/src/bo/produit/ProduitManager.php',
    'Produit\\ProduitQueries' => $baseDir . '/../backend/src/bo/produit/ProduitQueries.php',
    'Produit\\Stock' => $baseDir . '/../backend/src/be/Stock.php',
    'Produit\\StockManager' => $baseDir . '/../backend/src/bo/stock/StockManager.php',
    'Racine\\Bootstrap' => $baseDir . '/bootstrap.php',
    'StockController' => $baseDir . '/../backend/src/bo/stock/StockController.php',
    'Stock\\StockQueries' => $baseDir . '/../backend/src/bo/stock/StockQueries.php',
    'TypeArticleController' => $baseDir . '/../backend/src/bo/article/TypeArticleController.php',
    'UVd\\DoctrineFunction\\DateFormat' => $baseDir . '/../lib/DoctrineFunction/DateFormat.php',
    'UVd\\DoctrineFunction\\UnixTimestamp' => $baseDir . '/../lib/DoctrineFunction/UnixTimestamp.php',
    'UsineController' => $baseDir . '/../backend/src/bo/usine/UsineController.php',
    'Usine\\Usine' => $baseDir . '/../backend/src/be/Usine.php',
    'Usine\\UsineManager' => $baseDir . '/../backend/src/bo/usine/UsineManager.php',
    'Usine\\UsineQueries' => $baseDir . '/../backend/src/bo/usine/UsineQueries.php',
    'UtilisateurController' => $baseDir . '/../backend/src/bo/utilisateur/UtilisateurController.php',
    'Utilisateur\\Profil' => $baseDir . '/../backend/src/be/Profil.php',
    'Utilisateur\\Utilisateur' => $baseDir . '/../backend/src/be/Utilisateur.php',
    'Utilisateur\\UtilisateurManager' => $baseDir . '/../backend/src/bo/utilisateur/UtilisateurManager.php',
    'Utilisateur\\UtilisateurQueries' => $baseDir . '/../backend/src/bo/utilisateur/UtilisateurQueries.php',
    'tools\\Tool' => $baseDir . '/../backend/src/tools/Tool.php',
);
