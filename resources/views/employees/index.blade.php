<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div class="min-w-0">
                <h2 class="font-semibold text-xl text-slate-900 leading-tight truncate">Employees</h2>
                <p class="mt-1 text-sm text-slate-600">Manage your employee directory.</p>
            </div>

            <a href="{{ route('employees.create') }}"
               class="inline-flex items-center rounded-md bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Add employee
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                <th class="px-5 py-3">Employee</th>
                                <th class="px-5 py-3">Department</th>
                                <th class="px-5 py-3">Job title</th>
                                <th class="px-5 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse ($employees as $employee)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-5 py-3">
                                        <div class="flex items-center gap-3">
                                            @if ($employee->photo_path)
                                                <img src="{{ asset('storage/'.$employee->photo_path) }}" alt="" class="h-9 w-9 rounded-md object-cover border border-slate-200" />
                                            @else
                                                <div class="h-9 w-9 rounded-md bg-slate-100 border border-slate-200"></div>
                                            @endif
                                            <div class="min-w-0">
                                                <div class="font-semibold text-slate-900 truncate">{{ $employee->full_name }}</div>
                                                <div class="text-sm text-slate-600 truncate">{{ $employee->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-700">{{ $employee->department ?: '—' }}</td>
                                    <td class="px-5 py-3 text-sm text-slate-700">{{ $employee->job_title ?: '—' }}</td>
                                    <td class="px-5 py-3">
                                        <div class="flex items-center justify-end gap-2">
                                            @php
                                                $employeeViewData = [
                                                    'imageUrl' => $employee->photo_path ? asset('storage/'.$employee->photo_path) : null,
                                                    'fullName' => $employee->full_name,
                                                    'email' => $employee->email,
                                                    'department' => $employee->department,
                                                    'jobTitle' => $employee->job_title,
                                                    'phone' => $employee->phone,
                                                    'notes' => $employee->notes,
                                                    'editUrl' => route('employees.edit', $employee),
                                                ];
                                            @endphp
                                            <a href="#" data-employee-view='@json($employeeViewData)' class="text-sm font-semibold text-blue-700 hover:underline">View</a>

                                            <a href="{{ route('employees.show', $employee) }}" class="text-sm font-semibold text-slate-700 hover:underline">Open</a>
                                            <a href="{{ route('employees.edit', $employee) }}" class="text-sm font-semibold text-slate-700 hover:underline">Edit</a>

                                            <form method="POST" action="{{ route('employees.destroy', $employee) }}" data-confirm="delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm font-semibold text-red-700 hover:underline">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-5 py-10 text-center text-slate-600" colspan="4">No employees yet. Create your first employee.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-5">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
