$(document).ready(function() {
    // class data tabele class
    $('#post').DataTable();

    // $('.nav-item').removeClass('active');
    // $('.nav-link').removeClass('active');


    // delete function 
    $('body').on("click", ".delete", function() {
        var id = $(this).attr('rel');
        var record = $(this).attr('record');
        console.log(id, record);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // swalWithBootstrapButtons.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // )
                function test() {
                    window.location.href = "delete-" + record + "/" + id;
                }
                test();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    });

    // update user status 
    $('body').on('click', ".updateAdminStatus", function() {
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-admin-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                admin_id: admin_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#admin-" + admin_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#admin-" + admin_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

  
});