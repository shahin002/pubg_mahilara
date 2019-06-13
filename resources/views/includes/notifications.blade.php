
@if(!empty(Session::get('successMsg')))
    <script>
        $.notify({
            icon: 'glyphicon glyphicon-ok',
            title: '<strong>Success:</strong>',
            message: '{{Session::get('successMsg')}}'
        },{
            type: 'success',
        });
    </script>

@elseif(!empty(Session::get('errMsg')))
<script>
    $.notify({
        icon: 'glyphicon glyphicon-warning-sign',
        title: '<strong>Error:</strong>',
        message: '{{Session::get('errMsg')}}'
    },{
        type: 'danger'
    });
</script>
@endif