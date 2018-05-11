// This script is used in view/products/checkout.php
//Responsible for final Ordering check-out,





// FALSE - Initialize OBJECT productsObject, was in myCore, but thus was executed there with delay and Line 46 here was failing
//checking if object for all product exist and creat it if not
window.productsObject;
// Check if Object was already saved in Local Storage, if not - creat it
    if (localStorage.getItem("localStorageObject") != null) { // If Local Storage was prev created and exists
		    var retrievedObject = localStorage.getItem('localStorageObject'); // get Loc Storage item
			var retrievedObject = JSON.parse(retrievedObject);
			productsObject = retrievedObject;
			
	        buildOrderList(); //Builds order list from JS OBJECt
			alert ("Loc St exists(CheckOut)" + JSON.stringify(productsObject, null, 4) );
    } else {
        
		// if Loc Storage does not exist (i.e Object was never initialized), create a new Object
	    if (typeof productsObject == "undefined") {
            alert("Object will be created now(CheckOut)");
		    var productsObject = { }; //empty object for all cart products
        } else {
		    alert("Object Exists"); // will never fire
	    }
	}	









$(document).ready(function(){
	
	//Builds order list from JS OBJECt
	buildOrderList();
	
	
	// Click + button*************
	$("#plus").click(function(){
        actionPlus();
		//refreshCartIcon();
    });
	//-----------------------------
	
	
	
	
	
	
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     ** 

	function actionPlus () 
	{
		
	}	
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************
	
	
	
	
	
	
	});
	// END ready----------------------------------------------------------------------------------------------------------
	
	
	
	
	
	
	
	// Builds order list from JS OBJECt
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     ** 
	
	function buildOrderList() 
	{
	//alert(JSON.stringify(productsObject, null, 4)); //to alert OBJECT
        var finalText = "<div class='container ' style='word-wrap: break-word;'>";  // word-wrap: break-word to prevent text overlapping
		for (var key in productsObject) {
			
			var addID = key; // alert (addID);
			finalText = finalText + 
			            "<div class='row'>" +
						"<div class='col-sm-4 col-xs-2 '>" + key + "</div> " +
						"<div class='col-sm-2 col-xs-2 '>" + productsObject[key]['quantity'] + "</div> " +
					    //"<div class='col-sm-1 col-xs-2'><button type='button' class='btn btn-success fullCartPlus' id=' "  + addID + "_plus'> + </button></div>" +
						//"<div class='col-sm-1 col-xs-2'><button class='btn btn-danger fullCartMinus'               id=' "  + addID + "_minus'> - </button>" + "</div>" +
						"<div class='col-sm-2 col-xs-2 '>" + productsObject[key]['price'] + "</div> " +
						"<div class='col-sm-4 col-xs-4 '>" + substringSum (productsObject[key]['quantity'] * productsObject[key]['price']) +
						"</div>" +
						"</div><hr class='bordX '>";
		}
		finalText = finalText + "</div>";
		
		$(".checkList").html(finalText);	
	}
	
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************
	
	
	
	// substring sum if it has too much digits after dot (i.e 12.99999999)
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     ** 
	
	function substringSum (mySum) 
	{
		mySum = mySum.toString(); // otherwise indexOf works with strings only
		if ( mySum.indexOf(".") != -1 ) {  // if float, i.e 13.344444
			//alert ('subst');
			mySum = Math.round( parseFloat (mySum) * 100) / 100; //alert (totalArr[1]); // round 13.344444
			totalArr = mySum.toString().split(".");  // devide  13.344444 to totalArr = [13, 344444];
			
			totalArr[1] = totalArr[1].substring(0,2); // cut the amount after the dot to 2 symbols only
			mySum = totalArr[0] + "." + totalArr[1];
			return mySum;
		} else {
			return mySum;
		}
			
	}

    // **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************