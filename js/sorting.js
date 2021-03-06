$(function () {  
    $('table')  
      .on('click', 'th', function () {  
        var index = $(this).index(),  
            rows = [],  
            thClass = $(this).hasClass('asc') ? 'desc' : 'asc';  
        $('#ceo th').removeClass('asc desc');  
        $(this).addClass(thClass);  
        $('#ceo tbody tr').each(function (index, row) {  
          rows.push($(row).detach());  
        });  
        rows.sort(function (a, b) {  
          var aValue = $(a).find('td').eq(index).text(),  
              bValue = $(b).find('td').eq(index).text();  
          return aValue > bValue  
               ? 1  
               : aValue < bValue  
               ? -1  
               : 0;  
        });  
        if ($(this).hasClass('desc')) {  
          rows.reverse();  
        }  
        $.each(rows, function (index, row) {  
          $('#ceo tbody').append(row);  
        });  
      });  
  });  