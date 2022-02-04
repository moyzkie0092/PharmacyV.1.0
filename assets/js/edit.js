$(document).ready(function(){
    $(document).on('click','.editbtn',function(){
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();
    $('#e_id').val(data[1]);
    $('#e_name').val(data[2]);
    $('#e_stock').val(data[3].split(' ',1));
    $('#e_price').val(data[4].split(' ',1));
    $('#e_date').val(data[5]);
    $('#e_date_exp').val(data[6]);
    $('#e_category').val(data[8]);
    $('#e_supplier').val(data[9]);
    });

    $(document).on('click','.editcategory',function(){
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();
    $('#c_id').val(data[0]);
    $('#c_name').val(data[1]);
    });

    $(document).on('click','.editsupplier',function(){
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();
    $('#s_id').val(data[0]);
    $('#s_name').val(data[1]);
    });

  });