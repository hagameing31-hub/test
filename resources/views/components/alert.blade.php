@props(['type' => 'success', 'message'])

@php
    $colorClass = match ($type) {
        'success' => 'background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;',
        'error' => 'background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;',
        'warning' => 'background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba;',
        'info' => 'background-color: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb;',
        default => 'background-color: #e2e3e5; color: #383d41; border: 1px solid #d6d8db;',
    };
@endphp

<div style="padding: 15px; margin-bottom: 20px; border-radius: 4px; {{ $colorClass }}">
    {{ $message }}
</div>
