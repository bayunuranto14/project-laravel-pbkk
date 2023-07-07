<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$item->user->name}}</h3>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <tr>
                                <th>ID</th>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th>Konser</th>
                                <td>{{ $item->concert->title }}</td>
                            </tr>
                            <tr>
                                <th>Pembeli</th>
                                <td>{{ $item->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Total Transaksi</th>
                                <td>Rp. {{ $item->transaction_total }}</td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>{{ $item->transaction_status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>