<div id="tableExample4" data-list='{"valueNames":["id", "name", "product", "provider", "cost", "quantity", "status"], "page":10, "pagination":true, "filter":{"key":"status"}}'>
    <div class="row justify-content-end g-0">
        <div class="col-auto px">
            <select class="form-select form-select-sm mb-3" data-list-filter="data-list-filter">
                <option value="">Seleccciona un estatus</option>
                @foreach ($statuces as $status)
                    <option value="{{ $status->name }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-sm fs-9 mb-0">
            <thead>
                <tr class="bg-body-highlight">
                    <th class="sort bordet-top border-translucent ps-3" data-sort="id">Id</th>
                    <th class="sort bordet-top border-translucent" data-sort="name">Cliente</th>
                    <th class="sort bordet-top border-translucent" data-sort="product">Producto</th>
                    <th class="sort bordet-top border-translucent" data-sort="provider">Proveedor</th>
                    <th class="sort bordet-top border-translucent" data-sort="cost">Costo</th>
                    <th class="sort bordet-top border-translucent" data-sort="quantity">Cantidad</th>
                    <th class="sort bordet-top border-translucent text-end pe-3" data-sort="status">Estatus</th>
                    <th class="sort bordet-top border-translucent text-center" data-sort="actions">Acciones</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($shippings as $shipping)
                    <tr>
                        <td class="align-middle ps-3 id">{{ $shipping->id }}</td>
                        <td class="align-middle name">{{ $shipping->customer->name }}</td>
                        <td class="align-middle product">{{ $shipping->product->name }}</td>
                        <td class="align-middle provider">{{ $shipping->user->first_name }}</td>
                        <td class="align-middle cost">{{ $shipping->cost }} {{ $shipping->currency }}</td>
                        <td class="align-middle quantity">{{ $shipping->quantity }}</td>
                        <td class="align-middle status text-end py-3 pe-3">
                            @php
                                $statusId = $shipping->status->id;
                                $statusClass = $statusMap[$statusId]['class'] ?? 'badge-phoenix-default';
                                $statusIcon = $statusMap[$statusId]['icon'] ?? 'fa-question';
                            @endphp

                            <div class="badge badge-phoenix fs-10 {{ $statusClass }}">
                                <span class="fw-bold">{{ $shipping->status->name }}</span>
                                <span class="ms-1 fas {{ $statusIcon }}"></span>
                            </div>                           
                        </td>
                        {{-- <td class="align-middle payment text-end py-3 pe-3">
                            <a href="{{ route('admin.shipping.show', $shipping) }}" class="btn btn-sm btn-success">Ver</a>
                            <a href="{{ route('admin.shipping.edit', $shipping) }}" class="btn btn-sm btn-warning">Editar</a>
                            <a href="{{ route('admin.shipping.editStatus', $shipping) }}" class="btn btn-sm btn-secondary">Estado</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-3"><span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
        <div class="d-flex">
          <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
          <ul class="mb-0 pagination"></ul>
          <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
        </div>
    </div>
</div>
