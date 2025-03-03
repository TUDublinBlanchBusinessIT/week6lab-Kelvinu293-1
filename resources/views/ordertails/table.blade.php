<div class="table-responsive">
    <table class="table" id="ordertails-table">
        <thead>
        <tr>
            <th>Productid</th>
        <th>Orderid</th>
        <th>Quantity</th>
        <th>Subtotal</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ordertails as $ordertail)
            <tr>
                <td>{{ $ordertail->productid }}</td>
            <td>{{ $ordertail->orderid }}</td>
            <td>{{ $ordertail->quantity }}</td>
            <td>{{ $ordertail->subtotal }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ordertails.destroy', $ordertail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ordertails.show', [$ordertail->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ordertails.edit', [$ordertail->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
