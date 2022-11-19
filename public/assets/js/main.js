$('.edica-header .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


let likeButtons = document.querySelectorAll('#btn-like');
for (let likeButton of likeButtons) {
    likeButton.addEventListener('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '/posts/' + id + '/likes',
            data: {id: id},
            success: function (res) {
                like(id);
            },
            error: function (err) {
                alert(err);
            }
        });
    });
}

function like(id) {
    let likes = document.querySelectorAll('#like[data-like="' + id + '"]');
    for (let like of likes) {
        let count = like.querySelector('#count');
        let icon = like.querySelector('#icon');
        let iconClass = icon.classList;
        if (iconClass.contains('far')) {
            iconClass.remove('far');
            iconClass.add('fas');
            +count.textContent++;
        } else if (iconClass.contains('fas')) {
            iconClass.remove('fas');
            iconClass.add('far');
            +count.textContent--;
        }
    }
}

