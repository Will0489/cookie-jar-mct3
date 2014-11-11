// Global autocomplete functionality
var cache = {};

$('#tag').autocomplete({
    'dataType': 'json',
    'minlength': '2',
    'source': "/questions/tags",
    'select' : function(e, ui) {
        $('#tags').append("<span class='category btn'>" + ui.item.label + "</span>");
        $('#tags').append("<input type='hidden' name='tagvalues[]' value='" + ui.item.id + "'> ");
        $(this).val("");
        return false;
    }
});


// Add tag to list after pressing space
$('#tag').keydown(function(event) {
    var value = $('#tag').val();
    $.trim(value);
        if(event.which ===  32) {
            if(!value == '') {
                $('#tags').append("<span class='category btn'>" + value + " </span>");
                $('#tags').append("<input type='hidden' name='tagvalues[]' value='" + value + "'>");
                $('#tag').val("");
                return false;
            }
            $('#tag').val("");
            return false;
        }
});

// Whenever a tag is clicked, remove it and its corresponding hidden input from DOM
$(document).on( 'click', 'span.category', function() {
    $('#deletedtags').append("<input type='hidden' name='delvalues[]' value='" + $(this).next("input").val() + "'>");
    $(this).next("input").remove();
    $(this).remove();
});

// Whenever a conversation item is clicked, make that conversation active, hide the current active one
$(document).on( 'click', 'li.conversation', function() {
    $("ul.active-chat").removeClass('active-chat').addClass('hidden-chat').fadeOut();
    $("ul[data-id='"+ $(this).attr('data-conversation') + "']").removeClass('hidden-chat').addClass('active-chat').fadeIn();
});

