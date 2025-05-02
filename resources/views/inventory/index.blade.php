@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Inventory Report</h2>

    @foreach ($stocksByCategory as $category => $stocksBySupplyType)
        <div class="mb-4">
            <h4>{{ ucfirst($category) }} Supplies</h4>
            
            @foreach ($stocksBySupplyType as $supplyType => $stocks)
                <h5 class="mt-3">{{ ucfirst($supplyType) }} Supplies</h5>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Unit</th>
                                <th>Purchased Qty</th>
                                <th>Purchased Amount</th>
                                <th>Received Qty</th>
                                <th>Received Amount</th>
                                <th>Issued</th>
                                <th>Total Quantity</th>
                                <th>Unit Cost</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <td>{{ $stock->item->item_name }}</td>
                                    <td>{{ $stock->unit }}</td>
                                    <td>{{ $stock->purchased_quantity }}</td>
                                    <td>{{ number_format($stock->purchased_amount, 2) }}</td>
                                    <td>{{ $stock->received_quantity }}</td>
                                    <td>{{ number_format($stock->received_amount, 2) }}</td>
                                    <td>{{ $stock->issued_count }}</td>
                                    <td>{{ $stock->total_quantity }}</td>
                                    <td>{{ number_format($stock->unit_cost, 2) }}</td>
                                    <td>{{ number_format($stock->total_amount, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="mt-5">
        <h4>Grand Total</h4>
        <table class="table table-bordered table-sm w-50 mx-auto">
            <thead>
                <tr>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{ number_format($grandTotalAmount, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
