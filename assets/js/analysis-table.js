function ConvertKeysToLowerCase(obj) {
    var output = {};
    for (i in obj) {
        if (Object.prototype.toString.apply(obj[i]) === '[object Object]') {
           output[i.toLowerCase()] = ConvertKeysToLowerCase(obj[i]);
        }else if(Object.prototype.toString.apply(obj[i]) === '[object Array]'){
            output[i.toLowerCase()]=[];
             output[i.toLowerCase()].push(ConvertKeysToLowerCase(obj[i][0]));
        } else {
            output[i.toLowerCase()] = obj[i];
        }
    }
    return output;
};

function fetchAnalysisData(showError){
	$("#analysis-argument").removeClass("invalid");
	jQuery.getJSON(ANALYSIS_TABLE_URL+window.currentAnalysisName, { arg: $("#analysis-argument").val() }, function(data){
		if(data.error){
			console.error("Error while fetching analysis data: ", data.error);
			if(showError && $("#analysis-argument").attr("data-show-error") !== "false"){
				Materialize.toast("Analysis error: "+JSON.stringify(data.error), 2000);
				$("#analysis-argument").addClass("invalid");
			}
		}else if(data.data.length === 0){
			$("#analysis-table tbody").html('<tr><td colspan="'+($("#analysis-table thead tr th").length || 1)+'">No data</td></tr>');
		}else{
			$("#analysis-table tbody").html('');
			console.log("Analysis: ", data);
			console.log("In: ", ANALYSIS_TABLE[window.currentAnalysisName].fields);
			jQuery.each(ConvertKeysToLowerCase(data.data), function(i, dataEach){
				var eachRow = jQuery("<tr></tr>");
				jQuery.each(ConvertKeysToLowerCase(ANALYSIS_TABLE[window.currentAnalysisName].fields), function(id, name){
					eachRow.append('<td data-column-name="'+id+'">'+dataEach[id]+'</td>');
				});
				$("#analysis-table tbody").append(eachRow);
			});
		}
		$("#analysis-argument").attr("data-show-error", "true");
	});
}

function openAnalysis(analysisID){
	var currAnalysis = ANALYSIS_TABLE[analysisID];
	jQuery("#analysis-section").removeClass("hide");
	scrollTo("#analysis-section");
	jQuery("#analysis-section .analysis-name").html(currAnalysis.name);
	jQuery("#analysis-section .analysis-description").html(currAnalysis.description);
	if(currAnalysis.argument){
		if(currAnalysis.argument[0].validate === 'valid_date'){
			$("#analysis-argument").attr("type", "date");
		}else if(currAnalysis.argument[0].validate === 'decimal'){
			$("#analysis-argument").attr("type", "number");
		}

		$("#analysis-argument").attr("data-show-error", "false").val('');
		$("#analysis-argument-label").html(currAnalysis.argument[0].name);
		$("#analysis-argument-wrapper").removeClass("hide");
	}else{
		$("#analysis-argument-wrapper").addClass("hide");
	}

	$("#analysis-table thead tr").html('');
	jQuery.each(currAnalysis.fields, function(id, name){
		$("#analysis-table thead tr").append('<th>'+name+'</th>');
	});
	window.currentAnalysisName = analysisID;
	fetchAnalysisData(false);
	if(!window.analysisArgumentInputBind){
		$("#analysis-argument").change(function(){
			fetchAnalysisData(true);
		});
		window.analysisArgumentInputBind = true;
	}
}