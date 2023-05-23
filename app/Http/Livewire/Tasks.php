<?php

namespace App\Http\Livewire;

use App\Models\Tasks as Task;
use Livewire\Component;

class Tasks extends Component
{

    public $tasks, $title, $description, $task_id;
    public $updateMode = false;


    public function render()
    {
        $this->tasks = Task::all();

        return view('livewire.tasks');
    }

    private function inputFields(){
        $this->title = '';
        $this->description = '';
    }

    public function store()
    {

        $data = $this->validate([
            'title' => 'required|max:50|string',
            'description' => 'required|max:50|string',
        ]);

        Task::create($data);

        session()->flash('message', 'Task Created Successfully.');

        $this->inputFields();

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->inputFields();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->title = $task->title;
        $this->description = $task->description;

        $this->updateMode = true;
    }


    public function update()
    {
        $data = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = Task::find($this->task_id);
        $task->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Task Updated Successfully.');
        $this->inputFields();
    }

    public function completed($id) {
        $task = Task::find($id);

        if ($task->status == "incomplete")
        {
            $task->update([
               'status' => 'completed'
            ]);
        }
        else
        {
            $task->update([
                'status' => 'incomplete'
            ]);
        }

        session()->flash('message', 'Task Updated Successfully.');

    }

    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');


    }


}
