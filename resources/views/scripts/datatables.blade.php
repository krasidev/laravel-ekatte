<script>
$.extend(true, $.fn.dataTable.defaults, {
    responsive: true,
    classes: {
        sLength: 'dataTables_length form-group',
        sLengthSelect: 'form-control',
        sFilter: 'dataTables_filter form-group',
        sFilterInput: 'form-control'
    },
    language: {
        lengthMenu: '{{ __('datatables.lengthMenu') }}',
        search: '{{ __('datatables.search') }}',
        searchPlaceholder: '{{ __('datatables.searchPlaceholder') }}',
        loadingRecords: '{{ __('datatables.loadingRecords') }}',
        emptyTable: '{{ __('datatables.emptyTable') }}',
        zeroRecords: '{{ __('datatables.zeroRecords') }}',
        info: '{{ __('datatables.info') }}',
        infoEmpty: '{{ __('datatables.infoEmpty') }}',
        infoFiltered: '{{ __('datatables.infoFiltered') }}',
        processing: '<div class="spinner-border" role="status"><span class="sr-only"></span></div>',
        paginate: {
            first: '<i class="fas fa-angle-double-left"></i>',
            previous: '<i class="fas fa-angle-left"></i>',
            next: '<i class="fas fa-angle-right"></i>',
            last: '<i class="fas fa-angle-double-right"></i>'
        }
    }
});

$(document).on('click', '.dt-bt-delete', function(e) {
    var element = $(this);

    Swal.fire({
        icon: 'question',
        title: '{{ __('messages.panel.alert-question.title') }}',
        text: '{{ __('messages.panel.alert-question.text') }}',
        confirmButtonText: '{{ __('messages.panel.alert-question.buttons.confirm') }}',
        cancelButtonText: '{{ __('messages.panel.alert-question.buttons.cancel') }}',
        showCancelButton: true,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'swal2-styled btn btn-danger m-1',
            cancelButton: 'swal2-styled btn btn-primary m-1'
        }
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: element.attr('href'),
                type: 'DELETE',
                success: function(data) {
                    element.closest('table').DataTable().row(element.parents('tr')).remove().draw();
                }
            });
        }
    });

    e.preventDefault();
});

$(document).on('click', '.dt-bt-restore', function(e) {
    var element = $(this);

    Swal.fire({
        icon: 'question',
        title: '{{ __('messages.panel.alert-question-restore.title') }}',
        text: '{{ __('messages.panel.alert-question-restore.text') }}',
        confirmButtonText: '{{ __('messages.panel.alert-question-restore.buttons.confirm') }}',
        cancelButtonText: '{{ __('messages.panel.alert-question-restore.buttons.cancel') }}',
        showCancelButton: true,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'swal2-styled btn btn-success m-1',
            cancelButton: 'swal2-styled btn btn-primary m-1'
        }
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: element.attr('href'),
                type: 'PUT',
                success: function(data) {
                    element.closest('table').DataTable().row(element.parents('tr')).remove().draw();
                }
            });
        }
    });

    e.preventDefault();
});
</script>