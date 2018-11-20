<table class="table table-responsive" id="pqrs-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Documento</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Motivo De Solicitud</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pqrs as $pqrs)
        <tr>
            <td>{!! $pqrs->nombre !!}</td>
            <td>{!! $pqrs->documento !!}</td>
            <td>{!! $pqrs->correo !!}</td>
            <td>{!! $pqrs->telefono !!}</td>
            <td>{!! $pqrs->direccion !!}</td>
            <td>{!! $pqrs->motivo_de_solicitud !!}</td>
            <td>
                {!! Form::open(['route' => ['pqrs.destroy', $pqrs->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pqrs.show', [$pqrs->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pqrs.edit', [$pqrs->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>