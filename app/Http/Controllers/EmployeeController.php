<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('get-employee-data');
    }

    public function store(Request $request)
    {
        $path = $this->getPath($request);
        $url = $this->getUrl($request);

        Log::info("Path: $path");
        Log::info("URL: $url");

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'position' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:employees,email',
            'adress' => 'required|string|max:255',
            'json_data' => 'nullable|string',
        ]);

        $decodedJson = $this->jsonDecode($validatedData);

        $department = $decodedJson['department'] ?? null;
        $salary = $decodedJson['salary'] ?? null;
        $projects = $decodedJson['projects'] ?? [];
        $managerName = $decodedJson['manager']['name'] ?? null;
        $managerEmail = $decodedJson['manager']['email'] ?? null;

        Log::info("Отдел: $department");
        Log::info("Зарплата: $salary");
        Log::info("Проекты: " . implode(', ', $projects));
        Log::info("Менеджер: $managerName, Email: $managerEmail");

        $employee = new Employee();
        $employee->name = $validatedData['name'];
        $employee->surname = $validatedData['surname'];
        $employee->age = $validatedData['age'];
        $employee->position = $validatedData['position'];
        $employee->phone = $validatedData['phone'];
        $employee->email = $validatedData['email'];
        $employee->adress = $validatedData['adress'];
        $employee->save();
    }

    public function update(Request $request, $id)
    {
        $path = $this->getPath($request);
        $url = $this->getUrl($request);

        Log::info("Path: $path");
        Log::info("URL: $url");

        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'position' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:employees,email,' . $id,
            'adress' => 'required|string|max:255',
            'json_data' => 'nullable|string',
        ]);

        $decodedJson = $this->jsonDecode($validatedData);

        $department = $decodedJson['department'] ?? null;
        $salary = $decodedJson['salary'] ?? null;
        $projects = $decodedJson['projects'] ?? [];
        $managerName = $decodedJson['manager']['name'] ?? null;
        $managerEmail = $decodedJson['manager']['email'] ?? null;

        Log::info("Отдел: $department");
        Log::info("Зарплата: $salary");
        Log::info("Проекты: " . implode(', ', $projects));
        Log::info("Менеджер: $managerName, Email: $managerEmail");


        $employee->update($validatedData);
    }

    public function getPath(Request $request): string
    {
        return $request->path();
    }

    public function getUrl(Request $request): string
    {
        return $request->url();
    }

    public function jsonDecode(array $data): ?array
    {
        if (!empty($data['json_data'])) {
            $jsonData = json_decode($data['json_data'], true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \InvalidArgumentException('Неверный формат JSON.');
            }

            return $jsonData;
        }

        return null;
    }
}
