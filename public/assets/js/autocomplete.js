// Generate a list of tags based on what the user types
$('#tag').autocomplete({
    'dataType': 'json',
    'minlength': '1',
    'source': '/questions/tags',
    'select': function(e, ui) {
        $('#tags').append("<span class='category btn'>" + ui.item.label) + "</span>";
        $('#tags').append("<input type='hidden' name='tagvalues[]' value='" + ui.item.id + "'>");
        $('#tag').val("");
    }
});

$('#tag').keydown(function(event) {
    var value = $('#tag').val();
        if(event.which ===  32) {
            $('#tags').append("<span class='category btn'>" + value + "</span>");
            $('#tags').append("<input type='hidden' name='tagvalues[]' value='" + value + "'>");
            $('#tag').val("");
        }
});

// Remove a tag from the list of tags
$('.category').click(function() {
    this.remove();
});

