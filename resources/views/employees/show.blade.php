<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div class="min-w-0">
                <h2 class="font-semibold text-xl text-slate-900 leading-tight truncate">{{ $employee->full_name }}</h2>
                <p class="mt-1 text-sm text-slate-600">Employee details</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('employees.edit', $employee) }}" class="text-sm font-semibold text-blue-700 hover:underline">Edit</a>
                <a href="{{ route('employees.index') }}" class="text-sm font-semibold text-slate-700 hover:underline">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 grid gap-6 md:grid-cols-12">
                    <div class="md:col-span-5">
                        @if ($employee->photo_path)
                            <img src="{{ asset('storage/'.$employee->photo_path) }}" alt="" class="w-full h-56 object-cover rounded-lg border border-slate-200" />
                        @else
                            <div class="w-full h-56 rounded-lg bg-slate-100 border border-slate-200"></div>
                        @endif
                    </div>
                    <div class="md:col-span-7 space-y-4">
                        <div>
                            <div class="text-xs font-semibold text-slate-500">Email</div>
                            <div class="text-sm font-medium text-slate-900">{{ $employee->email }}</div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-xs font-semibold text-slate-500">Department</div>
                                <div class="text-sm font-medium text-slate-900">{{ $employee->department ?: '—' }}</div>
                            </div>
                            <div>
                                <div class="text-xs font-semibold text-slate-500">Job title</div>
                                <div class="text-sm font-medium text-slate-900">{{ $employee->job_title ?: '—' }}</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-xs font-semibold text-slate-500">Phone</div>
                                <div class="text-sm font-medium text-slate-900">{{ $employee->phone ?: '—' }}</div>
                            </div>
                            <div>
                                <div class="text-xs font-semibold text-slate-500">Hire date</div>
                                <div class="text-sm font-medium text-slate-900">{{ $employee->hire_date?->format('Y-m-d') ?: '—' }}</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-xs font-semibold text-slate-500">Notes</div>
                            <div class="text-sm text-slate-700 whitespace-pre-wrap">{{ $employee->notes ?: '—' }}</div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 p-6 flex items-center justify-between">
                    <form method="POST" action="{{ route('employees.destroy', $employee) }}" data-confirm="delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-red-700 ring-1 ring-red-200 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
                    </form>
                    <a href="{{ route('employees.edit', $employee) }}" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
