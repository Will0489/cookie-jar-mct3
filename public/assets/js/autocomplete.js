$('#tag').autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "/questions/tags",
            data: {
                tag: this.term
            },
            success: function (data) {
                console.log("[SUCCESS] " + data.length + " item(s)");

                response( $.map( data, function(item) {
                    return {
                        label: item.name,
                        value: item.id
                    };
                }));
            }
        });

    },
    select: function (event, ui) {
        $('#tag').val(ui.item.label);
    }
});

