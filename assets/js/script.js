$(document).ready(function() {

	$("#addnewtask").on("click", function(event){
		event.preventDefault();

		let inputValue = $("#addtask").val();

		if(inputValue != "") {
			$("#errMsg").html("");

			$.ajax({
				url: "/batch19/mod08/todo_list_app/controllers/add_task.php",
				// url: "./controllers/add_task.php",
				type: "POST",
				data: {
					addtask: inputValue
				},
				success: function(jsondata) {

					alert("success");
					
					// let pokemon = JSON.parse(jsondata);
					// let content = ``;

					// if(pokemon !== "failed") {
					// 	pokemon. forEach(function(poke) {
					// 		content += `
					// 			<div class="card mb-4 mr-4 p-2" style="width: 13rem;float:left;">
  			// 						<img class="card-img-top" src="/batch19/mod08/mod08-02/assets/images/${poke.name}.png" alt="${poke.name}">
  			// 						<hr>
  			// 						<div class="card-body">
					// 				    <p class="card-text">
					// 				    	Name: <strong>${poke.name}</strong><br>
					// 				    	Type: <strong>${poke.type}</strong>

					// 				    </p>
					// 				 </div>
					// 			</div>
					// 		`;
					// 	});
					// } else {
					// 	content = `Search returned no matches for "`+inputValue+`."`;
					// }

					// $("#result-container").html(content);
				// }
			});

		} else {
			$("#errMsg").html("Please enter a task.");
			$("#addtask").focus();
		}

	});

});