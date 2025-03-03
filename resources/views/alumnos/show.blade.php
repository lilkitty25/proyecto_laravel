<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gradient-to-r from-pink-400 via-purple-500 to-indigo-600">
        <div class="bg-white p-3 rounded-2xl shadow-xl">

            <div class="grid grid-cols-2 gap-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="nombre" value="Nombre"/>
                        <span class="block mt-1 w-full">{{$alumno->nombre}}</span>
                    </div>
                    <div>
                        <x-input-label for="email" value="Email"/>
                        <span class="block mt-1 w-full">{{$alumno->email}}</span>
                    </div>
                    <div>
                        <x-input-label for="edad" value="Edad"/>
                        <span class="block mt-1 w-full">{{$alumno->edad}}</span>
                    </div>
                </div> {{--end div datos alumno--}}

                <div class="overflow-x-auto mt-4">
                    <table class="table table-auto w-full text-white">
                        <thead>
                        <tr class="bg-gradient-to-r from-pink-500 via-purple-600 to-indigo-700 text-white">
                            <th>{{__("Idioma")}}</th>
                            <th>{{__("Nivel")}}</th>
                            <th>{{__("Título")}}</th>
                        </tr>
                        </thead>
                        <tbody class="text-white">
                        @foreach($alumno->idiomas as $idioma)
                            <tr class="hover:bg-gradient-to-r from-pink-300 via-purple-400 to-indigo-400">
                                <td>{{$idioma->idioma}}</td>
                                <td>{{$idioma->nivel}}</td>
                                <td>{{$idioma->titulo}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex flex-row justify-between p-3 mt-6">
                <button class="btn bg-gradient-to-r from-pink-500 to-purple-600 text-white hover:bg-gradient-to-r hover:from-pink-400 hover:to-purple-500">Guardar</button>
                <button class="btn bg-gradient-to-r from-pink-500 to-purple-600 text-white hover:bg-gradient-to-r hover:from-pink-400 hover:to-purple-500">Cancelar</button>
            </div>

        </div>
    </div>
</x-layouts.layout>
