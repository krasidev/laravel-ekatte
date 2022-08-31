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
</script>