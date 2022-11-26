function editarItem(item){

    $('#itemId').val($(item).attr('id').replace('item_',''));
    $('#titleEdit').val($(item).children('td').eq(0).text());
    $('#descriptionEdit').val($(item).children('td').eq(1).text());
    $('#categoryEdit').val($(item).children('td').eq(2).text());
}