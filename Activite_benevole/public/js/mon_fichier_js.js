/*

<script>
    $(document).ready(function(){
        $('#cp').on('change', function(){
            var codePostal = $(this).val();
            if(codePostal){
                $.ajax({
                    url: '/getVilles/'+codePostal,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        $('#ville').empty();
                        $.each(data, function(key, value){
                            $('#ville').append('<option value="'+ value.ville +'">'+ value.ville +'</option>');
                        });
                    }
                });
            }else{
                $('#ville').empty();
            }
        });
    });
</script>
*/