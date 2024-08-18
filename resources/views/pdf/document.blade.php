
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conveyance Voucher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #f4f4f4;
            color: #000000;
            padding: 10px 15px;
            border-radius: 5px 5px 0 0;
        }
        .card-header h5 {
            margin: 0;
            font-size: 20px;
        }
        .card-body {
            padding: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding-left: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            padding-left: 10px;
            font-weight: bold;
            text-align: center;
        }
        .total{
            text-align: right;
        }
        .table-stripped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .total-row {
            font-weight: bold;
            background-color: #e0e0e0;
            color: #fff;
        }
    </style>4
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h5>Conveyance Voucher</h5>
        </div>
        <div class="card-body">
            <table class="table table-stripped table-hover">
             
              <tr>
                <th>Name of Employee :</th>
                <td colspan="2">samir </td>
                <th>Designation :</th>
                {{-- <td colspan="2">{{ $vouchers->user->designation->name ?? 'none' }}</td> --}}
                <td colspan="2"> IT </td>
            </tr>
            <tr>
                <th>Department :</th>
                {{-- <td colspan="2">{{ $vouchers->user->desgnation->department->name ?? 'none'}}</td> --}}
                <td colspan="2">NETwork</td>
                <th>Employee ID :</th>
                {{-- <td colspan="2">{{ $vouchers->user->identity }}</td> --}}
                <td colspan="2">212-212</td>
            </tr>

            <tr>
                <th rowspan="2">Date</th>
                <th colspan="2">Place</th>
                <th rowspan="2">Mode of Conveyance</th>
                <th rowspan="2">Amount Tk.</th>
                <th rowspan="2">Remarks</th>
            </tr>
            <tr> 
                <th>From</th>
                <th>To</th>
            </tr>

            @foreach ( $vouchers as $voucher )
            <tr>
                <td>{{ $voucher->created_at->format('d/m/Y') }}</td>
                <td>{{ $voucher->from_location }}</td>
                <td>{{ $voucher->to_location }}</td>
                <td>{{ $voucher->conveyance->name }}</td>
                <td>{{ $voucher->amount }}</td>
                <td>{{ $voucher->remarks }}</td>
                <td></td>
            </tr>
            @endforeach
                
            <tr class="total-row">
                <th colspan="4" class="total">Total Tk.</th>
                {{-- <td colspan="2">{{ $total_amount }}</td> --}}
                <td colspan="2">0909</td>
            </tr>
            <tr>
                <th>Prepared By:</th>
                {{-- <td colspan="2">{{ $vouchers->user->name }}</td> --}}
                <td colspan="2">samir</td>
                <th>Approved By:</th>
                <td colspan="2">admin</td>
            </tr>

            </table>
        </div>
    </div>
</body>
</html>