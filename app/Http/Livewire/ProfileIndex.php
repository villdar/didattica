<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileIndex extends Component
{
    public $userId;
    public $name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    public $current_hashed_password;
    public $current_password_for_email;
    public $current_password_for_password;

    public $prevName;
    public $prevEmail;


    public function mount(User $model)
    {
        $this->userId = auth()->user()->id;
        $model = User::find($this->userId);
        $this->name = $model->name;
        $this->email = $model->email;

        $this->prevName = $model->name;
        $this->prevEmail = $model->email;
        $this->current_hashed_password = $model->password;
    }

    public function updated()
    {
        $validateData = [
            'name' => 'required',
            'email' => 'required|email'
        ];

        if ($this->name !== $this->prevName) {
            if (empty($this->name)) {
                $validateData = array_merge($validateData, [
                    'name' => 'required'
                ]);
            }
        }
        if ($this->email !== $this->prevEmail) {
            if (empty($this->email)) {
                $validateData = array_merge($validateData, [
                    'email' => 'required|email'
                ]);
            }

            $validateData = array_merge($validateData, [
                'current_password_for_email' => ['required']
            ]);
        }

        if (!empty($this->password)) {
            $validateData = array_merge($validateData, [
                'current_password_for_password' => 'required',
                'password' => 'confirmed',
                'password_confirmation' => 'required'
            ]);
        }

        $this->validate($validateData);
    }

    public function save()
    {
        $data = [];

        if ($this->name !== $this->prevName) {
            $data = array_merge($data, ['name' => $this->name]);
        }

        if ($this->email !== $this->prevEmail) {
            $data = array_merge($data, ['email' => $this->email]);
        }

        if (!empty($this->password)) {
            $data = array_merge($data, ['password' => Hash::make($this->password)]);
        }

        if (count($data)) {
            User::find($this->userId)->update($data);
            return redirect(route('profile'));
        }
    }

    public function render()
    {
        return view('livewire.profile-index');
    }
}
