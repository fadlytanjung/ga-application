<script type='text/javascript'>
    $('#tanggal').datetimepicker({
        format: 'YYYY-MM-DD',
    });
   
    $('#waktu').datetimepicker({
        format: 'HH:mm'
    });

    $('#tanggal_update').datetimepicker({
        format: 'YYYY-MM-DD',
    });
   
    $('#waktu_update').datetimepicker({
        format: 'HH:mm'
    });

    // $("#idStok").submit(function(e) {

    // e.preventDefault(); // avoid to execute the actual submit of the form.

    // var values = {};
    // $('.activeInputStok').each(function() {
    //     values[this.name] = this.value;
    // });

    // values.jumlah = Number(values.jumlah)

    // $.ajax({
    //     url: '<?=base_url()?>dashboard/input_stok_process',
    //     data: {sendData: JSON.stringify(values)}, // serializes the form's elements.
    //     type : "POST",
    //     cache: false,
    //     dataType : "json",
    //     success : function(data) {
    //         alert('data berhasil ditambah')
    //         // $("#body").load('<?=base_url()?>dashboard/input_barang');
    //         location.reload()
    //     },
    //     error : function(data) {
    //         alert('Maaf terjadi kesalahan!')
    //     }
    // });


    // });

    $(document).ready(function() {
        $('#stokbarang').DataTable();
       
    });
    $('#new-form').on('click', function(e){
            e.preventDefault();
            $.get("<?=base_url('dashboard/input_barang_create_part')?>", function(data){
                $('#ajax-form').append(data)
            });
        })

    $('#edit-data-stok').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)
        // Isi nilai pada field
        modal.find('#id_stok').attr("value",div.data('id_stok'));
        modal.find('#id_barang').attr("value",div.data('id_barang'));
        modal.find('#id_rak').attr("value",div.data('id_rak'));
        modal.find('#tanggal_masuk').attr("value",div.data('tanggal_masuk'));
        modal.find('#jam').attr("value",div.data('jam'));
        modal.find('#jumlah').val(div.data('jumlah'));
    });

    // $("#idFormUpdateStok").submit(function(e) {

    // e.preventDefault(); // avoid to execute the actual submit of the form.

    // var values = {};
    // $('.activeUpdateStok').each(function() {
    //     values[this.name] = this.value;
    // });
    // values.jumlah = Number(values.jumlah)
    
    // $.ajax({
    //     url: '<?=base_url()?>dashboard/update_stok_process/'+values.id_stok,
    //     data: {sendData: JSON.stringify(values)}, // serializes the form's elements.
    //     type : "POST",
    //     cache: false,
    //     dataType : "json",
    //     success : function(data) {
    //         $("#edit-data-stok").modal('hide');
    //         // $("#body").load('http://localhost/ga-application/dashboard/input_barang');
    //         location.reload();
    //     },
    //     error : function(data) {
    //         alert('Maaf terjadi kesalahan!')
    //     }
    // });


    // });
</script>
