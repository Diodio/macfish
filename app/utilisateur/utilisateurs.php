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
            Gestion des utilisateurs
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Liste des utilisateurs
            </small>
        </h1>
    </div><!-- /.page-header -->

     <div class="row">
         
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                        <h4 class="widget-title lighter">
                            <i class="ace-icon fa fa-users orange"></i>
                            Liste des utilisateurs
                        </h4>
                        <div class="btn-group">
                                    <button data-toggle="dropdown"
                                            class="btn btn-mini btn-primary dropdown-toggle tooltip-info"
                                            data-rel="tooltip" data-placement="top" title="" style="
                                            height: 32px;
                                            width: 80px;
                                            margin-top: -10px;
                                            margin-left: 36%;
                                        ">
                                        <i class="icon-group icon-only icon-on-right"></i> Action
                                    </button>

                                    <ul class="dropdown-menu dropdown-info">
                                        <li id='MNU_NEW' class="" ><a href="#" id="GRP_NEW">Nouveau </a></li>
                                        <li class="divider"></li>
                                        <li id='MNU_EDIT' class="disabled" ><a href="#" id="GRP_EDIT">Modifier</a></li>
                                        <li class="divider"></li>
                                        <li id='MNU_REMOVE' class="disabled"><a href="#" id="GRP_REMOVE">Supprimer</a></li>
                                    </ul>
                                </div>
                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>
                        </div>
                          
                    </div>
                        
                    <div class="widget-body">
                        <div class="widget-main no-padding">
                          <table id="LIST_UTILISATEURS" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center" style="border-right: 0px none;">
                                    <label>
                                        <input type="checkbox" value="*" name="allchecked"/>
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th style="border-left: 0px none;border-right: 0px none;">
                                    Nom Complet
                                </th>
                                <th style="border-left: 0px none;border-right: 0px none;">
                                   Profil
                                </th>
                                <th style="border-left: 0px none;border-right: 0px none;">
                                   Login
                                </th>
                                <th style="border-left: 0px none;border-right: 0px none;">
                                    Usine
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
            <div id="winModalUser" class="modal fade">
            <form id="validation-form" class="form-horizontal"  onsubmit="return false;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Creer un utilisateur</h3>
                        </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nom Complet </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="nom" name="nom" placeholder="" class="col-xs-10 col-sm-7">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Login </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="login" name="login" placeholder="" class="col-xs-10 col-sm-7">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mot de passe</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="motDePasse" name="motDePasse" placeholder="" class="col-xs-10 col-sm-7">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Confirmer mot de passe</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="confMotDePasse" name="confMotDePasse" placeholder="" class="col-xs-10 col-sm-7">
                                    </div>

                                </div>
                                <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Usine</label>
                                        <div class="col-sm-9">
                                            <select id="CMB_USINE" name="CMB_USINE" data-placeholder="" class="col-xs-10 col-sm-7">
                                                <option value="-1" class="usines">Nom Mareyeur</option>
                                        </select>
                                        </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Profil</label>
                                    <div class="col-sm-9">
                                        <select id="CMB_PROFIL" name="CMB_PROFIL" data-placeholder="" class="col-xs-10 col-sm-7">
                                                <option value="-1" class="profils">Nom Mareyeur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                    <button id="SAVE" class="btn btn-small btn-info">
                        <i class="ace-icon fa fa-save"></i>
                        Enregistrer
                    </button>

                    <button id="CANCEL" class="btn btn-small btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        Annuler
                    </button>
                </div>
                        
                    </div><!-- /.modal-content -->
                
                </div><!-- /.modal-dialog -->
            </form>
            </div>
</div>
        
       <script type="text/javascript">
    $(document).ready(function () {
            var oTableUsers = null;
            var nbTotalUsersChecked=0;
            var checkedUsers = new Array();
            var userId=0;
            // Check if an item is in the array
           // var interval = 500;
           
           $("#CMB_USINE").select2();
           $("#CMB_PROFIL").select2();
           $("#MNU_NEW").click(function()
           {
            $('#winModalUser').modal('show');
           });
           loadUsines = function(){
                $.post("<?php echo App::getBoPath(); ?>/usine/UsineController.php", {ACTION: "<?php echo App::ACTION_LIST
                        ; ?>"}, function(data) {
                    sData=$.parseJSON(data);
                    if(sData.rc==-1){
                        $.gritter.add({
                                title: 'Notification',
                                text: sData.error,
                                class_name: 'gritter-error gritter-light'
                            });
                    }else{
                        $("#CMB_USINE").loadJSON('{"usines":' + data + '}');
                    }
                });
            };
            
            loadProfils = function(){
                $.post("<?php echo App::getBoPath(); ?>/utilisateur/UtilisateurController.php", {ACTION: "<?php echo App::ACTION_LIST_PROFIL
                        ; ?>"}, function(data) {
                    sData=$.parseJSON(data);
                    if(sData.rc==-1){
                        $.gritter.add({
                                title: 'Notification',
                                text: sData.error,
                                class_name: 'gritter-error gritter-light'
                            });
                    }else{
                        $("#CMB_PROFIL").loadJSON('{"profils":' + data + '}');
                    }
                });
            };
            loadUsines();
            loadProfils();
            checkedUsersContains = function(item) {
                for (var i = 0; i < checkedUsers.length; i++) {
                    if (checkedUsers[i] == item)
                        return true;
                }
                return false;
            };
            // Persist checked Message when navigating
            
            
            persistChecked = function() {
                $('input[type="checkbox"]', "#LIST_UTILISATEURS").each(function() {
                    if (checkedUsersContains($(this).val())) {
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
                        checkedUsersAdd($(this).val());
                      //  MessageSelected();
                        $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
			$('#TAB_MSG_VIEW').hide();
                        nbTotalUsersChecked=checkedUsers.length;
                    }
                    else
                    {
                        checkedUsersRemove($(this).val());
                   //    MessageUnSelected();
                        $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
			$('#TAB_MSG_VIEW').hide();
                    }
                    $(this).closest('tr').toggleClass('selected');
                });
            });
            
             $('#LIST_UTILISATEURS tbody').on('click', 'input[type="checkbox"]', function() {
                context=$(this);
                if ($(this).is(':checked') && $(this).val() != '*') {
                    checkedUsersAdd($(this).val());
                    MessageSelected();
                } else {
                    checkedUsersRemove($(this).val());
                    MessageUnSelected();
                }
                ;
                if(!context.is(':checked')){
                    $('table th input:checkbox').removeAttr('checked');
                }else{
                    if(checkedUsers.length==nbTotalUsersChecked){
                        $('table th input:checkbox').prop('checked', true);
                    }
                }
            });
            
         
           // $('#SAVE').attr("disabled", true);
            MessageSelected = function(click)
            {
                if (checkedUsers.length == 1){
                    $('#SAVE').attr("disabled", false);
                    loadDemoulagesSelected(checkedUsers[0]);
                    $('#TAB_MSG_VIEW').show();
		    $('#TAB_GROUP a[href="#TAB_MSG"]').tab('show');
                }else
                {
                    $('#SAVE').attr("disabled", true);
                    $('#nomProduit').text("");
                    $('#stockProvisoire').val("");
                    $('#stockReel').val("");
                    $('#nombreCarton').val("");
                    $('#nombreParCarton').val("");
                    
                    $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
                    $('#TAB_MSG_VIEW').hide();
                    
                }
                if(checkedUsers.length==nbTotalUsersChecked){
                    $('table th input:checkbox').prop('checked', true);
                }
            };
            MessageUnSelected = function()
            {
               if (checkedUsers.length === 1){
                   $('#SAVE').attr("disabled", false);
                    loadDemoulagesSelected(checkedUsers[0]);
		    $('#TAB_MSG_VIEW').show();
                    $('#TAB_GROUP a[href="#TAB_MSG"]').tab('show');
                }
                else
                {
                    $('#SAVE').attr("disabled", true);
                    $('#nomProduit').text("");
                    $('#stockProvisoire').val("");
                    $('#stockReel').val("");
                    $('#nombreCarton').val("");
                    $('#nombreParCarton').val("");
                    $('#SAVE').attr("disabled", false);
                    
                    $('#TAB_GROUP a[href="#TAB_INFO"]').tab('show');
                    $('#TAB_MSG_VIEW').hide();
                    $("#BTN_MSG_GROUP").popover('destroy');
                    $("#BTN_MSG_CONTENT").popover('destroy');
                }
                $('table th input:checkbox').removeAttr('checked');
            };

            // Add checked item to the array
            checkedUsersAdd = function(item) {
                if (!checkedMessageContains(item)) {
                    checkedUsers.push(item);
                }
            };
            // Remove unchecked items from the array
            checkedUsersRemove = function(item) {
                var i = 0;
                while (i < checkedUsers.length) {
                    if (checkedUsers[i] == item) {
                        checkedUsers.splice(i, 1);
                    } else {
                        i++;
                    }
                }
            };
            checkedMessageContains = function(item) {
                for (var i = 0; i < checkedUsers.length; i++) {
                    if (checkedUsers[i] == item)
                        return true;
                }
                return false;
            };
            showPopover = function(idButton, colis){
            $("#" + idButton).popover({
                html: true,
                trigger: 'focus',
                placement: 'left',
                title: '<i class="icon-group icon-"></i> Détail colis ',
                content: colis
            }).popover('toggle');
         };
             loadUsers = function() {
                nbTotalUsersChecked = 0;
                checkedUsers = new Array();
                var url =  '<?php echo App::getBoPath(); ?>/utilisateur/UtilisateurController.php';

                if (oTableUsers != null)
                    oTableUsers.fnDestroy();

                oTableUsers = $('#LIST_UTILISATEURS').dataTable({
                    "oLanguage": {
                    "sUrl": "<?php echo App::getHome(); ?>/datatable_fr.txt",
                    "oPaginate": {
                        "sNext": "",
                        "sLast": "",
                        "sFirst": null,
                        "sPrevious": null
                      }
                    },
                    "aoColumnDefs": [
                        {
                             "aTargets": [0],
                             "bSortable": false,
                             "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                                 $(nTd).css('text-align', 'center');
                             },
                             "mRender": function(data, type, full) {
                                return '<label><input type="checkbox" id="' + data + '" value="' + data + '"><span class="lbl"></span></label>';                             }
                        }
                    ],
                    
                    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
//                        persistChecked();
//                        $(nRow).css('cursor','pointer');
//                        $(nRow).on('click', 'td:not(:first-child)', function(){
//                            checkbox=$(this).parent().find('input:checkbox:first');
//                            if(!checkbox.is(':checked')){
//                                checkbox.prop('checked', true);;
//                                checkedUsersAdd(aData[0]);
//                                MessageSelected();
//                                
//                            }else{
//                                checkbox.removeAttr('checked');
//                                
//                                checkedUsersRemove(aData[0]);
//                                MessageUnSelected();
//                            }
//                        });
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
                        userProfil=$.cookie('profil');
                        if(userProfil==='admin'){
                            aoData.push({"name": "codeUsine", "value": "*"});
                        }
                        else
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
                                  nbTotalUsersChecked=json.iTotalRecords;
                              }
                                
                           }
                        });
                    }
                });
            };
            
            loadUsers();
             SaveOrEditProcess = function (userId)
        {
            
            var ACTION;
            if(userId==0)
                ACTION='<?php echo App::ACTION_INSERT; ?>';
            else
                ACTION='<?php echo App::ACTION_UPDATE; ?>';
                
            var nom= $('#nom').val();
            var login = $("#login").val();
            var password = $("#motDePasse").val();
            var usineId = $("#CMB_USINE").val();
            var profilId = $("#CMB_PROFIL").val();
            
            var formData = new FormData();
            formData.append('ACTION', ACTION);
            formData.append('nom', nom);
            formData.append('login', login);
            formData.append('password', password);
            formData.append('usineId', usineId);
            formData.append('profilId', profilId);
            $.ajax({
                url: '<?php echo App::getBoPath(); ?>/utilisateur/UtilisateurController.php',
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
                    } 
                    else
                    {
                        $.gritter.add({
                            title: 'Notification',
                            text: data.error,
                            class_name: 'gritter-error gritter-light'
                        });
                        
                    };
                  //  loadClients();
                },
                error: function () {
                    alert("failure - controller");
                }
            });

        };
         $("#SAVE").click(function() {
         $.validator.addMethod(
            "assertConfirmPwdTrue",
            function(value, element, regexp) {
                //return value===regexp;
                var pwd = $("#motDePasse").val();
                var pwdconf = $("#confMotDePasse").val();
                if(pwd !== pwdconf){
                    return false;
                }
                else{
                    return true;
                }
            },
            "les mots de passe ne sont pas identiques"
        );
        $.validator.addMethod("notEqual", function(value, element, param) {
		            return this.optional(element) || value != param;
		            });   
       	 $('#validation-form').validate({
       			errorElement: 'div',
       			errorClass: 'help-block',
       			focusInvalid: false,
       			rules: {
       				nom: {
       					required: true
       				},
       				login: {
       					required: true
       				},
       				motDePasse: {
       					required: true
       				},
       				confMotDePasse: {
       					required: true,
                                        assertConfirmPwdTrue: true
       				},
       				CMB_USINE: {
       					notEqual: "-1"
       				},
       				CMB_PROFIL: {
       					notEqual: "-1"
       				}
       				
       			},

       			messages: {
       				nom: {
       					required: "Champ obligatoire."
       				},
       				login: {
       					required: "Champ obligatoire."
       				},
       				motDePasse: {
       					required: "Champ obligatoire."
       				},
       				confMotDePasse: {
       					required: "Champ obligatoire.",
                                        assertConfirmPwdTrue: "Les mots de passe ne sont pas identiques"
       				},
       				CMB_USINE: {
       					notEqual: "Champ obligatoire."
       				},
       				CMB_PROFIL: {
       					notEqual: "Champ obligatoire."
       				}
       			},


       			highlight: function (e) {
       				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
       			},

       			success: function (e) {
       				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
       				$(e).remove();
       			},

       			errorPlacement: function (error, element) {
       				 error.insertAfter(element);
       			},

       			submitHandler: function (form) {
                        SaveOrEditProcess(userId);
                        $('#winModalUser').modal('hide');
                        $('#nom').val("");
                        $('#login').val("");
                        $('#motDePasse').val("");
                        $('#CMB_USINE').val("-1");
                        $('#CMB_PROFIL').val("-1");
       			},
       			invalidHandler: function (form) {
       			}
       		});
        });

            });
        </script>