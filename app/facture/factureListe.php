<?php
require_once dirname(dirname(dirname(__FILE__))) . '/common/app.php';
if(!isset($_COOKIE['userId'])){
	header('Location: '.\App::getHome());
	exit();
}
$userId = $_COOKIE['userId'];
$etatCompte = $_COOKIE['etatCompte'];
$login = $_COOKIE['login'];
$profil = $_COOKIE['profil'];
$status = $_COOKIE['status'];
$codeUsine = $_COOKIE['codeUsine'];
?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Gestion des factures
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Liste des factures
            </small>
        </h1>
    </div><!-- /.page-header -->


    <div class="row">
        <div class="space-6"></div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                    <div class="col-lg-1">
                        <div class="btn-group">
                                    <button data-toggle="dropdown"
                                            class="btn btn-mini btn-primary dropdown-toggle tooltip-info"
                                            data-rel="tooltip" data-placement="top" title="Famille de produit" style="
                                            height: 32px;
                                            width: 80px;
                                            margin-top: -1px;
                                            margin-left: -40%;
                                        ">
                                        <i class="icon-group icon-only icon-on-right"></i> Action
                                    </button>

                                    <ul class="dropdown-menu dropdown-info">
                                        <li id='MNU_VALIDATION' class="disabled" ><a href="#" id="GRP_NEW">Valider </a></li>
                                        <li class="divider"></li>
                                        <li id='MNU_IMPRIMER' class="disabled"><a href="#" id="GRP_NEW">Imprimer </a></li>
                                        <li class="divider"></li>
                                        <li id='MNU_ANNULATION' class="disabled"><a href="#" id="GRP_EDIT">Annuler</a></li>
                                    </ul>
                                </div>
                    </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                        <h4 class="widget-title lighter">
                            <i class="ace-icon fa fa-star orange"></i>
                            Liste des factures
                        </h4>

                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                          <table id="LIST_FACTURES" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center" style="border-right: 0px none;">
                                    <label>
                                        <input type="checkbox" value="*" name="allchecked"/>
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th class="center" style="border-left: 0px none;border-right: 0px none;"></th>                               
                                <th style="border-left: 0px none;border-right: 0px none;">
                                    Date
                                </th>
                                <th style="border-left: 0px none;border-right: 0px none;">
                                    Numéro Facture
                                </th>
                                <th style="border-left: 0px none;border-right: 0px none;">
                                    Nom Client
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
            </div><!-- /.col -->
            <div class="col-sm-7">
                <div class="widget-container-span">
                    <div class="widget-box transparent">
                        <div class="widget-header">

                            <h4 class="lighter"></h4>
                            <div class="widget-toolbar no-border">
                                <ul class="nav nav-tabs" id="TAB_GROUP">

                                    <li id="TAB_INFO_VIEW" class="active">
                                        <a id="TAB_INFO_LINK" data-toggle="tab" href="#TAB_INFO">
                                            <i class="green icon-dashboard bigger-110"></i>
                                            Statistique
                                        </a>
                                    </li>
                                    <li id="TAB_MSG_VIEW">
                                        <a id="TAB_MSG_LINK" data-toggle="tab" href="#TAB_MSG">
                                            <i class="red icon-comments-alt bigger-110"></i>
                                            <span id="TAB_MSG_TITLE">...</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main padding-12 no-padding-left no-padding-right">
                                <div class="tab-content padding-4">
                                    <div id="TAB_INFO" class="tab-pane in active">
                                        <div>

                                            <div class="span12 infobox-container">
                                                <div class="infobox infobox-blue infobox-small infobox-dark" style="width:200px">
                                                        <div class="infobox-icon">
                                                            <i class="icon-pause"></i>
                                                        </div>

                                                        <div class="infobox-data">
                                                            <div class="infobox-content" id="INDIC_CPG_PAUSE">0</div>

                                                            <div class="infobox-content" style="width:150px">Factures validées</div>

                                                        </div>
                                                    </div>

                                                    <div class="infobox infobox-grey infobox-small infobox-dark" style="width:200px">
                                                        <div class="infobox-icon">
                                                            <i class="icon-calendar"></i>
                                                        </div>

                                                        <div class="infobox-data">
                                                            <div class="infobox-content" id="INDIC_CPG_SCHEDULED">0</div>

                                                            <div class="infobox-content" style="width:150px">Factures annulées</div>

                                                        </div>
                                                    </div>

                                                    <div class="space-6"></div>
                                                    <br/>

                                                

                                            </div>
                                        </div>
                                    </div>

                    <div id="TAB_MSG" class="tab-pane">
                        <div class="slim-scroll" data-height="100">
                            <div class="span12">

                              <div class="profile-user-info">
                    <div class="profile-info-row">
                        <div class="profile-info-name">Date facture </div>
                        <div class="profile-info-value">
                            <span id="FactureDate"></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name">Client </div>
                        <div class="profile-info-value">
                            <span id="nomClient"></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name">Destination </div>
                        <div class="profile-info-value">
                            <span id="origine"></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name">Pays </div>
                        <div class="profile-info-value">
                            <span id="pays"></span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name">Créé par  </div>
                        <div class="profile-info-value">
                            <span id="user"></span>
                        </div>
                    </div>
                </div>
                <h4 class="widget-title lighter">
                        <i class="ace-icon fa fa-star orange"></i>
                        Conteneur et Numero Plomb
                    </h4>
                    <div class="profile-info-row">
                                <div class="profile-info-name">Numero conteneur </div>
                                <div class="profile-info-value">
                                    <span id="PoidsTotal1"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name">Numero plomb </div>
                                <div class="profile-info-value">
                                    <span id="MontantHt1"></span>
                                </div>
                            </div>
<!--                             <h4 class="widget-title lighter"> -->
<!--                         <i class="ace-icon fa fa-star orange"></i> -->
<!--                         Liste des colis -->
<!--                     </h4> -->
<!--                 <table class="table table-bordered table-hover"id="tab_colis"> -->
<!--                             <thead> -->
<!--                                 <tr> -->
<!--                                         <th class="text-center">Désignation</th> -->
<!--                                         <th class="text-center">Nombre de colis</th> -->
<!--                                         <th class="text-center">Quantite</th> -->
<!--                                 </tr> -->
<!--                             </thead> -->
<!--                             <tbody> -->

<!--                             </tbody> -->
<!--                     </table> -->
                                
                <h4 class="widget-title lighter">
                            <i class="ace-icon fa fa-star orange"></i>
                            Liste des produits
                        </h4>
                        <table class="table table-bordered table-hover"id="tab_produit"> 
                           <thead>
                            <tr>
                                    <th class="text-center">Détail de colis</th>
                                            <th class="text-center">Désignation</th>
                                            <th class="text-center">Poids net</th>
                                            <th class="text-center">Prix unitaire</th>
                                            <th class="text-center">Montant</th>
                            </tr>
                        </thead>
				<tbody>
				
				</tbody>
			</table>
<!--                     <table class="table table-bordered table-hover"id="tab_produit"> -->
<!-- 				<thead> -->
<!--                                     <tr> -->
<!--                                             <th class="text-center">Nombre de colis</th> -->
<!--                                             <th class="text-center">Désignation</th> -->
<!--                                             <th class="text-center">Poids net</th> -->
<!--                                             <th class="text-center">Prix unitaire</th> -->
<!--                                             <th class="text-center">Montant</th> -->
<!--                                     </tr> -->
<!--                                 </thead> -->
<!-- 				<tbody> -->
					
<!-- 				</tbody> -->
<!-- 			</table> -->
                                
                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name">Total colis </div>
                                <div class="profile-info-value">
                                    <span id="totalColis"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name">Poids Total </div>
                                <div class="profile-info-value">
                                    <span id="PoidsTotal"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name">Montant HT </div>
                                <div class="profile-info-value">
                                    <span id="MontantHt"></span>
                                </div>
                            </div>
                             <div class="row">
                                <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-right"
                                                for="form-field-1"> Mode de paiement </label>
                                        <div class="col-sm-7">
                                                <div class="clearfix">
                                                    <select  id="modePaiement" class="col-xs-12 col-sm-10">
                                                                <option value="ESPECES">Especes</option>
                                                                <option value="CHEQUE">Cheque</option>
                                                                <option value="VIREMENT">Virement</option>
                                                        </select>
                                                </div>
                                        </div>
                                </div>
                            </div>
                            <div class="space-6"></div>
                            <div class="row">
                                <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-right"
                                                for="form-field-1"> No Cheque </label>
                                        <div class="col-sm-7">
                                                <div class="clearfix">
                                                        <input type="text" readonly id="numCheque" placeholder=""
                                                                class="col-xs-12 col-sm-10">
                                                </div>
                                        </div>
                                </div>
                            </div>
                            <div class="space-6"></div>
                            <div class="row">
                                <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-right"
                                                for="form-field-1"> Date de paiement </label>
                                        <div class="col-sm-7">
                                                <div class="clearfix">
                                                        <input type="text" readonly id="datePaiement" placeholder=""
                                                                class="col-xs-12 col-sm-10">
                                                </div>
                                        </div>
                                </div>
                            </div>
                            <div class="space-6"></div>
                            <div class="row">
                                <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-right"
                                                for="form-field-1"> Montant payé  (FCFA)</label>
                                        <div class="col-sm-7">
                                                <div class="clearfix">
                                                        <input type="text" class="bolder"  id="avance" name="avance" placeholder=""
                                                                class="col-xs-12 col-sm-10">
                                                </div>
                                        </div>
                                </div>
                            </div>
                            <div class="space-6"></div>
                            <div class="row">
                                <div class="form-group">
                                        <label class="col-sm-5 control-label no-padding-right"
                                                for="form-field-1"> Reliquat (FCFA)</label>
                                        <div class="col-sm-7">
                                                <div class="clearfix">
                                                    <input type="text" class="bolder" readonly id="reliquat" name="reliquat" placeholder=""
                                                                class="col-xs-12 col-sm-10">
                                                </div>
                                        </div>
                                </div>
                            </div>
                             <div class="space-6"></div>
                            <div class="row">
                                <div class="space-12"></div>
                                    <div class="form-group">
                                            <label class="col-sm-5 control-label no-padding-right"
                                                    for="form-field-1"> Reglé </label>
                                            <div class="col-sm-7">
                                                    <div class="clearfix">
                                                        <input type="checkbox" disabled="disabled" id="regleAchat" name="regleAchat" placeholder=""
                                                                    >
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                        
                                
                                <div style="float: right">
                        <button id="SAVE" class="btn btn-small btn-info" >
                                <i class="ace-icon fa fa-save"></i>
                                Enregistrer
                            </button>
<!--                             <div class="profile-info-row"> -->
<!--                                 <div class="profile-info-name">Montant TTC </div> -->
<!--                                 <div class="profile-info-value"> -->
<!--                                     <span id="MontantTtc"></span> -->
<!--                                 </div> -->
<!--                             </div> -->
                            
<!--                             <div class="profile-info-row"> -->
<!--                                 <div class="profile-info-name">Mode paiement </div> -->
<!--                                 <div class="profile-info-value"> -->
<!--                                     <span id="modePaiement"></span> -->
<!--                                 </div> -->
<!--                             </div> -->
<!--                             <div class="profile-info-row"> -->
<!--                                 <div class="profile-info-name">N° chèque </div> -->
<!--                                 <div class="profile-info-value"> -->
<!--                                     <span id="numCheque"></span> -->
<!--                                 </div> -->
<!--                             </div> -->
<!--                             <div class="profile-info-row"> -->
<!--                                 <div class="profile-info-name">Date Paiement </div> -->
<!--                                 <div class="profile-info-value"> -->
<!--                                     <span id="datePaiement"></span> -->
<!--                                 </div> -->
<!--                             </div> -->
<!--                             <div class="profile-info-row"> -->
<!--                                 <div class="profile-info-name">Avance </div> -->
<!--                                 <div class="profile-info-value"> -->
<!--                                     <span id="Avance"></span> -->
<!--                                 </div> -->
<!--                             </div> -->
<!--                             <div class="profile-info-row"> -->
<!--                                 <div class="profile-info-name">Reliquat </div> -->
<!--                                 <div class="profile-info-value"> -->
<!--                                     <span id="Reliquat"></span> -->
<!--                                 </div> -->
<!--                             </div> -->
                        </div>
                                            </div>
                                        </div>

                                    </div><!--End TAB_MSG -->



                                </div>
                            </div>
                        </div>
                    </div>

                </div><!--/.span6-->
            </div>
        </div><!-- /.row -->
    </div>
    </div>
    <script type="text/javascript">
            jQuery(function ($) {
            var oTableFactures= null;
            var nbTotalFactureChecked=0;
            var checkedFacture = new Array();
            // Check if an item is in the array
            
            checkedFactureContains = function(item) {
                for (var i = 0; i < checkedFacture.length; i++) {
                    if (checkedFacture[i] == item)
                        return true;
                }
                return false;
            };
            // Persist checked Message when navigating
            persistChecked = function() {
                $('input[type="checkbox"]', "#LIST_FACTURES").each(function() {
                    if (checkedFactureContains($(this).val())) {
                        $(this).attr('checked', 'checked');
                    } else {
                        $(this).removeAttr('checked');
                    }
                });
            };
             $('table th input:checkbox').on('click', function() {
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox').each(function() {
                    this.checked = that.checked;
                    if (this.checked)
                    {
                        checkedFactureAdd($(this).val());
                        //MessageSelected();
                        $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
			$('#TAB_MSG_VIEW').hide();
                        nbTotalFactureChecked=checkedFacture.length;
                    }
                    else
                    {
                        checkedFactureRemove($(this).val());
//                        MessageUnSelected();
                        $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
			$('#TAB_MSG_VIEW').hide();
                    }
                    $(this).closest('tr').toggleClass('selected');
                });
            });
            MessageSelected = function(click)
            {
                if (checkedFacture.length == 1){
                    loadFactureSelected(checkedFacture[0]);
                    $('#TAB_MSG_VIEW').show();
		    $('#TAB_GROUP a[href="#TAB_MSG"]').tab('show');
                }else
                {
                    $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
                    $('#TAB_MSG_VIEW').hide();
                    
                }
                if(checkedFacture.length==nbTotalFactureChecked){
                    $('table th input:checkbox').prop('checked', true);
                }
            };
            MessageUnSelected = function()
            {
               if (checkedFacture.length === 1){
                    loadFactureSelected(checkedFacture[0]);
		    $('#TAB_MSG_VIEW').show();
                    $('#TAB_GROUP a[href="#TAB_MSG"]').tab('show');
                }
                else
                {
                    $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
                    $('#TAB_MSG_VIEW').hide();
                    $("#BTN_MSG_GROUP").popover('destroy');
                    $("#BTN_MSG_CONTENT").popover('destroy');
                }
                $('table th input:checkbox').removeAttr('checked');
            };

            // Add checked item to the array
            checkedFactureAdd = function(item) {
                if (!checkedMessageContains(item)) {
                    checkedFacture.push(item);
                }
            };
            // Remove unchecked items from the array
            checkedFactureRemove = function(item) {
                var i = 0;
                while (i < checkedFacture.length) {
                    if (checkedFacture[i] == item) {
                        checkedFacture.splice(i, 1);
                    } else {
                        i++;
                    }
                }
            };
            checkedMessageContains = function(item) {
                for (var i = 0; i < checkedFacture.length; i++) {
                    if (checkedFacture[i] == item)
                        return true;
                }
                return false;
            };
             loadFactures = function() {
                nbTotalFactureChecked = 0;
                checkedFacture = new Array();
                var url =  '<?php echo App::getBoPath(); ?>/facture/FactureController.php';
                if (oTableFactures != null)
                    oTableFactures.fnDestroy();
                oTableFactures = $('#LIST_FACTURES').dataTable({
                    "oLanguage": {
                    "sUrl": "<?php echo App::getHome(); ?>/datatable_fr.txt"
                    },
                    "sDom": '<"top"i>rt<"bottom"lp><"clear">',
                    "aoColumnDefs": [
                        {
                            "aTargets": [0],
                            "bSort": false,
                            "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                                $(nTd).css('text-align', 'center');
                            },
                            "mRender": function(data, type, full) {
                                return '<label><input type="checkbox" id="' + data + '" value="' + data + '"><span class="lbl"></span></label>';
                            }
                        },
                        {
                            "aTargets": [1],
                            "bSortable": false,
                            "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                                $(nTd).css('text-align', 'center');
                            },
                            "mRender": function(data, type, full) {
                               var src = '<input type="hidden" id="stag' + full[0] + '" value="' + data + '">';
                                if (data == 0)
                                    src += '<span class=" tooltip-error" title="Non validé"><i class="ace-icon fa fa-wrench orange bigger-130 icon-only"></i></span>';
                                else if (data == 1)
                                    src += '<span class="badge badge-transparent tooltip-error" title="Validé"><i class="ace-icon fa fa-check green bigger-130 icon-only"></i></span>';
                                return src;
                            }
                        }
                    ],
                    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        persistChecked();
                        $(nRow).on('click', 'td:not(:first-child)', function(){
                            checkbox=$(this).parent().find('input:checkbox:first');
                            if(!checkbox.is(':checked')){
                                checkbox.prop('checked', true);;
                                checkedFactureAdd(aData[0]);
                                MessageSelected();
                                
                            }else{
                                checkbox.removeAttr('checked');
                                
                                checkedFactureRemove(aData[0]);
                                MessageUnSelected();
                            }
                        });
                    },
                    "fnDrawCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                       
                    },
                    "preDrawCallback": function( settings ) {
                       
                    },
                    "bProcessing": true,
                    "bServerSide": true,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "sAjaxSource": url,
                    "sPaginationType": "simple",
                    "fnServerData": function ( sSource, aoData, fnCallback ) {
                        aoData.push({"name": "ACTION", "value": "<?php echo App::ACTION_LIST; ?>"});
                        aoData.push({"name": "offset", "value": "1"});
                        aoData.push({"name": "rowCount", "value": "10"});
                        aoData.push({"name": "profil", "value": $.cookie('profil')});
                        aoData.push({"name": "codeUsine", "value": "<?php echo $codeUsine;?>"});
                        $.ajax( {
                          "dataType" : 'json',
                          "type" : "POST",
                          "url" : sSource,
                          "data" : aoData,
                          "success" : function(json) {
                              if(json.rc==-1){
                                 $.gritter.add({
                                    title: 'Notification',
                                    text: json.error,
                                    class_name: 'gritter-error gritter-light'
                                }); 
                              }else{
                                  $('table th input:checkbox').removeAttr('checked');
                                  fnCallback(json);
                                  nbTotalFactureChecked=json.iTotalRecords;
                              }
                                
                           }
                        });
                    }
                });
            };
            
            loadFactures();
            loadFactureSelected = function(factureId)
            {
              var url;
                 url = '<?php echo App::getBoPath(); ?>/facture/FactureController.php';

                $.post(url, {factureId: factureId, ACTION: "<?php echo App::ACTION_VIEW_DETAILS; ?>"}, function(data) {
                    data = $.parseJSON(data);
                    $('#TAB_MSG_TITLE').text("Numero facture: "+ data.numero);
                    $('#FactureDate').text(data.dateFacture);
                    $('#numFacture').text(data.numero);
                    $('#nomClient').text(data.nomClient);
                    $('#origine').text(data.adresse);
                    $('#pays').text(data.pays);
                    $('#user').text(data.user);
                    $('#totalColis').text(data.nbTotalColis);
                    $('#PoidsTotal').text(data.nbTotalPoids);
                    $('#MontantHt').text(data.montantHt);
                    $('#MontantTtc').text(data.montantTtc);
                    $('#modePaiement').text(data.modePaiement);
                    if(data.numCheque !==null && data.numCheque!=="")
                        $('#numCheque').text(data.numCheque);
                    else
                        $('#numCheque').text('Non dédini');
                    if(data.datePaiement !==null && data.datePaiement!=="")
                        $('#datePaiement').text(data.datePaiement);
                    else
                        $('#datePaiement').text('Non dédini'); 
                    //colis
                    $('#tab_colis tbody').html("");
                    var tableColis = data.colis;
                    var trColisHTML='';
                    $(tableColis).each(function(index, element){
                        trColisHTML += '<tr><td>' + element.libelle + '</td><td>' + element.nombreCarton + '</td><td>' + element.quantiteParCarton + '</td></tr>';
                    });
                    $('#tab_colis tbody').append(trColisHTML);
                    trColisHTML='';
                    
                    $('#tab_produit tbody').html("");
                    var table = data.ligneFacture;
                    var trHTML='';
                    $(table).each(function(index, element){
                        trHTML += '<tr><td>' + element.nbColis + '</td><td>' + element.produit + '</td><td>' + element.quantite + '</td><td>' + element.prixUnitaire + '</td><td>' + element.montant + '</td></tr>';
                    });
                    $('#tab_produit tbody').append(trHTML);
                    trHTML=''; 
                    var infoAvance = data.reglement;
                    var mtAv=0;
                    var rel=0;
                    if(infoAvance !==null) {
                    $(infoAvance).each(function(index, element){
                         mtAv += parseFloat(element.avance);
                    });
                    if(!isNaN(mtAv) ) {
                        rel = data.montantTtc - mtAv;
                    }
                    $('#Avance').text(mtAv);
                    $('#Reliquat').text(rel);
//                    } 
//                    
                    }
                    else {
                        $('#Avance').text("0");
                        $('#Reliquat').text(data.montantTtc);
                    }
             
              $('#TAB_GROUP a[href="#TAB_MSG"]').tab('show');
              $('#TAB_MSG_VIEW').show();
              }).error(function(error) { });
            };

        $("#MNU_VALIDATION").click(function()
            {
                if (checkedFacture.length == 0)
                    bootbox.alert("Veuillez selectionnez un facture");
                else if (checkedFacture.length == 1)
                {
                     bootbox.confirm("Voulez vous vraiment valider cet facture","Non","Oui", function(result) {
                    if(result){
                    var factureId = checkedFacture[0];
                    $.post("<?php echo App::getBoPath(); ?>/facture/FactureController.php", {factureId: factureId, ACTION: "<?php echo App::ACTION_ACTIVER; ?>"}, function(data)
                    {
                        if (data.rc == 0)
                        {
                            bootbox.alert("Facture validé");
                        }
                        else
                        {
                            bootbox.alert(data.error);
                        }
                    }, "json");
                    $("#MAIN_CONTENT").load("<?php echo App::getHome(); ?>/app/facture/listebonsFactureVue.php", function () {
                        });
                         }
                    });
                }
                else if (checkedFacture.length > 1)
                {
                	bootbox.alert("Veuillez selectionnez un seul achat SVP!");
                }
            });
             $("#MNU_IMPRIMER").click(function()
                {
                    if (checkedFacture.length == 0)
                    bootbox.alert("Veuillez selectionnez un facture");
                else if (checkedFacture.length == 1)
                {
                    var factureId = checkedFacture[0];
                    window.open('<?php echo App::getHome(); ?>/app/pdf/facturePdf.php?factureId='+factureId,'nom_de_ma_popup','menubar=no, scrollbars=no, top=100, left=100, width=1100, height=650');
                
                }
                else if (checkedFacture.length > 1)
                {
                	bootbox.alert("Veuillez selectionnez un seul achat SVP!");
                }
                 });
            });
        </script>