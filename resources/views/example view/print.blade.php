<div class="modal fade" id="modalCenterPrint" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"><h2>Печать документов</h2></div>
            <div class="modal-body">
                <div class="container">
                    @if(Route::current()->getName() == 'registryPol')
                        <div class="row mb-2">
                            <div class="col-lg-6"><div class="button_print button_print-sog blue" data-print="cart">Медицинская карта №025/у</div></div>
                            <div class="col-lg-6"><div class="button_print button_print-tal blue" data-print="ticket">Амбулаторный талон</div></div>
                        </div>
                    @endif
                    @if(Route::current()->getName() == 'registryHospital')
                        <div class="row mb-2">
                            <div class="col-lg-6"><div class="button_print button_print-sog blue" data-print="cart-stac">Медицинская карта стационарного больного</div></div>
                            <div class="col-lg-6"><div class="button_print button_print-tal blue" data-print="act">Акт выполненных работ</div></div>
                        </div>
                    @endif
                        <div class="row mb-2">
                            <div class="col-lg-6"><div class="button_print button_print-sog blue" data-print="consent">Информационное cогласие</div></div>
                            <div class="col-lg-6"><div class="button_print button_print-tal blue" data-print="dogovor">Договор на оказание услуг</div></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
