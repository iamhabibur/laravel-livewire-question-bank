<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;

class CreateQuestion extends Component
{
    public $title = '';
    public $optionA = '', $optionB = '', $optionC = '', $optionD = '';
    public $correct_answer = '';

    public function saveQuestion()
    {
        $this->validate([
            'title' => 'required|min:5',
            'optionA' => 'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'correct_answer' => 'required',
        ]);

        Question::create([
            'title' => $this->title,
            'options' => [
                'a' => $this->optionA,
                'b' => $this->optionB,
                'c' => $this->optionC,
                'd' => $this->optionD,
            ],
            'correct_answer' => $this->correct_answer,
        ]);

        $this->reset(); // ফর্ম রিসেট করার জন্য

        // অন্য কম্পোনেন্টকে জানানোর জন্য একটি ইভেন্ট
        $this->dispatch('question-created');
        
        session()->flash('success', 'প্রশ্ন সফলভাবে তৈরি হয়েছে।');
    }

    public function render()
    {
         return view('livewire.dashboard.create-question')
            ->layout('layouts.dashboard'); // Use the new dashboard layout
    }
}