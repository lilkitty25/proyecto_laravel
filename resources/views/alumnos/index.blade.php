<x-layouts.layout>
<table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo Electrónico</th>
            <th>Fecha de Inscripción</th>
            <th>Acciones</th>
        </tr>
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->apellido}}</td>
                <td>{{$alumno->fecha_nacimiento}}</td>
                <td>{{$alumno->correo_electronico}}</td>
                <td>{{$alumno->fecha_inscripcion}}</td>
                
            </tr>
        @endforeach
</table>
</x-layouts.layout>



