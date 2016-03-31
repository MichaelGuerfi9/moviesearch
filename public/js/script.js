$(function () {

    $('form').submit(function () {
        $.ajax({
            url: 'index/search',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',

            success: function (data) {
                console.log(data);
                console.log("success !");
                var result = ' <table class="table table-hover"> <tr> <th>Titre </th> <th>Année </th> <th>Synopsis </th><th>Producer</th> <th>Durée </th> </tr>';
                for (var i = 0; i < data.films.length;i++) {

                    Seconds = data.films[i].duration;
                    Minuts = Seconds / 60;
                    Seconds = Seconds % 60;
                    Hours = Minuts / 60;
                    Minuts = Minuts % 60;

                    result += '<tr><td>'+data.films[i].title+' </td>'
                        + '<td>'+data.films[i].year+'</td>'
                        + '<td>'+data.films[i].synopsis+'</td>'+
                        '<td>' + data.films[i].first_name+' '+data.films[i].last_name + '</td>'
                        + '<td>'+Math.trunc(Hours) + 'h' + Math.trunc(Minuts)+'</td></tr>';
                    $('.results').html('<br><tr>'+result+'</tr></table>' );
                }
            },
            error: function (data, status, error) {
                var toPrint = '';
                data = JSON.parse(data.responseText);
                for (var d in data.errors) {
                    toPrint += d + ' :' + data.errors[d] + '<br>';
                }
                console.log(toPrint);
            }
        });
        return false;
    });
});
