<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Добавление ссылки
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=space-y-4">
                        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                            Добавление ссылки
                        </h2>

                        <!-- Validation Errors -->
                        <x-errors class="mb-4" :errors="$errors" />

                        <form class="space-y-8"
                              action="@auth('web')
                                        {{ route('dashboard.urls.store') }}
                                      @else
                                        {{ route('urls.store') }}
                                      @endauth" method="post">
                            @csrf
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">URL</span>
                                </label>
                                <input type="text" name="url_address" placeholder="https://alytics.ru" class="input input-bordered input-primary w-full" required />
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Частота проверок (интервал)</span>
                                </label>
                                <select name="frequency" class="select select-primary w-full" required>
                                    <option value="0" disabled selected>Как часто проверять?</option>
                                    <option value="1">1 мин.</option>
                                    <option value="5">5 мин.</option>
                                    <option value="10">10 мин.</option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Количество повторов в случае ошибки</span>
                                </label>
                                <input name="fail_repeat_count" type="range" min="0" max="10" value="0" class="range range-primary" step="1" required />
                                <div class="w-full flex justify-between text-lg py-2 px-2">
                                    <span>0</span>
                                    <span>1</span>
                                    <span>2</span>
                                    <span>3</span>
                                    <span>4</span>
                                    <span>5</span>
                                    <span>6</span>
                                    <span>7</span>
                                    <span>8</span>
                                    <span>9</span>
                                    <span>10</span>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-xs sm:btn-sm md:btn-md lg:btn-lg" type="submit">
                                Добавить ссылку
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
