<!-- resources/views/shippings/table.blade.php -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Costo</th>
            <th>Cantidad</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shippings as $shipping)
            <tr>
                <td>{{ $shipping->uuid }}</td>
                <td>{{ $shipping->customer->name }}</td>
                <td>{{ $shipping->product->name }}</td>
                <td>{{ $shipping->cost }} {{ $shipping->currency }}</td>
                <td>{{ $shipping->quantity }}</td>
                <td><span class="badge bg-info">{{ $shipping->status->name }}</span></td>
                <td>
                    <a href="{{ route('admin.shipping.show', $shipping) }}" class="btn btn-sm btn-success">Ver</a>
                    <a href="{{ route('admin.shipping.edit', $shipping) }}" class="btn btn-sm btn-warning">Editar</a>
                    <a href="{{ route('admin.shipping.editStatus', $shipping) }}" class="btn btn-sm btn-secondary">Estado</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
<div class="d-flex justify-content-center">
    {{ $shippings->links() }}
</div>
