<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Perfil extends Component
{
    use WithFileUploads;

    public $codigo;

    public $nome;

    public $bio;

    public $photo;

    public $img;

    public function dados()
    {
        $user = Auth::user()->id;

        $usuario = User::where('id', $user)->first();

        $this->edit($usuario);

        return $usuario;
    }

    public function edit(User $usuario)
    {
        $this->codigo = $usuario->id;

        $this->nome = $usuario->name;

        $this->bio = $usuario->obs;
    }

    public function save()
    {
        if ($this->img) {
            $path = $this->img->getRealPath();
            $mimetype = pathinfo($path, PATHINFO_EXTENSION);

            $source = file_get_contents($path);
            $base64 = base64_encode($source);
            $blob = 'data:' . $mimetype . ';base64,' . $base64;

            User::where('id', $this->codigo)->update([
                'photo' => $blob,
            ]);
        }

        $usuario = User::where('id', $this->codigo)->update([
            'name' => $this->nome,
            'obs' => $this->bio,
        ]);

        $this->dispatch('close-modal-main');

        return $usuario;
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.perfil', [
            'usuario' => $this->dados()
        ]);
    }
}
