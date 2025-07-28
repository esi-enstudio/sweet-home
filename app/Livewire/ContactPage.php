<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Settings\ContactPageSettings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class ContactPage extends Component
{

    // সেটিংস থেকে আসা ডেটা
    public array $settings = [];

    // ফর্মের জন্য প্রোপার্টি
    public string $name = '';
    public string $email = '';
    public string $service_type = '';
    public string $phone = '';
    public string $message = '';

    public function mount(ContactPageSettings $contactSettings): void
    {
        $this->settings = $contactSettings->toArray();
    }

    public function submitForm(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|digits:11',
            'service_type' => 'required|string',
            'message' => 'required|string|min:10',
        ]);

        Contact::create($validated);

        session()->flash('success', 'Thank you! Your message has been received.');
        $this->reset(['name', 'email', 'phone', 'service_type', 'message']);
    }



    public function render(): Factory|View|Application
    {
        return view('livewire.contact-page')
            ->title('Contact Us' .' - '. config('app.name'));
    }
}
