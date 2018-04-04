$(function () {
    $('.js_rel_option').hide();
    $('#attr_rel_table').val('');
    $('#attr_rel_title').val('');
    $('#attr_rel_title option').hide();

    $('#attr_type_key').change(function(){
        console.log($(this).val());
        if ($(this).val() == 'relation')
            $('.js_rel_option').show();
        else
            $('.js_rel_option').hide();
    });

    $('#js_add_new_column').click(function(){
        var attr_type_key = $('#attr_type_key').val();
        var attr_rel_table = $('#attr_rel_table').val();
        var attr_rel_title = $('#attr_rel_title').val();
        var attr_title = $('#attr_title').val();
        var attr_name = $('#attr_name').val();

        var new_row = '<tr>'+
                            '<td><input type="text" class="form-control" name="attr_type_key[]" value="'+attr_type_key+'" readonly></td>'+
                            '<td><input type="text" class="form-control" name="attr_rel_table[]" value="'+attr_rel_table+'" readonly></td>'+
                            '<td><input type="text" class="form-control" name="attr_rel_title[]" value="'+attr_rel_title+'" readonly></td>'+
                            '<td><input type="text" class="form-control" name="attr_title[]" value="'+attr_title+'" readonly></td>'+
                            '<td><input type="text" class="form-control" name="attr_name[]" value="'+attr_name+'" readonly></td>'+
                            '<td><a class="js_del_row">Удалить</a></td>'+
                        '</tr>';
        $('#js_list_column').append(new_row);

        $
        $('#attr_rel_table').val('');
        $('#attr_rel_title').val('');
        $('#attr_title').val('');
        $('#attr_name').val('');
    });

    //js_del_row
    $( "body" ).on( "click", ".js_del_row", function() {
        $(this).parent().parent().remove();
    });

    $('#attr_rel_table').change(function(){
        var val = $(this).val();

        console.log(val);
        $('#attr_rel_title option').hide();

        $('#attr_rel_title .model_'+val).show();
    });


});
