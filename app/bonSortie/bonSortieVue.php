<?php
require_once dirname(dirname(dirname(__FILE__))) . '/common/app.php';
if (!isset($_COOKIE['userId'])) {
	header('Location: ' . \App::getHome());
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
			Bon de Sortie <small> <i class="ace-icon fa fa-angle-double-right"></i>
				Destockage
			</small>
		</h1>
	</div>
	<!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->


			<div class="col-sm-5">

				<div class="row">
					<div class="col-sm-4">
						<label> Client </label>
					</div>
					<div class="col-sm-6">
						<select id="CMB_CLIENTS" data-placeholder="" style="width: 100%">
							<option value="*" class="clients">Nom Client</option>
						</select>
					</div>
				</div>
				<div class="space-6"></div>
				<div class="row">
					<div class="col-sm-4">
						<label> Origine </label>
					</div>
					<div class="col-sm-6">
						<select id="CMBORIGINES" data-placeholder="" style="width: 100%">
							<option value="*" class="usines">Usine</option>
						</select>
					</div>
				</div>
				<div class="space-6"></div>
				<div class="row">
					<div class="col-sm-4">
						<label> Numero Container</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="numContainer" placeholder=""
							style="width: 100%" class="col-xs-10 col-sm-7">
					</div>
				</div>
				<div class="space-6"></div>
				<div class="row">
					<div class="col-sm-4">
						<label> Numero Plomb</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="numeroPlomb" placeholder=""
							style="width: 100%" class="col-xs-10 col-sm-7">
					</div>
				</div>
			</div>
			<div class="col-sm-5" style="margin-left: 12%">
				<div class="row">
					<div class="col-sm-5">
						<label> Numero Bon de sortie</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="numeroBonSortie" placeholder=""
							style="width: 100%" class="col-xs-10 col-sm-7">
					</div>
				</div>
				<div class="space-6"></div>
				<div class="row">
					<div class="col-sm-5">
						<label> Date Bon de sortie</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="dateBonSortie" placeholder=""
							style="width: 100%" class="col-xs-10 col-sm-7">
					</div>
				</div>
				<div class="space-6"></div>
				<div class="row">
					<div class="col-sm-5">
						<label> Numero Camion</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="numeroCamion" placeholder=""
							style="width: 100%" class="col-xs-10 col-sm-7">
					</div>
				</div>
				<div class="space-6"></div>
				<div class="row">
					<div class="col-sm-5">
						<label>Chauffeur</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="nomChauffeur" placeholder=""
							style="width: 100%" class="col-xs-10 col-sm-7">
					</div>
				</div>
				<div class="space-6"></div>
				<div class="row">
					<div class="col-sm-5">
						<label> Destination</label>
					</div>
					<div class="col-sm-6">
						<select id="CMBDESTINATIONS" data-placeholder="" style="width: 100%">
							<option value="*" class="usines">Usine</option>
						</select>
					</div>
				</div>
			</div>

		</div>
		<div class="row clearfix">
			<div class="col-md-12 column">
				<a id="add_row" class="btn btn-primary btn-sm" title="Ajouter un produit">
				<i	class="ace-icon fa fa-plus-square"></i> </a>
					 <a id='delete_row'
					class="btn btn-danger btn-sm" title="Supprimer un produit"
					alt="Supprimer une ligne"> <i class="ace-icon fa fa-minus-square"></i>
				</a>
			</div>
		</div>
		<div class="space-6"></div>
		<div class="row clearfix">
			<div class="col-md-12 column">
				<table class="table table-bordered table-hover" id="tab_logic">
					<thead>
						<tr>
							<th class="text-center">N0</th>
							<th class="text-center">Désignation</th>
							<th class="text-center">Quantité(kg)</th>
						</tr>
					</thead>
					<tbody>
						<tr id='addr0'>
							<td>1</td>
							<td><select id="designation0" name="designation0"
								class="col-xs-10 col-sm-10">
									<option value="-1" class="designations0">sélectionnez un
										produit</option>
							</select>
							</td>
							<td><input type="text" id="qte0" name='qte0' class="form-control qte" />
							</td>
						</tr>
						<tr id='addr1'></tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 column">
				<div class="col-sm-3"></div>
				<div class="col-sm-3"></div>

				<div class="col-sm-3" style="margin-left: 76%;">
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right"
							for="form-field-1"> Poids Total </label>
						<div class="col-sm-8">
							<input type="text" id="poidsTotal" name="poidsTotal"
								placeholder="" class="col-xs-12 col-sm-12">
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row" style="margin-top: 12px;">
<!-- 			<div class="col-md-6 column"> -->
<!-- 				<button id="SAVE" class="btn btn-small btn-info pull-right" -->
<!-- 					data-dismiss="modal"> -->
<!-- 					<i class="fa fa-plus-square "></i> Valider -->
<!-- 				</button> -->
<!-- 			</div> -->
			<div class="col-md-12 column">
				<button id="SAVE" class="btn btn-small btn-info pull-right"
					data-dismiss="modal">
					<i class="fa fa-plus-square "></i> Enregistrer
				</button>
			</div>
		</div>
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->

</div>
<!-- /.page-content -->


<script type="text/javascript">
//{id:"1",designation:"",pu:"",quantite:"",montant:""}
$(document).ready(function () {
    $('#CMB_CLIENTS').select2();
    $('#CMBORIGINES').select2();
    $('#CMBDESTINATIONS').select2();
    $('#designation0').select2();
    var today = new Date();
    var dateAchat = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){dd='0'+dd;} if(mm<10){mm='0'+mm;} today = dd+'/'+mm+'/'+yyyy;dateAchat=yyyy+'-'+mm+'-'+dd;
    $('#dateBonSortie').attr('value', today);
    $.post("<?php echo App::getBoPath(); ?>/bonsortie/BonSortieController.php", {ACTION: "<?php echo App::ACTION_GET_LAST_NUMBER; ?>"}, function (data) {
        sData=$.parseJSON(data);
            if(sData.rc==-1){
                $.gritter.add({
                        title: 'Notification',
                        text: sData.error,
                        class_name: 'gritter-error gritter-light'
                    });
            }else{
                $("#numeroBonSortie").val(sData.oId);
            }
    });
    $.post("<?php echo App::getBoPath(); ?>/usine/UsineController.php", {ACTION: "<?php echo App::ACTION_LIST; ?>"}, function (data) {
        sData=$.parseJSON(data);
            if(sData.rc==-1){
                $.gritter.add({
                        title: 'Notification',
                        text: sData.error,
                        class_name: 'gritter-error gritter-light'
                    });
            }else{
                $("#CMBORIGINES").loadJSON('{"usines":' + data + '}');
                 $("#CMBDESTINATIONS").loadJSON('{"usines":' + data + '}');
            }
    });
    loadProduit = function(index){
        $.post("<?php echo App::getBoPath(); ?>/produit/ProduitController.php", {codeUsine: "<?php echo $codeUsine; ?>", ACTION: "<?php echo App::ACTION_LIST_PAR_USINE
                ; ?>"}, function(data) {
            sData=$.parseJSON(data);
            if(sData.rc==-1){
                $.gritter.add({
                        title: 'Notification',
                        text: sData.error,
                        class_name: 'gritter-error gritter-light'
                    });
            }else{
                $("#designation"+index).loadJSON('{"designations'+index+'":' + data + '}');
            }
        });
    };
    loadClients = function(){
        $.post("<?php echo App::getBoPath(); ?>/client/ClientController.php", {ACTION: "<?php echo App::ACTION_LIST_VALID
                ; ?>"}, function(data) {
            sData=$.parseJSON(data);
            if(sData.rc==-1){
                $.gritter.add({
                        title: 'Notification',
                        text: sData.error,
                        class_name: 'gritter-error gritter-light'
                    });
            }else{
                $("#CMB_CLIENTS").loadJSON('{"clients":' + data + '}');
            }
        });
    };
    loadClients();
    loadProduit(0);
    var i=1;
     $("#add_row").click(function(){
//      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>");


$('#addr'+i).html("<td>"+ (i+1) +"</td><td><select id='designation"+i+"' name='designation"+i+"' class='col-xs-10 col-sm-10'>\n\
<option value='-1' class='designations"+i+"'>sélectionnez un produit</option></select>\n\
</td>\n\
<td><input type='text' id='qte"+i+"' name='qte"+i+"'  class='form-control qte'/></td>");
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      $('#designation'+i).select2();
      loadProduit(i);
      
      i++;
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });
         
 
  
 
    
    $(document).delegate('#tab_logic tr td', 'click', function (event) {
        var id = $(this).closest('tr').attr('id');
        var counter = id.slice(-1);
          $( "#qte"+counter ).keyup(function() {
            calculTotalPoids();
         }); 
      
    });
    

   
  
   
            
        function calculTotalPoids(){
        var tot=0;
           $('#tab_logic .qte').each(function () {
                tot+= parseFloat($(this).val());
            }); 
            if(!isNaN(tot))
                $("#poidsTotal").val(tot);
       };
       
      $( "#qte0" ).keyup(function() {
            calculTotalPoids();
         }); 
       
          BonSortieProcess = function ()
        {
            
            var ACTION = '<?php echo App::ACTION_INSERT; ?>';
            var frmData;            
            var clients = $("#CMB_CLIENTS").val();
            var origine = $('#CMBORIGINES').select2('data').text;
            var numContainer= $('#numContainer').val();
            var numeroPlomb= $('#numeroPlomb').val();
            var numeroBonSortie = $("#numeroBonSortie").val();
            var numeroCamion = $("#numeroCamion").val();
            var nomChauffeur = $("#nomChauffeur").val();
            var destination = $('#CMBDESTINATIONS').select2('data').text;
            var poidsTotal = $("#poidsTotal").val();
            var codeUsine = "<?php echo $codeUsine ?>";
            var login = "<?php echo $login ?>";
            var $table = $("table");
            rows = [],
            header = [];
            $table.find("thead th").each(function () {
                header.push($(this).html().trim());
            });
            $table.find("tbody tr").each(function () {
                var row = {};

                $(this).find("td").each(function (i) {
                    var key = header[i];
                    var value;
                        valueSelect = $(this).find('select').val();
                        valueInput = $(this).find('input').val();
                    if (typeof valueInput !== "undefined")
                        value=valueInput;
                    if (typeof valueSelect !== "undefined")
                        value=valueSelect;
                    row[key] = value;
                });

                rows.push(row);
            });
            var tbl=JSON.stringify(rows);
            console.log(tbl);
            var formData = new FormData();
            formData.append('ACTION', ACTION);
            formData.append('client', clients);
            formData.append('dateBonSortie', dateAchat);
            formData.append('origine', origine);
            formData.append('numContainer', numContainer);
            formData.append('numeroPlomb', numeroPlomb);
            formData.append('numeroBonSortie', numeroBonSortie);
            formData.append('numeroCamion', numeroCamion);
            formData.append('nomChauffeur', nomChauffeur);
            formData.append('destination', destination);
            formData.append('jsonProduit', tbl);
            formData.append('poidsTotal', poidsTotal);
            formData.append('codeUsine', codeUsine);
            formData.append('login', login);
            $.ajax({
                url: '<?php echo App::getBoPath(); ?>/bonsortie/BonSortieController.php',
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'JSON',
                data: formData,
                success: function (data)
                {
                    if (data.rc == 0)
                    {
                        $.gritter.add({
                            title: 'Notification',
                            text: data.action,
                            class_name: 'gritter-success gritter-light'
                        });
                       $("#MAIN_CONTENT").load("<?php echo App::getHome(); ?>/app/bonsortie/bonSortieListe.php", function () {
                        });
                    } 
                    else
                    {
                        $.gritter.add({
                            title: 'Notification',
                            text: data.error,
                            class_name: 'gritter-error gritter-light'
                        });
                        
                    };
                    
                },
                error: function () {
                    alert("failure - controller");
                }
            });

        };   
        $("#SAVE").bind("click", function () {
           BonSortieProcess();
                   });
   });
</script>
