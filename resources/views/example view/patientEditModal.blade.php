
<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header"><h2>Редактирование информации о пациенте</h2></div>
            <div class="modal-body">

                <form id="active-form" action="{{ url()->current() }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-lg-3">
                                <select name="policy-type" id="policy-type">
                                    <option disabled>Тип полиса</option>
                                    <option class="policy-type_option" value="3" data-length="16" {{ ($patient['policy_type'] == 3)?"selected":"" }}>Единого образца</option>
                                    <option class="policy-type_option" value="2" data-length="9" {{ ($patient['policy_type'] == 2)?"selected":"" }}>Временный полис ОМС</option>
                                    <option class="policy-type_option" value="4" data-length="0" {{ ($patient['policy_type'] == 4)?"selected":"" }}>ДМС</option>
                                    <option class="policy-type_option" value="1" data-length="11" {{ ($patient['policy_type'] == 1)?"selected":"" }}>Старого образца</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <div class="search_container">
                                    <input class="n" type="text" id="policy-num" name="policy-num" value="{{ $patient['policy_num'] }}" placeholder="Номер полиса" autocomplete="off">
                                    <div id="search_box-policy" class="search-box"></div>
                                </div>
                            </div>
                            <div class="col-lg-3"><input type="text" id="policy-comp" name="policy-comp" value="{{ $patient['policy_comp'] }}" placeholder="Страховая компания" autocomplete="off"></div>

                            <div class="col-lg-3"><input type="text" id="snills" name="snills" value="{{ $patient['snills'] }}" placeholder="СНИЛС"  autocomplete="off"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-2"><input type="text" id="pasport-serial" value="{{ $patient['pasport_serial'] }}" name="pasport-serial" placeholder="Серия" autocomplete="off"></div>
                            <div class="col-lg-2"><input type="text" id="pasport-num" value="{{ $patient['pasport_num'] }}" name="pasport-num" placeholder="Номер" autocomplete="off"></div>
                            <div class="col-lg-2"><input type="text" class="m-date" value="{{ $patient['pasport_date'] }}" id="pasport-date" name="pasport-date" placeholder="Дата" autocomplete="off"></div>
                            <div class="col-lg-6"><input type="text" id="pasport-who" value="{{ $patient['pasport_who'] }}" name="pasport-who" placeholder="Кем выдан паспорт" autocomplete="off"></div>
                        </div>
                        <h3>Иформация о пациенте</h3>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="search_container">
                                    <textarea rows="1" id="name" name="name"  placeholder="ФИО">{{ $patient['name'] }}</textarea>
                                    <div id="search_box-name" class="search-box"></div>
                                </div>
                            </div>
                            <div class="col-lg-3"><input type="text" class="m-date" id="born-date" name="born-date" value="{{ $patient['born_date'] }}" placeholder="Дата рождения" autocomplete="off"></div>
                            <div class="col-lg-3">
                                <select id="gender" name="gender" required>
                                    <option disabled>Пол</option>
                                    <option value="М" {{ ($patient['gender'] == "М")?"selected":"" }}>М</option>
                                    <option value="Ж" {{ ($patient['gender'] == "Ж")?"selected":"" }}>Ж</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6"><input type="text" id="born-addr" value="{{ $patient['born_addr'] }}" name="born-addr" placeholder="Место рождения" autocomplete="off"></div>
                            <div class="col-lg-6"><input type="text" id="registration" value="{{ $patient['registration'] }}" name="registration" placeholder="Адрес прописки" autocomplete="off"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="search_container">
                                    <textarea rows="1" id="job" name="job" placeholder="Место работы" >{{ $patient['job'] }}</textarea>
                                    <div id="search_box-works"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <select id="social" name="social" required>
                                    <option disabled>Социальное положение</option>
                                    <option value="1" {{ ($patient['social'] == 1)?"selected":"" }}>Работающий</option>
                                    <option value="2" {{ ($patient['social'] == 2)?"selected":"" }}>Транспортник</option>
                                    <option value="3" {{ ($patient['social'] == 3)?"selected":"" }}>Пенсионер траспортник</option>
                                    <option value="4" {{ ($patient['social'] == 4)?"selected":"" }}>Пенсионер не траспортник</option>
                                    <option value="5" {{ ($patient['social'] == 5)?"selected":"" }}>Неработающий</option>
                                    <option value="6" {{ ($patient['social'] == 6)?"selected":"" }}>Инвалид</option>
                                    <option value="7" {{ ($patient['social'] == 7)?"selected":"" }}>Студент или учащийся</option>
                                </select>
                            </div>
                            <div class="col-lg-3"><input type="text" id="phone" name="phone" value="{{ $patient['phone'] }}" placeholder="Мобильный телефон" autocomplete="off"> </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <select id="type-disability" name="type-disability" required>
                                    <option disabled>Группа инвалидности</option>
                                    <option value="0" {{ ($patient['type_disability'] == 0)?"selected":"" }}>Нет инвалидности</option>
                                    <option value="1" {{ ($patient['type_disability'] == 1)?"selected":"" }}>Ивалид 1гр.</option>
                                    <option value="2" {{ ($patient['type_disability'] == 2)?"selected":"" }}>Ивалид 2гр.</option>
                                    <option value="3" {{ ($patient['type_disability'] == 3)?"selected":"" }}>Ивалид 3гр.</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <select id="resident" name="resident" required>
                                    <option disabled>Прикрепленность</option>
                                    <option value="0" {{ ($patient['resident'] == 0)?"selected":"" }}>Местный</option>
                                    <option value="1" {{ ($patient['resident'] == 1)?"selected":"" }}>Иногородний</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-lg-12 mb-2"><input class="blue" id="send-button-act" type="submit" value="Сохранить"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

