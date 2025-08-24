<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use Exception;

class CreateQuestion extends Component
{
    public $title = '';
    public $optionA = '', $optionB = '', $optionC = '', $optionD = '';
    public $correct_answer = '';

    public function saveQuestion()
    {
        $validatedData = $this->validate([
            'title' => 'required|min:5',
            'optionA' => 'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'correct_answer' => 'required',
        ]);

        try {
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
        } catch (Exception $e) {
            dd($e->getMessage()); // Log the error message for debugging
            session()->flash('error', 'প্রশ্ন সংরক্ষণে সমস্যা হয়েছে। দয়া করে আবার চেষ্টা করুন।');
            return;
        }

        $this->reset(); 
        $this->dispatch('question-created');
        session()->flash('success', 'প্রশ্ন সফলভাবে তৈরি হয়েছে।');
    }

    public function render()
    {
         return view('livewire.dashboard.create-question')
            ->layout('layouts.dashboard'); // Use the new dashboard layout
    }
}