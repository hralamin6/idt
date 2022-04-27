<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setup;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class SetupComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $logo,$logoUrl, $cover, $imam, $teacher, $mosque, $madrasa, $locked, $login, $register, $setup;

    public $site_url, $admin, $site_name, $email, $phone, $location, $facebook, $twitter, $youtube, $about;

    public function mount()
    {
        $setting = Setup::first();
        if ($setting) {
            $setup = $setting;
            $this->setup = $setup;
            $this->site_url = $setup->site_url;
            $this->admin = $setup->admin;
            $this->logoUrl = $setup->logo;
            $this->site_name = $setup->site_name;
            $this->email = $setup->email;
            $this->phone = $setup->phone;
            $this->location = $setup->location;
            $this->facebook = $setup->facebook;
            $this->twitter = $setup->twitter;
            $this->youtube = $setup->youtube;
            $this->about = $setup->about;
        }

    }

    public function updateSetting()
    {
        $this->validate([
            'site_url' => 'url',
            'logoUrl' => 'nullable',
            'admin' => 'required',
            'email' => 'email',
            'phone' => 'numeric',
            'location' => 'nullable',
            'facebook' => 'url',
            'twitter' => 'url',
            'youtube' => 'url',
            'about' => 'nullable',
            'site_name' => ['required', 'min:4', 'max:222']

        ]);
        $setup = Setup::first();
        $setup->site_url = $this->site_url;
        $setup->admin = $this->admin;
        $setup->logo = $this->logoUrl;
        $setup->site_name = $this->site_name;
        $setup->email = $this->email;
        $setup->phone = $this->phone;
        $setup->location = $this->location;
        $setup->facebook = $this->facebook;
        $setup->twitter = $this->twitter;
        $setup->youtube = $this->youtube;
        $setup->about = $this->about;
        $setup->save();
        $this->alert('success', 'Successfully updated');
    }

    public function logo()
    {
        $this->validate([
            'logo'=>'required|image',
        ]);
        if (($this->logo)) {
            Setup::first()->clearMediaCollection('logo');
            Setup::first()->addMedia($this->logo->getRealPath())->toMediaCollection('logo');
            $this->alert('success', 'Logo successfully updated');
        }
    }

    public function render()
    {
        return view('livewire.admin.setup-component')->layout('layouts.app');
    }
}
