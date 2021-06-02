<div class="modal fade" id="modalCenterPost" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 70%;">
        <div class="modal-content" id="modal-content-post">
            <div class="modal-header"><h2>Добавление записи</h2></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-5">
                        <div>
                            <b>Наименование записи</b>
                        </div>
                        <input type="text" class="post-head_input" id="post-head_input" name="post-head" placeholder="Наименование записи">
                    </div>
                    <div class="col-md-5">
                        <div><b>Выбор шаблона</b></div>
                        <select name="templates" id="templates">
                            <option disabled="">Выбор шаблона</option>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div id="post-summer"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button id="sendPost" class="red">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
