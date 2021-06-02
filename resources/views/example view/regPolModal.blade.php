
<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header"><h2>Запись на прием</h2></div>
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
                            <div class="col-lg-4">
                                <div class="search_container">
                                    <textarea rows="1" id="job" name="job" placeholder="Место работы" ></textarea>
                                    <div id="search_box-works"></div>
                                </div>
                            </div>
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
                            <div class="col-lg-4"><input type="text" id="phone" name="phone" placeholder="Мобильный телефон" autocomplete="off"> </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-4"><input type="text" id="cart-num" name="cart-num" placeholder="Номер амбулаторной карты" autocomplete="off"></div>
                            <div class="col-lg-4"><input type="text" id="active-date" name="date" placeholder="Дата" autocomplete="off" readonly></div>
                            <div class="col-lg-4">
                                <select id="stc" name="stc" required>
                                    <option disabled>Медкарта</option>
                                    <option value="В регистратуре">В регистратуре</option>
                                    <option value="У врача">У врача</option>
                                    <option value="У пациента">У пациента</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-lg-12 mb-2"><input class="blue" id="send-button-act" type="submit" value="Записать"></div>
                            <div class="col-lg-12"><input class="red" id="un-send-button-act" type="submit" value="Не рабочее время"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
