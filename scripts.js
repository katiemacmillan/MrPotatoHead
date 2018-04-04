var potato = {
	"head" : 0,
	"eyes" : 0,
	"nose" : 0,
	"mouth" : 0,
	"feet" : 0,
	"left" : 0,
	"right" : 0
};

function addComponent(componentName, number){
	if(componentName === "arms"){
		potato["left"] = number;
		potato["right"] = number;
		$("#left").attr("src", "Images/left"+potato["left"]+".png");
		$("#right").attr("src", "Images/right"+potato["right"]+".png");
	if (potato["left"] > 0){
		$("#itemTab").prop("disabled", false);
	} else {
		$("#itemTab").prop("disabled", true);
	}

	} else if (componentName === "item"){
		potato["left"] = number;
		$("#left").attr("src", "Images/left"+potato["left"]+".png");
	} else{
		potato[componentName] = number;
		$("#"+componentName).attr("src", "Images/"+componentName+potato[componentName]+".png");
	}
}

function openComponent(evt, componentName) {
	// Declare all variables
	var i, tabcontent, tablinks;

	// Get all elements with class="tabcontent" and hide them
	tabcontent = document.getElementsByClassName("tabContent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

	// Get all elements with class="tablinks" and remove the class "active"
	tablinks = document.getElementsByClassName("tabLinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = "tabLinks";
	}

	// Show the current tab, and add an "active" class to the link that opened the tab
	document.getElementById(componentName).style.display = "block";
	evt.currentTarget.className = "tabLinks active";
}

function loadFile(){
	// console.log(document.getElementById("").value);
	var filePath = parseFilePath(document.getElementById('fileUpload').value);
	jQuery.ajax({
	    type: "POST",
	    url: 'upload.php',
	    data: {filePath: filePath},
	    success: function (jsonString, textstatus) {
              if( textstatus === "success" ) {
              	parsePotato(JSON.parse(jsonString));
              	displayPotato();
              } else{
                  console.log("ERROR: " + jsonString.error);
              }
        }
	});
}
function saveFile(){
	// console.log(document.getElementById("").value);
	var filePath = parseFilePath(document.getElementById('fileUpload').value);
	jQuery.ajax({
	    type: "POST",
	    url: 'save.php',
	    data: {fileData: JSON.stringify(potato)},
    	// contentType: "application/json; charset=utf-8",
	    success: function (obj, textstatus) {
              if( textstatus === "success" ) {
                  $("#TestDIV").html(obj.toString());
              } else{
                  console.log("ERROR: " + obj.error);
              }
        }
	});
}
function parseFilePath(fullPath){
	if (fullPath) {
	    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
	    var filePath = fullPath.substring(startIndex);
	    if (filePath.indexOf('\\') === 0 || filePath.indexOf('/') === 0) {
	        filePath = filePath.substring(1);
	    }
	    return filePath
	} else {
		return null;
	}

}
function getDefault(number){
	jQuery.ajax({
	    type: "POST",
	    url: 'default.php',
	    data: {default: number},
	    success: function (jsonString, textstatus) {
              if( textstatus === "success" ) {
              	parsePotato(JSON.parse(jsonString));
              	displayPotato();
              } else{
                  console.log("ERROR: " + jsonString.error);
              }
        }
	});
}

function parsePotato(obj){
  	if(obj["potato"]){
  		var pot = obj["potato"];
      	for (var i = 0; i < pot.length; i++) {
      		potato[pot[i].name] = pot[i].style;
      	}
		
		if (potato["left"] > 0){
			$("#itemTab").prop("disabled", false);
		} else {
			$("#itemTab").prop("disabled", true);
		}
  	}
}

function displayPotato(){
	var htmlLeft = '';
	var htmlCenter = '<div id="centerBody" class="bodySections">';
	var htmlRight = '';
	for (var component in potato){
		if(component == "left"){
			htmlLeft += getComponentDiv(component, potato[component]);
		} else if (component == "right"){
			htmlRight += getComponentDiv(component, potato[component]);
		} else {
			htmlCenter += getComponentDiv(component, potato[component]);
		}
	}

	$("#faceDisplay").html(htmlLeft + htmlCenter + '</div>' + htmlRight);
}

function getComponentDiv (name, style){
	return '<img id="' + name + '" src="Images/' + name + style + '.png">'
}
