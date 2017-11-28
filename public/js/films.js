/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var api_url = site_url + 'api/'
var page = 1

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

function addFilmComment() {
    $('#film-comment').on('submit', function (e) {
        e.preventDefault();
        var name = $('#name').val();
        var comment = $('#comment').val();
        var film_guid = $('#film_guid').val();
        var error = false;
        if (name == "") {
            error = true;
            $('#name').parents('.form-group').addClass('has-error');
        } else {
            $('#name').parents('.form-group').removeClass('has-error');
        }
        if (comment == "") {
            error = true;
            $('#comment').parents('.form-group').addClass('has-error');
        } else {
            $('#comment').parents('.form-group').removeClass('has-error');
        }
        if (error === false) {
            var formData = {name: name, comment: comment, film_guid:film_guid};
            $.ajax({
                url: api_url + 'comment',
                type: "post",
                datatype: "json",
                data: JSON.stringify(formData),
                contentType: "application/json; charset=utf-8",
                headers: {
                    'Authorization': 'Bearer ' + api_tokem
                },
                beforeSend: function ()
                {
                    $('#comment-loader').show();
                }
            }).done(function (response) {
                $('#comment-loader').hide();
                if (response.response_code == 200) {
                    alert(response.message);
                    $('#name').val('');
                    $('#comment').val('');
                } else {
                    alert(response.message);
                }
            });
        }
    });
}
function addFilm() {
    $('#create-film').on('submit', function (e) {
        e.preventDefault();
        var name = $('#name').val();
        var description = $('#description').val();
        var release_date = $('#release_date').val();
        var rating = $('input[name=rating]:checked').val();
        var ticket_price = $('#ticket_price').val();
        var country = $('#country').val();
        var genre = $('#genre').val();
        var photo = $('#photo').val();
        var error = false;
        if (name == "") {
            error = true;
            $('#name').parents('.form-group').addClass('has-error');
        } else {
            $('#name').parents('.form-group').removeClass('has-error');
        }
        if (description == "") {
            error = true;
            $('#description').parents('.form-group').addClass('has-error');
        } else {
            $('#description').parents('.form-group').removeClass('has-error');
        }
        if (release_date == "") {
            error = true;
            $('#release_date').parents('.form-group').addClass('has-error');
        } else {
            $('#release_date').parents('.form-group').removeClass('has-error');
        }
        if (typeof rating == 'undefined' || rating == "") {
            error = true;
            $('#rating').addClass('has-error');
        } else {
            $('#rating').removeClass('has-error');
        }
        if (ticket_price == "") {
            error = true;
            $('#ticket_price').parents('.form-group').addClass('has-error');
        } else {
            $('#ticket_price').parents('.form-group').removeClass('has-error');
        }
        if (country == "") {
            error = true;
            $('#country').parents('.form-group').addClass('has-error');
        } else {
            $('#country').parents('.form-group').removeClass('has-error');
        }
        if (genre == "") {
            error = true;
            $('#genre').parents('.form-group').addClass('has-error');
        } else {
            $('#genre').parents('.form-group').removeClass('has-error');
        }
        if (photo == "") {
            error = true;
            $('#photo').parents('.form-group').addClass('has-error');
        } else {
            $('#photo').parents('.form-group').removeClass('has-error');
        }
        var file = jQuery('#photo')[0].files[0];
        var ph = getBase64(file).then(function (res) {
            photo = res;
        });
        if (error === false) {
            var formData = {
                name: name,
                description: description,
                release_date: release_date,
                rating: rating,
                ticket_price: ticket_price,
                country: country,
                genre: genre,
                photo: photo,
            };
            $.ajax({
                url: api_url + 'film',
                type: "post",
                datatype: "json",
                data: JSON.stringify(formData),
                contentType: "application/json; charset=utf-8",
                headers: {
                    'Authorization': 'Bearer ' + api_tokem
                },
                beforeSend: function ()
                {
                    $('#comment-loader').show();
                }
            }).done(function (response) {
                console.log(response)
                $('#film-loader').hide();
                if (response.response_code == 200) {
                    alert(response.message);
                    window.location = site_url+'films'
                } else {
                    alert(response.message);
                }
            });
        }
    });
}

function getBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
    });
}
