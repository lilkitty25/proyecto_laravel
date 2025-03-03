<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gradient-to-r from-pink-400 via-purple-500 to-indigo-600">
        <div class="bg-white bg-opacity-80 p-6 rounded-2xl shadow-lg">

            <form action="{{route('alumnos.store')}}" method="post">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div>
                            <x-input-label for="nombre" value="Nombre" />
                            <x-text-input id="nombre" class="block mt-1 w-full border-2 border-pink-300 focus:ring-pink-500 focus:border-pink-500" type="text" name="nombre" />
                        </div>
                        <div>
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" class="block mt-1 w-full border-2 border-pink-300 focus:ring-pink-500 focus:border-pink-500" type="email" name="email" />
                        </div>
                        <div>
                            <x-input-label for="edad" value="Edad" />
                            <x-text-input id="edad" class="block mt-1 w-full border-2 border-pink-300 focus:ring-pink-500 focus:border-pink-500" type="number" name="edad" />
                        </div>
                        <div class="flex flex-row justify-between p-3">
                            <button class="btn bg-gradient-to-r from-pink-400 to-purple-500 text-white hover:bg-gradient-to-l hover:from-purple-500 hover:to-pink-400" type="submit">Guardar</button>
                            <button class="btn bg-gradient-to-r from-purple-500 to-indigo-600 text-white hover:bg-gradient-to-l hover:from-indigo-600 hover:to-purple-500" type="button" onclick="window.history.back()">Cancelar</button>
                        </div>
                    </div>

                    <div>
                        <div class="overflow-x-auto h-60">
                            <table class="table table-xs table-pin-rows table-pin-cols bg-gradient-to-r from-pink-100 via-purple-100 to-indigo-100 shadow-md">
                                <thead>
                                <tr class="bg-gradient-to-r from-pink-200 via-purple-300 to-indigo-300">
                                    <th class="text-white">Idioma</th>
                                    <th class="text-white">Nivel</th>
                                    <th class="text-white">Título</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(config("idiomas") as $idioma)
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{$idioma}}" name="idiomas[]" id="">
                                            {{$idioma}}
                                        </td>
                                        <td>
                                            <select class="text-sm h-8 rounded-sm" name="nivel[{{$idioma}}]" id="">
                                                <option value="Básico">Básico</option>
                                                <option value="Medio">Medio</option>
                                                <option value="Alto">Alto</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="text-sm h-8 rounded-sm" name="titulo[{{$idioma}}]" id="">
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                            </select>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No hay idiomas disponibles.</td>
                                    </tr>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-layouts.layout>
