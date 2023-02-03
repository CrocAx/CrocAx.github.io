
            // $('.column').droppable({
            //     drop: function(event, ui) {
            //         var drop_p = $(this).offset();
            //         var drag_p = ui.draggable.offset();
            //         var left_end = drop_p.left - drag_p.left + 30;
            //         var top_end = drop_p.top - drag_p.top + 100;
            //         ui.draggable.animate({
            //             top: '+=' + top_end,
            //             left: '+=' + left_end
            //         });
            //     }
            // });


            // $(".item").draggable({
            //     stack: ".item",
            //     stop: function(event, ui) {
            //         var pos_x = ui.position.left;
            //         var pos_y = ui.position.top;
            //         var need = ui.helper.data("need");

            //         console.log(pos_x);
            //         console.log(pos_y);
            //         console.log(need);

            //         //Do the ajax call to the server
            //         $.ajax({
            //             type: "POST",
            //             url: "sql/save.php",
            //             data: {
            //                 x_pos: pos_x,
            //                 y_pos: pos_y,
            //                 id: need
            //             }
            //         }).done(function(msg) {
            //             // alert("Data Saved: " + msg);
            //         });
            //     }
            // });

            // function insert_div() {

            // var newdiv;
            // var container_block;

            // newdiv = document.createElement('div');
            // newdiv.innerHTML = 'New tab!';
            // newdiv.className = "item ui-draggable ui-draggable-handle";

            // container_block = document.querySelector('.column');
            // container_block.appendChild(newdiv);

            // $(".item").draggable({
            // stack: ".item",
            // stop: function(event, ui) {
            // var pos_x = ui.position.left;
            // var pos_y = ui.position.top;
            // var need = ui.helper.data("need");

            // console.log(pos_x);
            // console.log(pos_y);
            // console.log(need);

            //Do the ajax call to the server
            // $.ajax({
            // type: "POST",
            // url: "sql/save.php",
            // data: {
            // x_pos: pos_x,
            // y_pos: pos_y,
            // id: need
            // }
            // }).done(function(msg) {
            // // alert("Data Saved: " + msg);
            // });
            // }
            // });
            // }