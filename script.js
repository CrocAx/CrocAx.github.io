$(function() {
	// Load saved tasks on page load
	$(".sortable").each(function() {
		var columnId = $(this).parent().attr("id");
		var tasks = JSON.parse(localStorage.getItem(columnId)) || [];
		for (var i = 0; i < tasks.length; i++) {
			$(this).append("<li>" + tasks[i] + "<span class='edit'>&#9998;</span></li>");
		}
	});

	// Make the lists sortable and draggable
	$(".sortable").sortable({
		connectWith: ".sortable",
		cursor: "move",
		placeholder: "ui-state-highlight",
		update: function() {
			// Save tasks to Local Storage on list update
			var columnId = $(this).parent().attr("id");
			var tasks = $(this).sortable("toArray");
			localStorage.setItem(columnId, JSON.stringify(tasks));
		}
	});

	// Add new task on Enter key press
	$("input[type='text']").keypress(function(event) {
		if (event.which == 13) {
			var task = $(this).val();
			$(this).siblings(".sortable").append("<li>" + task + "<span class='edit'>&#9998;</span></li>");
			$(this).val("");
			var columnId = $(this).parent().attr("id");
			var tasks = $("#" + columnId + " .sortable").sortable("toArray");
			localStorage.setItem(columnId, JSON.stringify(tasks));
		}
	});

// Allow editing of tasks
$(document).on("mousedown", ".edit", function() {
	var taskText = $(this).siblings("li").text();
	$(this).siblings("li").html("<input type='text' class='editTask' value='" + taskText + "'>");
	$(this).hide();
});

// Save edited task on Enter key press
$(document).on("keypress", ".editTask", function(event) {
	if (event.which == 13) {
		event.preventDefault(); // Prevent form submission
		var newTaskText = $(this).val();
		$(this).parent().html(newTaskText + "<span class='edit'>&#9998;</span>");
		var columnId = $(this).parent().parent().attr("id");
		var tasks = $("#" + columnId + " .sortable").sortable("toArray");
		localStorage.setItem(columnId, JSON.stringify(tasks));
	}
});

});
