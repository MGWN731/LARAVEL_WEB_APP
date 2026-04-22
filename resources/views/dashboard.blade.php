<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div class="min-w-0">
                <h2 class="font-semibold text-xl text-slate-900 leading-tight truncate">
                    {{ __('Admin Dashboard') }}
                </h2>
                <p class="mt-1 text-sm text-slate-600">Overview of your employee directory and quick actions.</p>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('employees.index') }}"
                   class="inline-flex items-center rounded-md px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    View employees
                </a>

                <a href="{{ route('employees.create') }}"
                   class="inline-flex items-center rounded-md bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Add employee
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm">
                    <div class="text-sm font-semibold text-slate-600">Total employees</div>
                    <div class="mt-2 text-3xl font-semibold text-slate-900">{{ number_format((int) $employeesCount) }}</div>
                    <div class="mt-3 text-sm text-slate-600">All records in your directory.</div>
                </div>

                <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm">
                    <div class="text-sm font-semibold text-slate-600">Quick actions</div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <a href="{{ route('employees.create') }}"
                           class="inline-flex items-center rounded-md bg-gradient-to-r from-blue-600 to-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            New employee
                        </a>
                        <a href="{{ route('employees.index') }}"
                           class="inline-flex items-center rounded-md bg-slate-900 px-3 py-2 text-sm font-semibold text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Employee list
                        </a>
                    </div>
                    <div class="mt-3 text-sm text-slate-600">Manage records and profiles.</div>
                </div>

                <div class="bg-white border border-slate-200 rounded-lg p-5 shadow-sm">
                    <div class="text-sm font-semibold text-slate-600">Signed in</div>
                    <div class="mt-2 text-base font-semibold text-slate-900 truncate">{{ Auth::user()->name }}</div>
                    <div class="mt-1 text-sm text-slate-600 truncate">{{ Auth::user()->email }}</div>
                    <div class="mt-3">
                        <a href="{{ route('profile.edit') }}" class="text-sm font-semibold text-blue-700 hover:underline">Edit profile</a>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
                <div class="p-5 flex items-center justify-between gap-4">
                    <div>
                        <h3 class="text-base font-semibold text-slate-900">Recently updated</h3>
                        <p class="mt-1 text-sm text-slate-600">Latest changes in your employees list.</p>
                    </div>
                    <a href="{{ route('employees.index') }}" class="text-sm font-semibold text-blue-700 hover:underline">View all</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                <th class="px-5 py-3">Employee</th>
                                <th class="px-5 py-3">Department</th>
                                <th class="px-5 py-3">Updated</th>
                                <th class="px-5 py-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse ($recentEmployees as $employee)
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
                                    <td class="px-5 py-3 text-sm text-slate-700">{{ $employee->updated_at->diffForHumans() }}</td>
                                    <td class="px-5 py-3 text-right">
                                        <a href="{{ route('employees.show', $employee) }}" class="text-sm font-semibold text-blue-700 hover:underline">Open</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-5 py-10 text-center text-slate-600" colspan="4">No employees yet. Add your first employee to get started.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
