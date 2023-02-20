$(function() {
	// Load saved tasks on page load
	$(".sortable").each(function() {
		var columnId = $(this).parent().attr("id");
		var tasks = JSON.parse(localStorage.getItem(columnId)) || [];
		for (var i = 0; i < tasks.length; i++) {
			$(this).append("<li><span class='edit'>" + tasks[i] + "</span></li>");
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

	// Enable task editing
	$(document).on("dblclick", ".edit", function() {
		var task = $(this).text();
		var input = "<input type='text' class='task-edit' value='" + task + "'>";
		$(this).replaceWith(input);
		$(".task-edit").focus();
	});

	// Save edited task on enter key press
	$(document).on("keypress", ".task-edit", function(event) {
		if (event.which == 13) {
			var task = $(this).val();
			var span = "<span class='edit'>" + task + "</span>";
			$(this).replaceWith(span);
			var columnId = $(this).closest(".column").attr("id");
			var tasks = $("#" + columnId + " .sortable").sortable("toArray");
			localStorage.setItem(columnId, JSON.stringify(tasks));
		}
	});
});
