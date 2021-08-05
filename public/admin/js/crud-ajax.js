$(document).ready(function (){
    var pageLinks = document.querySelectorAll('a.page-link');
    for (var i = 0; i < pageLinks.length; i++) {
        var pageLink = pageLinks[i];
        pageLink.onclick = function(event) {
            event.preventDefault();
            link = this.href;
            $.ajax({
                url: link,
                type: "GET",
                dataType: 'html',
            }).done(function(data) {
                $('#data-cat').html(data);
            });
        }
    }
})


var addBtn = document.querySelector('#add-category');
addBtn.onclick = function(e) {
    e.preventDefault();
    var name = document.querySelector('input[name=cat_name]').value;
    var token = document.querySelector('input[name=_token]').value;
    var link = this.href;
    console.log(link);
    console.log(token);

    $.ajax({
        url: link,
        type: "POST",
        data: {
            'cat_name': name,
            '_token': token
        }
    }).done(function(data) {
        $('#add-category-modal').modal('hide');
        var message = '<p class="alert alert-success" role="alert">' + data + '</p>'
        document.querySelector('.message').innerHTML = message;
        $.ajax({
            url: 'http://127.0.0.1:8000/shop.admin/category',
            type: "GET",
        }).done(function(data) {
            $('#data-cat').html(data);
        });

    }).fail(function(data) {
        var errors = JSON.parse(data.responseText).errors;
        var errorData = errors.cat_name[0]
        document.querySelector('.errorMessageAdd').innerHTML = errorData;
    });

}

function updateCategory(cat_id){
    var name = document.querySelector("input[name=cat_name-"+cat_id+"]").value;
    var token = document.querySelector('input[name=_token]').value;
    $.ajax({
        url: "http://127.0.0.1:8000/shop.admin/category/update?id="+cat_id,
        type: "POST",
        data: {
            'cat_name': name,
            '_token': token
        }
    }).done(function(data){
        $('#show-'+cat_id).modal('hide');
        var message = '<p class="alert alert-success" role="alert">' + data + '</p>'
        document.querySelector('.message').innerHTML = message;
        $.ajax({
            url: 'http://127.0.0.1:8000/shop.admin/category',
            type: "GET",
        }).done(function(data) {
            $('#data-cat').html(data);
        });
    })
}
