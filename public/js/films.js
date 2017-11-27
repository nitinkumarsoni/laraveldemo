/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var api_url = site_url + 'api/'
var page = 1
$(document).ready(function () {
    getFilmList(page);
});

function getFilmList() {
    $.ajax({
        url: api_url + 'films?page=' + page,
        type: "get",
        datatype: "json",
        beforeSend: function ()
        {
            console.log('Show loader');
            $('#film-loader').show();
        }
    }).done(function (response) {
        $('#film-loader').hide();
        if (response.data.length == 0) {
            var html = '<div class="alert alert-warning text-center">No record found</div>';
            $('#fims-listing').html(html);
        } else {
            var html = '<ul>';
            for (var i = 0; i < response.data.length; i++) {
                html += '<li><a href="' + response.data[i].url + '">' + response.data[i].name + '</a></li>';
            }
            html += '</ul>';
            page++;
            $('#fims-listing').html(html);
        }
    });
}