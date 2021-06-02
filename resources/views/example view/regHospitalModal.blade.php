
<div class="modal fade" id="modalCenterHospital" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header"><h2>Медицинская карта стационарного больного</h2></div>
            <div class="modal-body">
                <form id="active-form" action="">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-lg-3">
                                <select name="policy-type" id="policy-type">
                                    <option disabled>Тип полиса</option>
                                    <option class="policy-type_option" value="3" data-length="16">Единого образца</option>
                                    <option class="policy-type_option" value="2" data-length="9">Временный полис ОМС</option>
                                    <option class="policy-type_option" value="4" data-length="0">ДМС</option>
                                    <option class="policy-type_option" value="1" data-length="11">Старого образца</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <div class="search_container">
                                    <input class="n" type="text" id="policy-num" name="policy-num" placeholder="Номер полиса" autocomplete="off">
                                    <div id="search_box-policy" class="search-box"></div>
                                </div>
                            </div>
                            <div class="col-lg-3"><input type="text" id="policy-comp" name="policy-comp" placeholder="Страховая компания" autocomplete="off"></div>

                            <div class="col-lg-3"><input type="text" id="snills" name="snills" placeholder="СНИЛС"  autocomplete="off"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2"><input type="text" id="pasport-serial" name="pasport-serial" placeholder="Серия" autocomplete="off"></div>
                            <div class="col-lg-2"><input type="text" id="pasport-num" name="pasport-num" placeholder="Номер" autocomplete="off"></div>
                            <div class="col-lg-2"><input type="text" class="m-date" id="pasport-date" name="pasport-date" placeholder="Дата" autocomplete="off"></div>
                            <div class="col-lg-6"><input type="text" id="pasport-who" name="pasport-who" placeholder="Кем выдан паспорт" autocomplete="off"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="policy-dms" name="policy-dms" placeholder="ДМС, СОГАЗ, гарантийное письмо" autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-2">
                                <select id="resident" name="resident" required="">
                                    <option disabled="">Прикрепленность</option>
                                    <option value="0">Местный</option>
                                    <option value="1">Иногородний</option>
                                </select>
                            </div>
                        </div>
                        <h3>Иформация о пациенте</h3>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="search_container">
                                    <textarea rows="1" id="name" name="name" placeholder="ФИО"></textarea>
                                    <div id="search_box-name" class="search-box"></div>
                                </div>
                            </div>
                            <div class="col-lg-3"><input type="text" class="m-date" id="born-date" name="born-date" placeholder="Дата рождения" autocomplete="off"></div>
                            <div class="col-lg-3">
                                <select id="gender" name="gender" required>
                                    <option disabled>Пол</option>
                                    <option value="М">М</option>
                                    <option value="Ж">Ж</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6"><input type="text" id="born-addr" name="born-addr" placeholder="Место рождения" autocomplete="off"></div>
                            <div class="col-lg-6"><input type="text" id="registration" name="registration" placeholder="Адрес прописки" autocomplete="off"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="search_container">
                                <textarea rows="1" id="job" name="job" placeholder="Место работы" ></textarea>
                                <div id="search_box-works"></div>
                            </div>
                        </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4"><input type="text" id="phone" name="phone" placeholder="Мобильный телефон" autocomplete="off"> </div>
                            <div class="col-lg-4">
                                <select id="social" name="social" required>
                                    <option disabled>Социальное положение</option>
                                    <option value="1">Работающий</option>
                                    <option value="2">Транспортник</option>
                                    <option value="3">Пенсионер траспортник</option>
                                    <option value="4">Пенсионер не траспортник</option>
                                    <option value="5">Неработающий</option>
                                    <option value="6">Инвалид</option>
                                    <option value="7">Студент или учащийся</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select id="disability" name="disability" required="">
                                    <option disabled="">Группа инвалидности</option>
                                    <option value="0" selected="">Нет инвалидности</option>
                                    <option value="1">Ивалид 1гр.</option>
                                    <option value="2">Ивалид 2гр.</option>
                                    <option value="3">Ивалид 3гр.</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <input type="text" id="dop-inf" name="dop-inf" class="dop-inf" placeholder="Адрес родственников и № телефона" autocomplete="off">
                            </div>
                        </div>
                        <h3>Госпитализация</h3>
                        <div class="row mb-2">
                            <div class="col-lg-4">
                                <input type="text" id="idCart" name="idCart" class="phone" placeholder="Номер карты" autocomplete="off">
                            </div>
                            <div class="col-lg-4">
                                <select id="section" name="section" required="">
                                    <option disabled="">Отделение</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                    @endforeach
{{--                                    <option value="5">Травматолого-ортопедическое</option>--}}
{{--                                    <option value="6">Хирургическое</option>--}}
{{--                                    <option value="7">Гинекологическое</option>--}}
{{--                                    <option value="8">Оториноларингологическое</option>--}}
{{--                                    <option value="9">Терапевтическое</option>--}}
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select id="type-trans" name="type-trans" required="">
                                    <option disabled="">Вид траспортировки</option>
                                    <option value="Может идти">Может идти</option>
                                    <option value="На каталке">На каталке</option>
                                    <option value="На кресле">На кресле</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <input type="text" id="direction" name="direction" placeholder="Кем направлен" autocomplete="off">
                            </div>
                            <div class="col-lg-8">
                                <input type="text" id="diag" name="diag" placeholder="Диагноз направившего учреждения" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-lg-12 mb-2"><input class="red" id="send-button-act" type="submit" value="Создать"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
