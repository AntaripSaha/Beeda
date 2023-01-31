<html>

<body>
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Voucher No</th>
                <th>Scratch Code</th>
                <th>Barcode</th>
            </tr>
        </thead>
        @foreach ($data as $row)
        <tr>
            <td>{{$row['sl']}}</td>
            <td>{{$row['voucher_no']}}</td>
            <td>{{$row['scratch_code']}}</td>
            <!-- <td>{{$row['path']}}</td> -->
            <!-- <td>{{$row['barcode']}}</td> -->
            <td>
                <img src="{{$row['path']}}" alt="">
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>