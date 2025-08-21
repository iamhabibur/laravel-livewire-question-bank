<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;

class ShowQuestions extends Component
{
    protected $listeners = ['question-created' => '$refresh'];

    public function render()
    {
        $questions = Question::latest()->get();
        return view('livewire.show-questions', ['questions' => $questions]);
    }
}