<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->state }}</td>
            <td>{{ $invoice->iva }}</td>
            <td>{{ $invoice->total }}</td>
            <td>{{ $invoice->client->id }}</td>
            <td>{{ $invoice->client->first_name . ' ' . $invoice->client->last_name }}</td>
            <td>{{ $invoice->client->phone_number }}</td>
            <td>{{ $invoice->seller->first_name . ' ' . $invoice->seller->last_name }}</td>
            <td>{{ $invoice->seller->id}}</td>
        </tr>
    @endforeach
    
    
    </tbody>
</table>