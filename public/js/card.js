$(onPageLoad);

function onPageLoad()
{
    $( ".column" ).sortable({
        connectWith: ".column",
        handle: ".portlet-header",
        start: function (event, ui) {
            ui.item.addClass('tilt');
        },
        stop: function (event, ui) {
            ui.item.removeClass('tilt');

            let task_ids = [];
            let group = ui.item.parent().parent();

            group.find('a').each(function() {
                task_ids.push($(this).attr('data-task-id'));
            });
            //let task_id = task.attr('data-task-id');
            let group_id = group.attr('data-group-id');
            let csrf = document.querySelector('meta[name="csrf-token"]').content;

            $.ajax({
                url: "/move-task-to-a-new-group",
                type:"POST",
                data:{
                    task_ids:task_ids,
                    group_id:group_id,
                    _token: csrf
                }
            });
        }
    });
}

$('.create-new-group,.create-new-task').click(function(){
    $(this).next().show();
});
$('.update-comment').click(function(){
    $(this).parent().prev().show().prev().hide();
});
