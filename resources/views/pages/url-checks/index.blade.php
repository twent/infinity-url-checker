<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Проверки
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg shadow-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="space-y-4">
                        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                            Проверки
                        </h2>

                        <a class="btn btn-success btn-sm md:btn-md " href="{{ route('dashboard.urls.create') }}">
                            Добавить ссылку
                        </a>

                        <!-- Success Messages -->
                        @if(session('success'))
                            <x-success-alerts class="my-4" :success="session('success')" />
                        @endif

                        <table class="table w-full">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th>URL</th>
                                <th>Время проверки</th>
                                <th>Http-код ответа</th>
                                <th>Номер попытки</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($urlChecks as $urlCheck)
                                    <tr>
                                        <td>{{ $urlCheck->url->url_address }}</td>
                                        <td>{{ $urlCheck->executed_at->diffForHumans() }}</td>
                                        <td>
                                            <span class="p-1.5 rounded @if($urlCheck->success) bg-success @else bg-error @endif " >
                                                @if($urlCheck->success)
                                                    {{ $urlCheck->answer_http_code }}
                                                @else
                                                    {{ $urlCheck->error_message }}
                                                @endif
                                            </span>
                                        </td>
                                        <td>{{ $urlCheck->attempt_number }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Ещё нет выполненных проверок. Добавьте скорее 🙂</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $urlChecks->links() }}

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
