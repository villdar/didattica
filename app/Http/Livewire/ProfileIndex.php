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
    public $profession;
    public $role;
    public $linkedin;
    public $personalSite;
    public $password;
    public $password_confirmation;

    public $current_hashed_password;
    public $current_password_for_email;
    public $current_password_for_password;

    public $prevName;
    public $prevProfession;
    public $prevLinkedin;
    public $prevPersonalSite;
    public $prevRole;
    public $prevEmail;


    public function mount(User $model)
    {
        $this->userId = auth()->user()->id;
        $model = User::find($this->userId);
        $this->name = $model->name;
        $this->email = $model->email;
        $this->profession = $model->profession;
        $this->role = $model->role;
        $this->linkedin = $model->linkedin;
        $this->personalSite = $model->personalsite;

        $this->prevProfession = $model->profession;
        $this->prevRole = $model->role;
        $this->prevLinkedin = $model->linkedin;
        $this->prevPersonalSite = $model->personalsite;
        $this->prevName = $model->name;
        $this->prevEmail = $model->email;
        $this->current_hashed_password = $model->password;
    }

    public function updated()
    {
        $validateData = [
            'name' => 'required',
            'email' => 'required|email',
            // 'profession' => 'required',
            // 'role' => 'required',
            // 'linkedin' => 'required',
            // 'personalSite' => 'required',
        ];

        if ($this->name !== $this->prevName) {
            if (empty($this->name)) {
                $validateData = array_merge($validateData, [
                    'name' => 'required'
                ]);
            }
        }
        if ($this->profession !== $this->prevProfession) {
            if (empty($this->profession)) {
                $validateData = array_merge($validateData, [
                    'profession' => 'required'
                ]);
            }
        }
        if ($this->role !== $this->prevRole) {
            if (empty($this->role)) {
                $validateData = array_merge($validateData, [
                    'role' => 'required'
                ]);
            }
        }
        if ($this->linkedin !== $this->prevLinkedin) {
            if (empty($this->linkedin)) {
                $validateData = array_merge($validateData, [
                    'linkedin' => 'required'
                ]);
            }
        }
        if ($this->personalSite !== $this->prevPersonalSite) {
            if (empty($this->personalSite)) {
                $validateData = array_merge($validateData, [
                    'personalSite' => 'required'
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
        if ($this->profession !== $this->prevProfession) {
            $data = array_merge($data, ['profession' => $this->profession]);
        }
        if ($this->role !== $this->prevRole) {
            $data = array_merge($data, ['role' => $this->role]);
        }
        if ($this->linkedin !== $this->prevLinkedin) {
            $data = array_merge($data, ['linkedin' => $this->linkedin]);
        }
        if ($this->personalSite !== $this->prevPersonalSite) {
            $data = array_merge($data, ['personalSite' => $this->personalSite]);
        }

        if ($this->email !== $this->prevEmail) {
            $data = array_merge($data, ['email' => $this->email]);
        }

        if (!empty($this->password)) {
            $data = array_merge($data, ['password' => $this->password]);
            // dd(bcrypt($this->password));
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
