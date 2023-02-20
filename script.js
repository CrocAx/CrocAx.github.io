$(function() {
	// Load saved tasks on page load
	$(".sortable").each(function() {
		var columnId = $(this).parent().attr("id");
		var tasks = JSON.parse(localStorage.getItem(columnId)) || [];
		for (var i = 0; i < tasks.length; i++) {
			$(this).append("<li>" + tasks[i] + "</li>");
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
			$(this).siblings(".sortable").append("<li>" + task + "</li>");
			$(this).val("");
			var columnId = $(this).parent().attr("id");
			var tasks = $("#" + columnId + " .sortable").sortable("toArray");
			localStorage.setItem(columnId, JSON.stringify(tasks));
		}
	});
});
