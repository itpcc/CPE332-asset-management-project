(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space

function _bindAjaxLinkElement(){
	$("a:not([data-bind-ajax], a[href^='#'])").each(function(){
		if(
			this.hostname === BASE_URL_ELEMENT.hostname && 	//check is in the same domain
			this.pathname.indexOf(BASE_URL_ELEMENT.pathname) === 0 //and in the same directory (localhost are placed in subdir)
		){
			$(this).attr("data-bind-ajax", "true").click(function(e){
				var currURL = this.href;
				e.preventDefault();
				if(!currURL.match(/[?&]api=/)){
					currURL = BASE_URL+'?api='+encodeURIComponent(this.pathname.substring(BASE_URL_ELEMENT.pathname.length));
					if(this.search)
						currURL += '&'+this.search.substring(1); // Strip ? and append into exist query string
				}

				console.log("going to URL: ", currURL);
				if(History.getState().cleanUrl !== currURL){
					History.pushState(null, document.title + ' | '+ ($(this).attr("title") || $(this).text()), currURL);
				}else{
					//if state not change
					console.log("Manual: ", currURL);
					gotoPage(currURL); //go manually
				}
				// cancel the normal action of the hyperlink
				return false;
			});
		}else{
			$(this).attr("data-bind-ajax", "false");
		}
	});
}

function scrollTo(selector){
	$('html, body').animate({
		scrollTop: $(selector).offset().top
	}, 500);
}

function gotoPage(url){
	var urlObj = document.createElement("a");
	var urlQueryObj, urlPath;
	urlObj.href = url;
	if(!urlObj.search)
		return false;

	urlQueryObj = $.deparam(urlObj.search.substring(1));

	if(urlQueryObj.api){
		urlPath = $.grep(urlQueryObj.api.split('/'), function(elem){ return elem.length > 0; });
		console.log(urlPath);
		if(urlPath[0] === 'analysis' && typeof urlPath[1] !== "undefined" && typeof ANALYSIS_TABLE[urlPath[1]] !== "undefined"){
			openAnalysis(urlPath[1]);
		}else if(!jQuery.isEmptyObject(SECTION_FORM_CONFIG[urlPath[0]])){
			jQuery("#analysis-session").addClass("hide");
			scrollTo('#'+urlPath[0]+'-section');
			if(urlPath[1] === 'add'){
				openForm(urlPath[0]);
			}else if(urlPath[1] === 'edit' && typeof urlPath[2] !== "undefined"){
				dataResult = getModuleData(urlPath[0], urlPath[2]);
				if(dataResult === false){
					Materialize.toast("Cannot get data from "+urlPath[0]+':'+urlPath[2], 2000);
				}else if(dataResult === true){
					//@TODO loading
					$(window).one('data-'+urlPath[0]+'-'+urlPath[2]+'-sent', function(){
						dataResult = getModuleData(urlPath[0], urlPath[2]);
						openForm(urlPath[0], dataResult);
					});
				}else{
					openForm(urlPath[0], dataResult);
				}
			}else if(urlPath[1] === 'delete' && typeof urlPath[2] !== "undefined"){
				dataResult = getModuleData(urlPath[0], urlPath[2]);
				if(dataResult === false){
					Materialize.toast("Cannot get data from "+urlPath[0]+':'+urlPath[2], 2000);
				}else if(dataResult === true){
					//@TODO loading
					$(window).one('data-'+urlPath[0]+'-'+urlPath[2]+'-sent', function(){
						dataResult = getModuleData(urlPath[0], urlPath[2]);
						deleteModuleData(urlPath[0], urlPath[2]);
					});
				}else{
					deleteModuleData(urlPath[0], urlPath[2]);
				}
			}
		}else{
			jQuery.noop();
		}
	}
}

function replaceModuleDataPlaceholder(sectionID, elemID){
	$(".app-module-data-placeholder[data-module-name='"+sectionID+"'][data-module-id='"+elemID+"']").each(function(){
		var fieldName = $(this).attr("data-field-name");
		if(
			!jQuery.isEmptyObject(window.moduleData[sectionID][elemID]) && 
			typeof window.moduleData[sectionID][elemID][fieldName] !== "undefined"
		){
			$(this).html(window.moduleData[sectionID][elemID][fieldName]);
			$(this).removeClass('app-module-data-placeholder');
		}
	});
}

function getModuleData(sectionID, elemID){
	try{
		if(!jQuery.isEmptyObject(window.moduleData[sectionID])){
			if(!jQuery.isEmptyObject(window.moduleData[sectionID][elemID])){
				replaceModuleDataPlaceholder(sectionID, elemID);
				return window.moduleData[sectionID][elemID];
			}
		}else{
			window.moduleData[sectionID] = {};
		}

		if(!jQuery.isEmptyObject(SECTION_FORM_CONFIG[sectionID]['url']['list'])){
			$.getJSON(SECTION_FORM_CONFIG[sectionID]['url']['list'], { id: elemID }, function(ajaxData){
				window.moduleData[sectionID][elemID] = ajaxData.data.pop();
				replaceModuleDataPlaceholder(sectionID, elemID);
				$(window).trigger('data-'+sectionID+'-'+elemID+'-sent', [elemID]);
			});
			return true;
		}
	}catch(e){
		console.error('Error while getting module data: ', e);
		return false;
	}
	return false;				
}

function openForm(formID, formData){
	if(jQuery.isEmptyObject(SECTION_FORM_CONFIG[formID]))
		return;

	console.log("FormData: ", formData);

	$('#app-modal-'+formID+' :input').removeClass("valid invalid");
	if(!jQuery.isEmptyObject(formData)){
		$.each(formData, function(key, val){
			$("#app-modal-"+formID+"-"+key).val(val);
		});
	}else{
		$('#app-modal-'+formID+' :input').val('');
	}

	jQuery.each(SECTION_FORM_CONFIG[formID].fields, function(fieldName, fieldProperties){
		if(fieldProperties.input.type === "select2"){
			$('#app-modal-'+formID+'-'+fieldProperties.slug).select2({
				ajax: {
					url: fieldProperties.input.ajax,
					dataType: 'json',
					processResults: function (ajaxData) {
						//console.log(data);
						return {
							results: $.map(ajaxData.data, function (item) {
								console.log(item);
								return {
									text: item[fieldProperties.input.ajax_text],
									slug: item[fieldProperties.input.ajax_id],
									id: item[fieldProperties.input.ajax_id]
								};
							})
						};
					}
				},
				minimumInputLength: 2,
				width: '100%'
			});
			if(!jQuery.isEmptyObject(formData) && formData[fieldName]){
				$.ajax({
					cache: true,
					dataType: "json",
					url: fieldProperties.input.ajax_query_id+formData[fieldName],
					success: function(ajaxData){
						$('#app-modal-'+formID+'-'+fieldProperties.slug).append('<option value="'+ajaxData.data[0][fieldProperties.input.ajax_id]+'">'+ajaxData.data[0][fieldProperties.input.ajax_text]+'</option>').val(ajaxData.data[0][fieldProperties.input.ajax_id]).trigger('change');
					}
				});
			}else{
				$('#app-modal-'+formID+'-'+fieldProperties.slug).val('').trigger('change');
			}
		}else if(fieldProperties.input.type === "select"){
			//@TODO: Do Select
			$.getJSON(SECTION_FORM_CONFIG[fieldProperties.input.module].url.list, function(ajaxData){
				$.each(ajaxData.data, function(i, eachData){
					var optionKey = eachData[fieldProperties.input.option_id];
					var optionValue = eachData[fieldProperties.input.option_text];
					var selectElem = '#app-modal-'+formID+'-'+fieldProperties.slug;
					if(!$(selectElem+' option[value='+optionKey+']').length){
						$(selectElem)
							.append('<option value="'+optionKey+'">'+optionValue+'</option>');
						window.moduleData[fieldProperties.input.module][optionKey] = eachData;
					}
				});
				$('select').material_select('destroy');
				$('select').material_select();
			});
		}else{
			if(typeof fieldProperties.input.length === "number"){
				$('#app-modal-'+formID+'-'+fieldProperties.slug).trigger('autoresize').characterCounter();
			}

			if(!jQuery.isEmptyObject(formData) && !jQuery.isEmptyObject(formData[fieldName])){
				$('#app-modal-'+formID+'-'+fieldProperties.slug).val(formData[fieldName]).trigger('change');
			}

		}
	});

	$("#app-modal-"+formID).modal('open');

	if(jQuery.isEmptyObject(window.alreadyBindEvent['form']))
		window.alreadyBindEvent['form'] = {};

	if(!window.alreadyBindEvent['form'][formID]){
		console.log("Bind :", window.alreadyBindEvent['form']);
		$('#app-modal-'+formID+' .app-modal-submit').click(function(e){
			var error = {};
			e.preventDefault();
			console.log('#app-modal-'+formID+' [required]');
			$('#app-modal-'+formID+' :input').each(function(){
				$(this).removeClass("invalid");

				if(!this.validity.valid){
					error[$(this).attr("id") || $(this).attr("name")] = ($("label[for='"+$(this).attr("id")+"']").text() || $(this).attr("name")).toString()+' : '+this.validationMessage;
				}
			});

			if(!jQuery.isEmptyObject(error)){
				Materialize.toast(Object.values(error).join('<br>'), 4000); // 4000 is the duration of the toast
				$.each(error, function(key, name){
					$('#'+key+', #app-modal-'+formID+' input[name="'+key+'"]').addClass("invalid");
				});
			}else{
				console.log("Submit Data: ", $('#app-modal-'+formID+' .app-modal-form').serialize());
				$.ajax({
					dataType: 'json',
					method: 'POST',
					data: $('#app-modal-'+formID+' .app-modal-form').serialize(),
					error: function(jqXHR, textStatus, errorThrown){
						Materialize.toast('<span class="text-red">Error while submit data ('+textStatus+'):'+errorThrown+'</span>', 4000); // 4000 is the duration of the toast
					},
					success: function(data){
						if(data.error){
							Materialize.toast('<span class="red-text">Error: '+((typeof data.error === "string")?data.error:JSON.stringify(data.error))+'</span>', 4000); // 4000 is the duration of the toast
						}else{
							Materialize.toast('<span class="green-text">Success!</span>', 2000); // 4000 is the duration of the toast
							$("#app-modal-"+formID).modal('close');
							generateTable(formID);
						}
					},
					url:( 
						jQuery.isEmptyObject($('#app-modal-'+formID+'-'+SECTION_FORM_CONFIG[formID].fields[SECTION_FORM_CONFIG[formID].id_key].slug).val())?
						SECTION_FORM_CONFIG[formID].url.add:
						SECTION_FORM_CONFIG[formID].url.edit
					),

				});
			}
		});
		window.alreadyBindEvent['form'][formID] = true;
	}
}

function generateTable(tableID){
	if(jQuery.isEmptyObject(SECTION_FORM_CONFIG[tableID]))
		return;
	

	if(!$('#'+tableID+'-section-list').attr('data-DataTable')){
		var columnList = [], columnCustomRender = [{
			"targets": -1,
			"render": function ( data, type, row ) {
				//console.log('data, type, row :', data, type, row);
				var str = '<a href="'+tableID+'/edit/'+data[SECTION_FORM_CONFIG[tableID].id_key];
				str += '" class="app-'+tableID+'-edit waves-effect waves-light btn hoverable';
				if(typeof SECTION_FORM_CONFIG[tableID].color === 'string')
					str += ' darken-4 '+SECTION_FORM_CONFIG[tableID].color;
				str += '" alt="Edit"><i class="material-icons">mode_edit</i><!-- Edit --></a>';
				str += ' <a href="'+tableID+'/delete/'+data[SECTION_FORM_CONFIG[tableID].id_key];
				str += '" class="app-'+tableID+'-delete waves-effect waves-light btn hoverable';
				if(typeof SECTION_FORM_CONFIG[tableID].color === 'string')
					str += ' darken-4 '+SECTION_FORM_CONFIG[tableID].color;
				str += '" alt="Delete"><i class="material-icons">delete</i><!-- Delete --></a>';
				return str;
			}
		}];
		if(typeof window.columnGetDataList === "undefined")  window.columnGetDataList = {};
		window.columnGetDataList[tableID] = [];
		jQuery.each(SECTION_FORM_CONFIG[tableID].table, function(i, fieldProperties){
			if(typeof fieldProperties === 'string'){
				columnList.push({ data: fieldProperties });
			}else{
				columnList.push({ data: fieldProperties.localField });
				columnCustomRender.push({
					"targets": i,
					"render": function ( data, type, row ) {
						window.columnGetDataList[tableID].push([fieldProperties.module, row[fieldProperties.localField]]);
						return '<span class="app-module-data-placeholder" data-module-name="'+fieldProperties.module+'" data-module-id="'+row[fieldProperties.localField]+'" data-field-name="'+fieldProperties.targetField+'">'+row[fieldProperties.localField]+'</span>';
					}
				});
			}
		});
		columnList.push({ data: null });

		console.log("columnList: ", columnList);
		console.log("columnCustomRender: ", columnCustomRender);
		window.dataTableObj[tableID] = $('#'+tableID+'-section-list').DataTable( {
				responsive: true,
				dom: '<<"row"<"col m8"l><"#'+tableID+'-section-list-searchbox.input-field col m4 right">><t>ip>',
				ajax: SECTION_FORM_CONFIG[tableID].url.list,
				columns: columnList,
				"columnDefs": columnCustomRender,
				"fnDrawCallback": function(){
					_bindAjaxLinkElement();
				}
		} );
		$('#'+tableID+'-section-list').attr('data-DataTable', 'true');
		$('#'+tableID+'-section-list-searchbox').html('<input value="" id="'+tableID+'-section-filter-field" class="white-text" type="text"><label for="'+tableID+'-section-filter-field" class="white-text">Search:</label>');
		$('#'+tableID+'-section-filter-field').keyup(function(){
			var searchStr = $(this).val();

			console.log(tableID, ' Is searching ', searchStr, 'FROM', $('#'+tableID+'-section-list').DataTable());
			$('#'+tableID+'-section-list').DataTable().search(searchStr).draw() ;
		});
		window.dataTableObj[tableID].on('xhr', function(){
			var ajaxJson = window.dataTableObj[tableID].ajax.json();
			if(typeof window.moduleData[tableID] === 'undefined')
				window.moduleData[tableID] = {};
			if(typeof ajaxJson !== "undefined"){
				$.each(ajaxJson.data, function(i, JSONRowData){
					window.moduleData[tableID][JSONRowData.VendorID] = JSONRowData;
				});
				console.log('Table AJAX data: ', ajaxJson);
			}
		});
		window.dataTableObj[tableID].on('draw.dt', function(){
			if(!jQuery.isEmptyObject(window.columnGetDataList[tableID])){
				jQuery.each(window.columnGetDataList[tableID], function(i, eachProperties){
					window.columnGetDataList[tableID].pop(i);
					if(!jQuery.isEmptyObject(eachProperties))
						getModuleData(eachProperties[0], eachProperties[1]);
				});
			}
		});
	}else{
		window.dataTableObj[tableID].ajax.reload();
	}
	Materialize.updateTextFields();
}

function deleteModuleData(sectionID, elemID){
	if(confirm("Are you sure to delte "+SECTION_FORM_CONFIG[sectionID].name+" ID: "+elemID)){
		$.getJSON(SECTION_FORM_CONFIG[sectionID].url.delete, { 'id': elemID }, function(data){
			if(data.error){
				Materialize.toast('<span class="red-text">Error: '+((typeof data.error === "string")?data.error:JSON.stringify(data.error))+'</span>', 4000); // 4000 is the duration of the toast
			}else{
				Materialize.toast('<span class="green-text">Success!</span>', 2000); // 4000 is the duration of the toast
				generateTable(sectionID);
			}
		});
	}
}

$(document).ready(function(){
	window.dataTableObj = {};
	window.moduleData = {};
	window.alreadyBindEvent = {};

	_bindAjaxLinkElement();

	$('.modal').modal();
	$(".dropdown-button").dropdown({hover:true});

	gotoPage(document.location);
	$('.pushpin-nav').each(function() {
		var $this = $(this);
		var $target = $('#' + $(this).attr('data-target'));
		$this.pushpin({
			top: $target.offset().top,
			bottom: $target.offset().top + $target.outerHeight() - $this.height()
		});
	});
	jQuery.each(SECTION_FORM_CONFIG, function(sectionName, sectionProp){
		generateTable(sectionName);
	});

	if(Modernizr.backgroundblendmode === true){
		$("body").addClass("support-backgroundblendmode");
	}
});
(function(window,undefined){
	// Bind to StateChange Event
	History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
		var State = History.getState(); // Note: We are using History.getState() instead of event.state
		gotoPage(State.cleanUrl);
		return true;
	});
})(window);