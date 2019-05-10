<script type='text/javascript'>
     $(document).ready(function() {
        $('#rak').DataTable();
    });
</script>
<script type='text/javascript'>
    $("#idRak").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var values = {};
    $('.activeInputRak').each(function() {
        values[this.name] = this.value;
    });

    $.ajax({
        url: '<?=base_url()?>dashboard/input_rak_process',
        data: {sendData: JSON.stringify(values)}, // serializes the form's elements.
        type : "POST",
        cache: false,
        dataType : "json",
        success : function(data) {
            // setTimeout(() => {
            //     alert('data berhasil ditambah');
            // }, 1000);
            $("#body").load('<?=base_url()?>dashboard/input_rak');
        },
        error : function(data) {
            alert('Maaf terjadi kesalahan!')
        }
    });


    });

    $('#edit-data-rak').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)
        
        // Isi nilai pada field
        modal.find('#id_rak').attr("value",div.data('id_rak'));
        modal.find('#panjang').attr("value",div.data('panjang'));
        modal.find('#lebar').attr("value",div.data('lebar'));
        modal.find('#tinggi').attr("value",div.data('tinggi'));
        modal.find('#zona').attr("value",div.data('zona'));
    });

    $("#idFormUpdateRak").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var values = {};
    $('.activeUpdateRak').each(function() {
        values[this.name] = this.value;
    });

    $.ajax({
        url: '<?=base_url()?>dashboard/update_rak_process/'+values.id_rak,
        data: {sendData: JSON.stringify(values)}, // serializes the form's elements.
        type : "POST",
        cache: false,
        dataType : "json",
        success : function(data) {
            $("#edit-data-rak").modal('hide');
            // $("#body").load('http://localhost/ga-application/dashboard/input_barang');
            location.reload();
        },
        error : function(data) {
            alert('Maaf terjadi kesalahan!')
        }
    });


    });

</script>
<!--Delete Ajax-->
<script type='text/javascript'>
    function delete_data(id)
    {
        if(confirm('Yakin ingin menghapus data?'))
        {
            
            $.ajax({
            url: '<?=base_url()?>dashboard/hapus_rak_process/'+id,
                type : "POST",
                cache: false,
                success : function(data) {
                    location.reload();
                },
                error : function(data) {
                    alert('Maaf terjadi kesalahan!')
                }
            });
    
        }
    }
 
</script>