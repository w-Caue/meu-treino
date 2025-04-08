<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ isDarkMode: localStorage.getItem('dark') === 'true' }" x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': isDarkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Meu Treino</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">

    <style>
        * {
            font-family: "Nunito", sans-serif;
            /* Nunito */
            letter-spacing: 3px;
        }

        [x-cloak] {
            display: none;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body x-data="sidebar()" class="font-sans antialiased text-gray-600 bg-gray-200 dark:bg-gray-950 ">

    <div class="mx-auto container">
        <div class="flex h-screen">
            @include('components.layouts.app.sidebar')

            <main class="h-full w-full pb-16 border-r border-gray-300 overflow-y-auto">

                <div class="">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    {{-- <script>
        function copiarParaClipboard(valor) {
            // Cria um elemento de input para armazenar o valor
            var inputElement = document.createElement("input");

            // Define o valor do input para o valor passado por parâmetro
            inputElement.value = valor;

            // Adiciona o input ao corpo do documento
            document.body.appendChild(inputElement);

            // Seleciona o conteúdo do input
            inputElement.select();

            // Copia o conteúdo para a área de transferência
            document.execCommand("copy");

            // Remove o input do corpo do documento
            document.body.removeChild(inputElement);

            console.log("Valor copiado para o clipboard: " + valor);
        }
    </script>

     --}}

    <script src=" {{ asset('js/main.js') }}"></script>

</body>

</html>
