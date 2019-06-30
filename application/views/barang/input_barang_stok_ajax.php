<!---Update Ajax-->
<script type='text/javascript'>
    $('#edit-data').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)

        // Isi nilai pada field
        modal.find('#id_barang').attr("value",div.data('id'));
        modal.find('#nama_barang').attr("value",div.data('nama'));
        modal.find('#panjang').attr("value",div.data('panjang'));
        modal.find('#lebar').attr("value",div.data('lebar'));
        modal.find('#tinggi').attr("value",div.data('tinggi'));
        modal.find('#type').val(div.data('type'));
    });

    $("#idFormUpdate").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var values = {};
    $('.activeUpdate').each(function() {
        values[this.name] = this.value;
    });

    $.ajax({
        url: '<?=base_url()?>dashboard/update_barang_process/'+values.id_barang,
        data: {sendData: JSON.stringify(values)}, // serializes the form's elements.
        type : "POST",
        cache: false,
        dataType : "json",
        success : function(data) {
            $("#edit-data").modal('hide');
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
    function delete_data(id,type)
    {
        if(confirm('Yakin ingin menghapus data?'))
        {
            $.ajax({
            url: '<?=base_url()?>dashboard/hapus_barang_process/'+id+'/'+type,
                type : "POST",
                cache: false,
                success : function(data) {
                    location.reload();
                },
                error : function(data) {
                    console.log('Maaf terjadi kesalahan!')
                }
            });
    
        }
    }
 
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#stokbarang').DataTable();
        $('#penempatanbarang').DataTable();
    });
</script>


