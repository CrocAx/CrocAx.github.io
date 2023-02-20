// Load tasks from localStorage
if (localStorage.getItem("todo")) {
	$("#todo .sortable").html(localStorage.getItem("todo"));
  }
  if (localStorage.getItem("in-progress")) {
	$("#in-progress .sortable").html(localStorage.getItem("in-progress"));
  }
  if (localStorage.getItem("done")) {
	$("#done .sortable").html(localStorage.getItem("done"));
  }
  
  // Make tasks sortable
  $(".sortable").sortable({
	connectWith: ".sortable",
	update: function () {
	  var columnId = $(this).parent().attr("id");
	  var tasks = $("#" + columnId + " .sortable").sortable("toArray");
	  localStorage.setItem(columnId, JSON.stringify(tasks));
	},
  }).disableSelection();
  
  // Add new task
  $(document).on("keypress", ".addTask", function (event) {
	if (event.which == 13) {
	  event.preventDefault(); // Prevent form submission
	  var taskText = $(this).val();
	  $(this)
		.siblings(".sortable")
		.append(
		  "<li>" +
			taskText +
			"<span class='edit'>&#9998;</span>" +
			"</li>"
		);
	  $(this).val("");
	  var columnId = $(this).parent().attr("id");
	  var tasks = $("#" + columnId + " .sortable").sortable("toArray");
	  localStorage.setItem(columnId, JSON.stringify(tasks));
	}
  });
  
  // Edit task
  $(document).on("click", ".edit", function () {
	var taskText = $(this).siblings("li").text();
	$(this)
	  .siblings("li")
	  .html(
		"<input type='text' class='editTask' value='" +
		  taskText +
		  "'> <button class='save'>&#10003;</button>"
	  );
	$(this).remove();
  });
  
  // Save edited task
  $(document).on("click", ".save", function () {
	var taskText = $(this).siblings(".editTask").val();
	$(this).parent("li").html(taskText + "<span class='edit'>&#9998;</span>");
  });
  