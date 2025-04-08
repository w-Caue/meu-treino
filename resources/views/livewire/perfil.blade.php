<div>
    <div class="relative">
        <a href="{{ route('dashboard') }}" class="sticky top-0 bg-gray-200 border-b border-gray-300 p-4 flex items-center gap-5">
            <i data-lucide="chevron-left" class="size-6 rounded-full hover:bg-gray-300 hover:cursor-pointer"></i>

            <h1 class="font-bold text-lg text-gray-600">{{ $usuario->name }}</h1>
        </a>
        <div class="bg-blue-300 h-38 rounded-b-2xl">

        </div>
        <div>
            <label class="absolute top-36 mx-3 bg-white rounded-full transition-all cursor-pointer">
                <img src="{{ $usuario->photo }}" class="h-24 w-24 rounded-full object-cover" />
            </label>

            <div class="flex justify-end mx-3 p-2">
                <x-form.button value="Editar Perfil" i="user-round-pen" x-on:click="$dispatch('open-modal-main', { name : 'edit' })" />
            </div>
        </div>
    </div>

    <div class="p-2 font-bold">
        <div>
            <h1 class="text-xl">{{ $usuario->name }}</h1>
            <span class="text-sm text-gray-600">@ {{ $usuario->user }}</span>
        </div>

        <div>
            <p>{{ $usuario->obs }}</p>
        </div>

        <div class="flex gap-2 mt-2">
            <h1>
                0 seguidores
            </h1>
            <h1>
                0 treinos
            </h1>
        </div>
    </div>

    <x-modal.modal-main name="edit" title="Editar" subtitle="Perfil">
        @slot('body')
            <div class="mt-3" x-data="imageViewer()">
                <div class="relative">
                    <div class="bg-gray-300 h-36">

                    </div>
                    <form enctype="multipart/form-data">
                        <div class="shrink-0">
                            <div x-show="imageUrl">
                                <label class="absolute top-26 mx-3 bg-white rounded-full transition-all cursor-pointer">
                                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                        class="h-24 w-24 object-cover rounded-full" :src="imageUrl"
                                        alt="Current profile photo" />

                                    <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                                </label>
                            </div>

                            <div x-show="!imageUrl">
                                <label class="absolute top-26 mx-3 bg-white rounded-full transition-all cursor-pointer">
                                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                        class="h-24 w-24 object-cover rounded-full" src="{{ $usuario->photo }}"
                                        alt="Current profile photo" />

                                    <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                                </label>
                            </div>
                        </div>
                    </form>

                    @slot('button')
                        <x-form.button wire:click="save()" value="Salvar" i="user-round-check" />
                    @endslot
                </div>

                <div class="space-y-4 mt-22">
                    <div class="">
                        <x-form.label value="Nome" />
                        <x-form.input wire:model="nome" />
                    </div>

                    <div class="">
                        <x-form.label value="Bio" />
                        <x-form.textarea wire:model="bio" />
                    </div>
                </div>

            </div>
        @endslot
    </x-modal.modal-main>

    <script>
        function imageViewer() {
            return {
                imageUrl: @entangle('photo'),

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },

            }
        }
    </script>
</div>
