
// const items = document.querySelectorAll('.item')
// const columns = document.querySelectorAll('.column')


// items.forEach(item => {
//     item.addEventListener('dragstart', dragStart)
//     item.addEventListener('dragend', dragEnd)
// });

// columns.forEach(column => {
//     column.addEventListener('dragover', dragOver);
//     column.addEventListener('dragenter', dragEnter);
//     column.addEventListener('dragleave', dragLeave);
//     column.addEventListener('drop', dragDrop);
// });

// let dragItem = null;

// function dragStart() {
//     console.log('drag starts...');
//     dragItem = this;
//     setTimeout(() => this.className = 'hide', 0)
// }

// function dragEnd() {
//     this.className = 'item'
//     console.log('drag ended...');
// }

// function dragOver(e) {
//     e.preventDefault()
//     console.log('drag over');
// }
// function dragEnter() {
//     console.log('drag enter');
// }
// function dragLeave() {
//     console.log('drag leave');
// }
// function dragDrop() {
//     console.log('drag dropped');
//     this.append(dragItem);
// }


 // function that writes the list order to a cookie
 function saveOrder() {
    $(".column").each(function(index, value) {
        var colid = value.id;
        var cookieName = "cookie-" + colid;
        // Get the order for this column.
        var order = $('#' + colid).sortable("toArray");
        // For each portlet in the column
        for (var i = 0, n = order.length; i < n; i++) {
            // Determine if it is 'opened' or 'closed'
            var v = $('#' + order[i]).find('.portlet-content').is(':visible');
            // Modify the array we're saving to indicate what's open and
            //  what's not.
            order[i] = order[i] + ":" + v;
        }
        $.cookie(cookieName, order, {
            path: "/",
            expiry: new Date(2012, 1, 1)
        });
    });
}

// function that restores the list order from a cookie
function restoreOrder() {
    $(".column").each(function(index, value) {
        var colid = value.id;
        var cookieName = "cookie-" + colid
        var cookie = $.cookie(cookieName);
        if (cookie == null) {
            return;
        }
        var IDs = cookie.split(",");
        for (var i = 0, n = IDs.length; i < n; i++) {
            var toks = IDs[i].split(":");
            if (toks.length != 2) {
                continue;
            }
            var portletID = toks[0];
            var visible = toks[1]
            var portlet = $(".column")
                .find('#' + portletID)
                .appendTo($('#' + colid));
            if (visible === 'false') {
                portlet.find(".ui-icon").toggleClass("ui-icon-minus");
                portlet.find(".ui-icon").toggleClass("ui-icon-plus");
                portlet.find(".portlet-content").hide();
            }
        }
    });
}


$(document).ready(function() {
    $(".column").sortable({
        connectWith: ['.column'],
        stop: function() {
            saveOrder();
        }
    });

    $(".portlet")
        .addClass("ui-widget ui-widget-content")
        .addClass("ui-helper-clearfix ui-corner-all")
        .find(".portlet-header")
        .addClass("ui-widget-header ui-corner-all")
        .prepend('<span class="ui-icon ui-icon-minus"></span>')
        .end()
        .find(".portlet-content");

    restoreOrder();

    $(".portlet-header .ui-icon").click(function() {
        $(this).toggleClass("ui-icon-minus");
        $(this).toggleClass("ui-icon-plus");
        $(this).parents(".portlet:first").find(".portlet-content").toggle();
        saveOrder(); // This is important
    });
    $(".portlet-header .ui-icon").hover(
        function() {
            $(this).addClass("ui-icon-hover");
        },
        function() {
            $(this).removeClass('ui-icon-hover');
        }
    );
});

$(function() {

    //add id's to the li elements so after sorting we can save the order in localstorage
    $("#sortable").each(function(index, domEle) {
        $(domEle).attr('id', 'item_' + index)
    });

    $("#sortable").sortable({
        placeholder: "ui-state-highlight",
        update: function(event, ui) {
            localStorage.setItem("sorted", $("#sortable").sortable("toArray"));
        }
    });

    restoreSorted();

});

function myFunction() {
  $('.imgg').click(function() {
    if ($('.portlet-content').attr('contenteditable')) {
        $('.portlet-content').removeAttr('contenteditable');
    } else {
        $('.portlet-content').attr('contenteditable', true);
  }});
};

function edit() {
        $( ".imgg" ).toggle(".click");
    }




