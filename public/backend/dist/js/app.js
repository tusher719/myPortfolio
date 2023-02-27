// Ajax Todos
$(document).ready(function (){
    $(document).on('click','.add_todos',function (e){
        e.preventDefault();
        let name = $('#name').val();
        let desc = $('#desc').val();
        let amount = $('#amount').val();
        // console.log(name+desc+amount);

        $.ajax({
            url: "/todos/store",
            method: 'POST',
            data: {name:name,desc:desc,amount:amount},
            success: function (res){
                if (res.status=='success'){
                    $('#addTodosForm')[0].reset();
                    $('.table').load(location.href+' .table');
                }
            }, error:function(err){
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                });
            }
        });
    })
});

// Image Preview
$(document).ready(function () {
    $('#photo').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showImage').attr('src',e.target.result).width(150);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});


// Portfolio Edit Page Thumbnail Select
function mainThamUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#mainThmb').attr('src',e.target.result).width(360).height(260);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



// Multiple Selected
$(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
            //Uncheck all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
            $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
            //Check all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
            $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
    })

})



// Category Delete
$(function () {
    $(document).on('click', '#processing', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure you want to delete this category?',
            text: "if you delete this, it will be gone forever!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Processing!',
                    'Processing Delete.',
                    'success'
                )
            }
        })

    });
});



// Multi-Image Delete
$(function () {
    $(document).on('click', '#multiDelete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure you want to delete this Image?',
            text: "if you delete this, it will be gone forever!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleting!',
                    'Processing Delete.',
                    'success'
                )
            }
        })

    });
});



// Project Delete With thumbnail & Multi-Images
$(function () {
    $(document).on('click', '#projectDelete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure you want to delete this Project?',
            text: "if you delete this, it will be gone forever!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleting!',
                    'Processing Delete.',
                    'success'
                )
            }
        })

    });
});

// Blog Category Delete
$(function () {
    $(document).on('click', '#blog_cat', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure you want to delete this Category?',
            text: "if you delete this, it will be gone forever!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleting!',
                    'Processing Delete.',
                    'success'
                )
            }
        })

    });
});

// Blog Post Delete
$(function () {
    $(document).on('click', '#blog_post', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure you want to delete this Post?',
            text: "if you delete this, it will be gone forever!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleting!',
                    'Processing Delete.',
                    'success'
                )
            }
        })

    });
});

// Tag Delete
$(function () {
    $(document).on('click', '#tag', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure you want to delete this Tag?',
            text: "if you delete this, it will be gone forever!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleting!',
                    'Processing Delete.',
                    'success'
                )
            }
        })

    });
});

// Budget Category Delete
$(function () {
    $(document).on('click', '#cat', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "if you delete this, it will be gone forever!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleting!',
                    'Processing Delete.',
                    'success'
                )
            }
        })

    });
});

