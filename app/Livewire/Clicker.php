<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{

    use WithPagination;

    public $title = "Clicker Livewire Component";
    // #[Validate('required|max:50|min:3')]
    public $name = '';
    // #[Validate('required|max:50|min:3|email:rfc,dns|unique:users,email')]
    public $email = '';
    // #[Validate('required|max:50|min:5')]
    public $password = '';


    public $Update_name = '';
    public $Update_email = '';
    public $Update_password = '';
    public $search;


    public function submit()
    {
        // $this->validate();
        $this->validate([
            'name' => 'required|max:50|min:3',
            'email' => 'required|max:50|min:3|unique:users,email',
            'password' => 'required|max:50|min:5',
        ], [
            'name.required' => 'nama harus diisi.',
            'name.max' => 'nama tidak boleh melebihi 50 karakter.',
            'name.min' => 'nama harus minimal 3 karakter.',
            'email.required' => 'email harus diisi.',
            'email.max' => 'email tidak boleh melebihi 50 karakter.',
            'email.min' => 'email harus setidaknya 3 karakter.',
            'email.email' => 'email harus berupa alamat email yang valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'kata sandi harus diisi.',
            'password.max' => 'kata sandi tidak boleh melebihi 50 karakter.',
            'password.min' => 'Kata Sandi harus minimal 5 karakter.',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),

        ]);

        $this->reset();
        session()->flash('message', 'User Berhasil ditambahkan.');
    }

    public function createUser()
    {
        User::create([
            'name' => fake('id_ID')->name(),
            'email' => fake('id_ID')->email(),
            'password' => bcrypt('password'),

        ]);
    }

    public function updateUser($id)
    {
        $this->validate([
            'name' => 'required|max:50|min:3',
            'email' => 'required|max:50|min:3|unique:users,email,' . $id,
            'password' => 'required|max:50|min:5',
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),

        ]);

        $this->reset();
        session()->flash('message', 'User Berhasil diupdate.');
    }


    public function deleteUser($id)
    {
        User::destroy($id);
    }

    public function render()
    {
        // $title = "Clicker Livewire Component";
        $users = User::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->Paginate(5);

        return view('livewire.clicker', compact('users'));
    }

    public function click()
    {
        return dump('Thank you to have clicked');
    }
}
