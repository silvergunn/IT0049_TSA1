<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'title' => 'All Tasks',
            'tasks' => $taskModel
                ->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll(),
        ];

        return view('tasks/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Task',
            'validation' => service('validation'),
        ];

        return view('tasks/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => [
                'label' => 'Task title',
                'rules' => 'required|max_length[150]',
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[pending,in_progress,completed]',
            ],
            'task_date' => [
                'label' => 'Task date',
                'rules' => 'required|valid_date[Y-m-d]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task added successfully.');
    }

    public function edit(int $id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $data = [
            'title' => 'Edit Task',
            'task' => $task,
            'validation' => service('validation'),
        ];

        return view('tasks/edit', $data);
    }

    public function update(int $id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $rules = [
            'title' => [
                'label' => 'Task title',
                'rules' => 'required|max_length[150]',
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[pending,in_progress,completed]',
            ],
            'task_date' => [
                'label' => 'Task date',
                'rules' => 'required|valid_date[Y-m-d]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task updated successfully.');
    }

    public function delete(int $id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if ($task === null) {
            return redirect()
                ->to(site_url('tasks'))
                ->with('error', 'Task not found.');
        }

        $taskModel->delete($id);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task deleted successfully.');
    }
}