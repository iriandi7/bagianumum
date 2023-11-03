$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        // var link = $(this).attr("href");
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        })
    });
});

$(function(){
    $(document).on('click','#to_be_attention',function(e){
        e.preventDefault();
        // var link = $(this).attr("href");
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Perhatian!',
            text: "Peminjam bertanggung jawab atas kebersihan ruangan dan tidak meninggalkan sampah setelah acara selesai?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, Bertanggung Jawab!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
        })
    });
});

$(function(){
    $(document).on('click','#restore',function(e){
        e.preventDefault();
        // var link = $(this).attr("href");
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "Restore This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Restore it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Restored!',
                'Your file has been restored.',
                'success'
                )
            }
        })
    });
});

$(function(){
    $(document).on('click','#changeRole',function(e){
        e.preventDefault();
        // var link = $(this).attr("href");
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "Change Role?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Changed!',
                'Your role has been changed.',
                'success'
                )
            }
        })
    });
});
