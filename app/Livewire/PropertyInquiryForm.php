<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PropertyInquiryForm extends Component
{
    public Property $property;
    public string $name = '';
    public string $phone = '';
    public string $message = '';
    public bool $messageSent = false;

    public function mount(Property $property): void
    {
        $this->property = $property;

        // --- নতুন লজিক: লগইন করা ইউজারের ডেটা অটোফিল ---
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->phone = Auth::user()->phone;
        }
    }

    public function submitInquiry(): void
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:11',
            'message' => 'required|string|min:10',
        ]);

        // --- নতুন লজিক: user_id যোগ করা ---
        Message::create([
            'property_id' => $this->property->id,
            'user_id' => Auth::id(), // লগইন করা থাকলে আইডি, না থাকলে null
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
        ]);

        $this->reset(['message']); // শুধু মেসেজ ফিল্ড রিসেট করি, নাম/ইমেইল নয়
        $this->messageSent = true;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.property-inquiry-form');
    }
}
