$(onPageLoad);

function onPageLoad()
{
    $( ".column" ).sortable({
        connectWith: ".column",
        handle: ".portlet-header",
        start: function (event, ui) {
            ui.item.addClass('tilt');
            console.log('test');
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
    $(this).prev().show().prev().hide().prev().hide();
    $(this).next().show();
    $(this).hide();
});

$('.update-description').click(function(){
    $(this).hide().next().show().next().hide().next().children().show().next().show();
});

$('.cancel-description').click(function(){
    $(this).hide().prev().show().next().next().show().next().children().hide().next().hide();
});



$('.update-title').click(function(){
    $(this).hide().prev().show().prev().hide();
    $(this).next().show();
    $('#title-button').show();
});

$('.cancel-title').click(function(){
    $(this).hide().prev().show();
    $(this).prev().prev().hide().prev().show();
    $('#title-button').hide();
});



$('.write-message').click(function(){
    $('#write-message').show();
    $(this).hide().prev().show()
});

$('.cancel-message').click(function(){
    $('#write-message').hide();
    $(this).hide().next().show()
});

// project javascript

$('.fa-caret-down').click(function(){
    $(this).toggleClass('fa-caret-up fa-caret-down');
    $('.project-info').toggle();
});


$('.search-bar .icon').on('click', function() {
    $(this).parent().toggleClass('active');
});
