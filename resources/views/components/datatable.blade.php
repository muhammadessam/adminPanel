@props(['id' => 'table'])

<script>
    $('#{{$id}}').DataTable({
        "language": {
            "url": "{{asset('admin/plugins/datatables/extensions/i18n/Arabic.json')}}"
        },
        "info": false,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "autoWidth": true
    });
</script>
@if(session('locale') == 'ar')
    <style>
        #{{$id}}_filter {
            float: left;
        }
    </style>
@endif