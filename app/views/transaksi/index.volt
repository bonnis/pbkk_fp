<div class="page-header">
    <h2>Data Bantuan</h2>
</div>

{{ link_to('transaksi/add', 'Tambah bantuan', 'class': 'btn btn-primary mb-3 mt-2 btn-success') }}

<div>
    <table id="table">
        <thead>
            <tr>
                <th>Berupa</th>
                <th>Donatur</th>
                <th>Kategori</th>
                <th>Kode Transaksi</th>
                <th>Waktu Transaksi</th>
            </tr>
        </thead>
        <tbody>
            {% for data in transaksis %}
            <tr>
                <td>{{data.name}}</td>
                <td>{{data.transaksi.users.name}}</td>
                <td>{{data.kategori.nama}}</td>
                <td>{{data.transaksi.id}}</td>
                <td>{{data.transaksi.created_at}}</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>



</script>