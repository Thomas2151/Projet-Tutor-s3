$(document).ready(function () {
    $('#using_events').jstree({

        "plugins": ["checkbox"]
    });

   
        $(function () {
            $('#using_events')
                .on('changed.jstree', function (e, data) {
                    var i, j, r = [];
                    for (i = 0, j = data.selected.length; i < j; i++) {
                        r.push(data.instance.get_node(data.selected[i]).text);
                    }
                    $('#event_result').html('Selected:<br /> ' + r.join(', '));
                })
                .jstree();
        });
    

});