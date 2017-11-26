"use strict";

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$( document ).ready(function() {

	var current_state={
		"treatment":-1
	};

	//Screen1 to Screen2
	$( "#next-button" ).click(function() {


		jQuery.getJSON("status.php", function(data) {
			console.log(data);
			if (!"treatment" in data || !"votes" in data || ! "ranks" in data) {
				$("#error").css("display","block");
				$("#error").html("<p>Error: Unable to retrieve data. Please report.</p>");
				if (data["error"]) {
					$("#error").append("<p>Server: " + data["error"] + "</p>");
				}
			}
			current_state=data;
			$(".trending").css("display","none");
			$(".social_info").css("display","none");
			if (current_state["treatment"]==1) {
				//Add in social info
				for (var i=0; i<current_state["votes"].length; i++) {
					var votes=current_state["votes"][i];
					var rank=current_state["ranks"][i];
					/*console.log(pic);
					console.log(votes);
					console.log(rank);*/
					var pic=$(".pic[data-id='"+i+"']");
					if (votes==0) {
						pic.siblings(".social_info").html("<p>No votes so far</p>");
					} else if (votes==1) {
						pic.siblings(".social_info").html("<p>1 vote so far</p>");
					} else {
						pic.siblings(".social_info").html("<p>"+numberWithCommas(votes)+" votes so far!</p>");
					}
					
					if (rank>0 && rank<=3) {
						//Show rank
						pic.siblings(".trending").html("<p>Trending at <strong>#"+rank+"</strong></p>").css("display","block");
					}	
				}
				$(".social_info").css("display","block");
			}
		}).fail(function() {
			console.log("error");
			$("#error").css("display","block");
			$("#error").html("<p>Error: invalid response. Please report.</p>");
		}).done(function() {
	   		$("#screen1").css("opacity",0);
	   		$("#screen1").css("z-index",-99);
	   		$("#screen2").css("opacity",1);
		});
		
	});
	
	
	$( "#vote .pic" ).click(function() {
		var pic_id=$(this).attr("data-id");
		console.log("Voted for #" + pic_id);
		
		$("#screen2").css("opacity",0);
		//after 4 seconds go back to screen 1
		setTimeout(function() {
			$("#thanks").css("opacity",0);
			//$("#screen1").css("display","none");
		}, 3000);
		
		setTimeout(function() {
			$("#thanks").css("display","none");
			//$("#screen1").css("display","none");
		}, 3500);
		
		var payload={
			"pic":pic_id,
			"treatment":current_state["treatment"]
		}
		//Make ajax call
		jQuery.getJSON("postvote.php", payload, function(data) {
			console.log(data);
			if (data["vote"] && data["vote"]["pic"]==payload["pic"] && data["vote"]["treatment"]==payload["treatment"]) {
				$("#thanks").css("display","block");
				$("#thanks").css("opacity",1);		
			} else {
				$("#error").css("display","block");
				$("#error").html("<p>Error: vote mismatch. Please report.</p>");
				if (data["error"]) {
					$("#error").append("<p>Server: " + data["error"] + "</p>");
				}
			}
		}).fail(function() {
			console.log("error");
			$("#error").css("display","block");
			$("#error").html("<p>Error: invalid response. Please report.</p>");
		}).always(function() {
			$("#screen1").css("opacity",1);
		});
		
		/*.done(function() {
			$("#screen1").css("opacity",1);
		})*/
		
		
		$("#screen1").css("display","block");
		$("#screen1").css("opacity",1);
   		$("#screen1").css("z-index",99);
		
		
	});
});
