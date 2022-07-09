<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Ссылки
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg shadow-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="space-y-4">
                        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                            Ссылки
                        </h2>

                        <a class="btn btn-success btn-sm md:btn-md" href="{{ route('dashboard.urls.create') }}">
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
                                <th>Дата создания</th>
                                <th>Частота (мин)</th>
                                <th>Кол-во повторов при ошибке</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($urls as $url)
                                    <tr>
                                        <td>{{ $url->url_address }}</td>
                                        <td>{{ $url->created_at->diffForHumans() }}</td>
                                        <td>{{ $url->frequency }}</td>
                                        <td>{{ $url->fail_repeat_count }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Здесь ещё нет ссылок. Добавьте скорее 🙂</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $urls->links() }}

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
