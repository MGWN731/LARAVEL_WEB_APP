import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Alpine = Alpine;
window.Swal = Swal;

document.addEventListener('alpine:init', () => {
	Alpine.data('adminShell', () => ({
		sidebarOpen: false,
		sidebarCollapsed: false,

		init() {
			try {
				this.sidebarCollapsed = JSON.parse(localStorage.getItem('sidebarCollapsed') ?? 'false');
			} catch {
				this.sidebarCollapsed = false;
			}
		},

		toggleSidebar() {
			this.sidebarOpen = !this.sidebarOpen;
		},

		closeSidebar() {
			this.sidebarOpen = false;
		},

		toggleCollapse() {
			this.sidebarCollapsed = !this.sidebarCollapsed;
			localStorage.setItem('sidebarCollapsed', JSON.stringify(this.sidebarCollapsed));
		},
	}));
});

Alpine.start();

// Flash notifications (server-side -> client-side)
if (window.__FLASH_STATUS__) {
	Swal.fire({
		toast: true,
		position: 'top-end',
		icon: 'success',
		title: window.__FLASH_STATUS__,
		showConfirmButton: false,
		timer: 3500,
		timerProgressBar: true,
	});
}

// Confirm-delete handling (replaces window.confirm)
document.addEventListener('submit', async (event) => {
	const form = event.target;
	if (!(form instanceof HTMLFormElement)) return;

	if (!form.matches('[data-confirm="delete"]')) return;

	event.preventDefault();

	const result = await Swal.fire({
		title: 'Delete this item?',
		text: 'This action cannot be undone.',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Delete',
	});

	if (result.isConfirmed) {
		form.submit();
	}
});

// Employee view-details modal (SweetAlert as modal)
document.addEventListener('click', async (event) => {
	const trigger = event.target.closest('[data-employee-view]');
	if (!trigger) return;

	event.preventDefault();

	let employee;
	try {
		employee = JSON.parse(trigger.getAttribute('data-employee-view'));
	} catch {
		employee = null;
	}

	if (!employee) {
		Swal.fire({
			icon: 'error',
			title: 'Unable to load details',
		});
		return;
	}

	const html = `
		<div class="text-left">
			<div class="space-y-3">
				${employee.imageUrl ? `
					<div>
						<img src="${escapeHtml(employee.imageUrl)}" alt="" class="w-full h-40 object-cover rounded-md border border-slate-200" />
					</div>
				` : ''}
				<div>
					<div class="text-xs font-semibold text-slate-500">Name</div>
					<div class="text-sm font-medium text-slate-900">${escapeHtml(employee.fullName ?? '')}</div>
				</div>
				<div class="grid grid-cols-2 gap-3">
					<div>
						<div class="text-xs font-semibold text-slate-500">Email</div>
						<div class="text-sm font-medium text-slate-900">${escapeHtml(employee.email ?? '')}</div>
					</div>
					<div>
						<div class="text-xs font-semibold text-slate-500">Department</div>
						<div class="text-sm font-medium text-slate-900">${escapeHtml(employee.department || '—')}</div>
					</div>
				</div>
				<div class="grid grid-cols-2 gap-3">
					<div>
						<div class="text-xs font-semibold text-slate-500">Job title</div>
						<div class="text-sm font-medium text-slate-900">${escapeHtml(employee.jobTitle || '—')}</div>
					</div>
					<div>
						<div class="text-xs font-semibold text-slate-500">Phone</div>
						<div class="text-sm font-medium text-slate-900">${escapeHtml(employee.phone || '—')}</div>
					</div>
				</div>
				<div>
					<div class="text-xs font-semibold text-slate-500">Notes</div>
					<div class="text-sm text-slate-700 whitespace-pre-wrap">${escapeHtml(employee.notes || '—')}</div>
				</div>
			</div>
		</div>
	`;

	const result = await Swal.fire({
		title: 'Employee details',
		html,
		showCancelButton: true,
		showConfirmButton: Boolean(employee.editUrl),
		confirmButtonText: 'Edit',
		cancelButtonText: 'Close',
		focusConfirm: false,
	});

	if (result.isConfirmed && employee.editUrl) {
		window.location.href = employee.editUrl;
	}
});

function escapeHtml(value) {
	return String(value)
		.replaceAll('&', '&amp;')
		.replaceAll('<', '&lt;')
		.replaceAll('>', '&gt;')
		.replaceAll('"', '&quot;')
		.replaceAll("'", '&#039;');
}
