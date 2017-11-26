"use strict";

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$( document ).ready(function() {

	//$( "#next-button" ).click(function() {

	function refresh() { 
		jQuery.getJSON("dashboard_status.php", function(data) {
			console.log(data);
			for (var treatment in data) {
				var totalVotes=0;
				for (var i=0; i<data[treatment]["votes"].length; i++) {
					totalVotes+=data[treatment]["votes"][i];
				}
				$("#"+treatment + " .votetotal").html(numberWithCommas(totalVotes)+" total votes so far!");
				console.log(treatment);
				console.log(totalVotes);
				for (var i=0; i<data[treatment]["votes"].length; i++) {
					var votes=data[treatment]["votes"][i];
					var percent="0%";
					if (totalVotes>0){
						percent=Math.round(votes/totalVotes*100)+"%";
					}
					var rank=data[treatment]["ranks"][i];
					var item=$("#"+treatment + " .item[data-id='"+rank+"']");
					item.find(".graph .graph-foreground").css("width",percent);
					item.children(".percent").html(percent);
					item.find(".pic").attr("src","pics/00"+i+".jpg");
					
					/*if (rank>0 && rank<=3) {
						//Show rank
						pic.siblings(".trending").html("<p>Trending at rank <strong>#"+rank+"</strong></p>").css("display","block");
					}	*/
				}
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
		
	}
	refresh();
	setInterval(function() {refresh();},3000);
	
	$("body").click(function() {
		var ele = $(".example");
		if (ele.hasClass("invisible")) {
			ele.removeClass("invisible");
		} else {
			$(".example").addClass("invisible");
		}
	});

});
